<?php

namespace app\controllers;

use Yii;
use app\models\Picking;
use app\models\PickingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;

/**
 * PickingController implements the CRUD actions for Picking model.
 */
class PickingController extends Controller
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
        ];
    }

    /**
     * Lists all Picking models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PickingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setSort(['defaultOrder' => ['fl_ps_inv_date' => SORT_DESC]]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Picking model.
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
     * Creates a new Picking model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Picking();
        $customers = \app\models\Customers::getCustomers();
        $model->fl_ps_inv_date = date('Y-m-d H:i:s');
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->fl_ps_id]);
        }

        return $this->render('create', [
            'model' => $model,
            'customers' => $customers,
        ]);
    }

    /**
     * Updates an existing Picking model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $customers = \app\models\Customers::getCustomers();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->fl_ps_id]);
        }
        return $this->render('update', [
            'model' => $model,
            'customers' => $customers,
        ]);
    }
   
    /**
     * Updates an existing Picking model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionAdmin($id)
    {
        
        if(isset($id) && $id != ""){                   
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->fl_ps_id]);
            }

            return $this->render('admin', [
                'model' => $model,
            ]);
        }else{
            return $this->redirect(['picking/index']);
        }      
        
    }
    
    /**
     * Updates an existing Picking model Control Section.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionControl($id)
    {
        
        // Get the Picking Slip record to be updated
        $pickingslip = Picking::findOne($id);
        
        // Check if the user ID is valid
        if (!$pickingslip) {
            // If the user ID is invalid, render a blank form
            $model = new Picking();
            return $this->render('control', [
                'model' => $model,
                'user' => null,
            ]);
        }
        
        // Populate the form with existing values
        $model = new Picking();
        $model->attributes = $pickingslip->attributes;
        
        // Handle form submission
        if ($model->load(Yii::$app->request->post())) {
            // Update the user record with the new values
            $pickingslip->attributes = $model->attributes;
            if ($pickingslip->save()) {
                // Redirect to the user's profile page
                return $this->redirect(['view', 'id' => $model->fl_ps_id]);
            }
        }
        
        // Render the update profile form
        return $this->render('control', [
            'model' => $model,
            'pickingslip' => $pickingslip,
        ]);
    
//        if(isset($id) && $id != ""){                   
//            $model = $this->findModel($id);
//
//            if ($model->load(Yii::$app->request->post()) && $model->save()) {
//                return $this->redirect(['index', 'id' => $model->fl_ps_id]);
//            }
//
//            return $this->render('control', [
//                'model' => $model,
//            ]);
//        }      
        
    }
    
     /**
     * Updates an existing Picking model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionStore($id)
    {
        
        if(isset($id) && $id != ""){                   
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->fl_ps_id]);
            }

            return $this->render('store', [
                'model' => $model,
            ]);
        }else{
            return $this->redirect(['picking/index']);
        }      
        
    }
    
    
    

    /**
     * Deletes an existing Picking model.
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
     * Finds the Picking model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Picking the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Picking::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
