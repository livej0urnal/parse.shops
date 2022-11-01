<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Shops $model */

$this->title = 'Create Shops';
$this->params['breadcrumbs'][] = ['label' => 'Shops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shops-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
