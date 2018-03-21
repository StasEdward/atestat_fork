<?php

namespace app\controllers;

use Yii;
use app\models\TestResults;
use app\models\TestResultsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * TestResultsController implements the CRUD actions for TestResults model.
 */
class TestResultsController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all TestResults models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TestResultsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TestResults model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }




    public function actionView3($test_name)
    {

    //    return $this->render('view', [
    //        'model' => $this->findModel(51313),
    //    ]);
//    $id = 51313;
//    echo $test_name;

$searchModel = new TestResultsSearch();
$query = TestResultsSearch::find()->where(['TESTNAME' => $test_name])->orderBy(['HEADER_ID' => SORT_DESC]);
$dataProvider = new ActiveDataProvider([
'query' => $query,
'pagination' => [
  'pageSize' => 40,
],
]);

//print_r($dataProvider);


return $this->render('view3', [
  'model' => $searchModel,
 // 'dataProvider' => $dataProvider,
]);

/*
  //    $resultModel = new TestResultsSearch();
  //    $resultModel = $resultModel::findAll(['HEADER_ID' => $id]);
    $query = TestResultsSearch::find()->where(['TESTNAME' => $test_name])->orderBy(['HEADER_ID' => SORT_DESC]);
    $dataProvider = new ActiveDataProvider([
    'query' => $query,
    'pagination' => [
        'pageSize' => 100,
        ],
      ]);

      return $this->render('view3', [
          'model' => TestResultsSearch::find()->where(['TESTNAME' => $test_name])->orderBy(['HEADER_ID' => SORT_DESC]),
          'dataProvider' => $dataProvider,
      ]);*/
/*
  //    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('view3', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
        //    'resultModel' => $resultModel,
        ] );
*/
    }



    /**
     * Creates a new TestResults model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TestResults();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TestResults model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TestResults model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TestResults model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return TestResults the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TestResults::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
