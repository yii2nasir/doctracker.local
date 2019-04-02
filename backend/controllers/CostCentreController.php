<?php

namespace backend\controllers;

use Yii;
use backend\models\CostCentre;
use backend\models\CostCentreSearch;
//use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CostCentreController implements the CRUD actions for CostCentre model.
 */
class CostCentreController extends BaseController {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
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
     * Lists all CostCentre models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new CostCentreSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CostCentre model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CostCentre model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new CostCentre();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->session->setFlash('success', 'Form save successfully');
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing CostCentre model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->session->setFlash('success', 'Form updated successfully');
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CostCentre model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        try {
            $this->findModel($id)->delete();
            \Yii::$app->session->setFlash('success', "Record deleted successfully");

            return $this->redirect(['index']);
        } catch (\yii\db\Exception $ex) {
            if ($ex->getCode() === 23000) {
                \Yii::$app->session->setFlash('warning', "Record couldn't delete due to Database Relation Restriction");
                return $this->redirect(['index']);
//                throw new \yii\web\HttpException(409, 'Relation Restriction');
            } else {
                throw $ex;
            }
        }
    }

    /**
     * Finds the CostCentre model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CostCentre the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = CostCentre::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
