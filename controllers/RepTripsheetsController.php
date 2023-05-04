<?php

namespace app\controllers;

use Yii;
use app\models\RepTripsheets;
use app\models\RepTripsheetsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use DateTime;



/**
 * RepTripsheetsController implements the CRUD actions for RepTripsheets model.
 */
class RepTripsheetsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            
            'access' => [
                'class' => AccessControl::className(),                
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index','cities','summary','create'],
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update', 'delete',  'view'],
                        'matchCallback' => function ($rule, $action){
                            $id = Yii::$app->request->get('id');
                            $model = $this->findModel($id);
                            return $model->user_id == Yii::$app->user->id;
                        },
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    
    /**
     * Lists all RepTripsheets models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RepTripsheetsSearch();
        if(Yii::$app->user->id > 1)
        {
            $searchModel->user_id = Yii::$app->user->id;

            // override (so users can't bypass)
            $queryParams = Yii::$app->request->queryParams;
            if ( isset($queryParams['RepTripsheets']['user_id']) ) {
                $queryParams['RepTripsheets']['user_id'] = Yii::$app->user->id;
            }               
        }
        
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionSummary($date)
    {
        $searchModel = new RepTripsheetsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if(Yii::$app->user->id > 1)
        {
            $searchModel->user_id = Yii::$app->user->id;

            // override (so users can't bypass)            
            $queryParams = Yii::$app->request->queryParams;            
            if (isset($queryParams['RepTripsheets']['user_id'])) {
                $queryParams['RepTripsheets']['user_id'] = Yii::$app->user->id;
            }
        }

        $dateRange = $this->getWeek($date);
        $queryParams = ['between',
                'visit_date',
                $dateRange['start']->format('Y-m-d'),
                $dateRange['end']->format('Y-m-d')
            ];

        $dataProvider = $searchModel->search($queryParams);
        //echo $dataProvider->query->createCommand()->rawSql;
        return $this->render('summary', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }




    /**
     * Displays a single RepTripsheets model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RepTripsheets model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RepTripsheets();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RepTripsheets model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RepTripsheets model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RepTripsheets model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RepTripsheets the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RepTripsheets::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    public function actionCities() {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];    
        $cities = [];    
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $area = $parents[0];
                $cities = self::getCities($area);
                foreach($cities as $city){
                    $out[] = ['id' => $city['city'], 'name' => $city['city']];
                }

                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]
                return ['output'=>$out, 'selected'=>''];

            }
        }
        return ['output'=>'', 'selected'=>''];
    }

    public function getCities($area)
    {
        $cities = \app\models\Cities::find()
                ->select('city')
                ->where(['area' => $area])->all();
        //$citiesList =         
        return $cities;
    }
    
    
    /*
     * Need a function to return the weeks' dates
     * so we pass the date selected, get the week number for that date 
     * and then get the start and end dates
     */
    public function getWeek($date){
        
        $date = strtotime($date);
        $year = date('Y',$date);
        $week_no = date("W",$date);
        $week_start = new DateTime();
        $week_end = new DateTime();
        $dateRange = [];
        $dateRange['start'] = $week_start->setISODate($year,$week_no);
        $dateRange['end'] = $week_end->setISODate($year,$week_no)->modify('+1 week');
        return $dateRange;
    }


    
}