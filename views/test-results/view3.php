<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\grid\GridView;
use kartik\dynagrid\Module;
use \yii\helpers\ArrayHelper;
use app\models\TestResultsController;
use yii\helpers\Url;
use yii\web\UrlManager;










print_r($model);





//$this->title = $model->TESTNAME;
$this->params['breadcrumbs'][] = ['label' => 'Test Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-results-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

    </p>



</div>
