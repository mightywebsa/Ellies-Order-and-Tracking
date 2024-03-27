<?php

namespace app\controllers;

use Yii;
use app\models\Orderh;
use app\models\Orderd;

class OrderController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    

    public function actionCreate()
    {
        $orderHeaderModel = new Orderh();
        $orderDetailsModel = [new Orderd()];

        if (Yii::$app->request->post()) {
            $orderHeaderModel->load(Yii::$app->request->post());
            $orderDetailsModel = Model::createMultiple(Orderd::classname());
            Model::loadMultiple($orderDetailsModel, Yii::$app->request->post());

            // Validate and save data
            $valid = $orderHeaderModel->validate();
            $valid = Model::validateMultiple($orderDetailsModel) && $valid;

            if ($valid) {
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $orderHeaderModel->save(false)) {
                        foreach ($orderDetailsModel as $orderDetailModel) {
                            $orderDetailModel->order_number = $orderHeaderModel->order_number;
                            if (!($flag = $orderDetailModel->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $orderHeaderModel->order_number]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create', [
            'orderHeaderModel' => $orderHeaderModel,
            'orderDetailsModel' => $orderDetailsModel,
        ]);
    }

}
