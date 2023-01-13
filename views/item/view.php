<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Item $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="item-view text-light">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'price',
            [
                'attribute' => 'category',
                'value' => function($model){
                    return $model->category->name; //merubah nama relasi
                }
            ],
            'created_by',
            'updated_by',
            'created_at',
            'updated_at',
            [
                //Menampilkan gambar
                'label' => 'Item Preview',
                'format' => 'raw',
                'value' => Html::img(Yii::$app->request->baseUrl.'/upload/'.$model->img,['width' => '200px','height' => '200px']),
            ],
        ],
    ]) ?>

</div>
