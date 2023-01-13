<?php

use app\models\ItemCategory;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="row">
        <div class="body-content">

            <div class="well well-sm">
                <div class="row">
                    <div class="col-xs-4 col-lg-10">
                        <?php
                        $form = ActiveForm::begin([
                            'id' => 'login-form',
                            'layout' => 'horizontal',
                            'method' => 'get',
                            'action' => \yii\helpers\Url::to(['site/index']),
                        ]);
                        if (isset($_GET['Item'])) {
                            $item_model = new \app\models\Item();
                            $item_model->category_id = \yii::$app->request->get()['Item']['category_id'];
                        }
                        ?>
                        <?= $form->field(new \app\models\Item(), 'category_id',[
                            'labelOptions' => ['class' => 'col-sm-2 col-form-label fs-5'] 
                        ])->dropDownList(\yii\helpers\ArrayHelper::map(ItemCategory::find()->all(), 'id', 'name')) ?>
                    </div>
                    <div class="col-sx-4 col-lg-1">
                        <?= Html::submitButton('Filter', ['class' => 'btn btn-info ms-4', 'name' => 'filter-button']) ?>
                    </div>
                    <?php ActiveForm::end();  ?>
                </div>
            </div>

            <div class="row">
                <?php $items = $provider->getModels();
                foreach ($items as $item) : ?>
                    <div class="item col-xs-4 col-lg-4">
                        <div class="thumbnail">
                            <img class="group list-group-image mt-2" src="<?= Url::to(['/upload/' . $item->img]) ?>" alt="" style="height:270px;width:250px">
                            <div class="caption">
                                <h4 class="group inner list-group-item-heading mt-3"><?= $item->name ?></h4>
                                <h6 class="group inner list-group-item-text"><?= $item->category->name ?></h6>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-7">
                                    <p class="lead">Rp. <?= number_format($item->price) ?></p>
                                </div>
                                <div class="col-xs-12 col-md-5">
                                    <?php
                                    if (yii::$app->user->isGuest)
                                        echo Html::a('Log in', ['auth/login'], ['class' => 'btn btn-warning']);
                                    else
                                        echo Html::a('Add Cart', ['order/create'], ['class' => 'btn btn-success']);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

        </div>
        <?= \yii\widgets\LinkPager::widget([
            'pagination' => $provider->pagination,
            'linkContainerOptions' => ['class' => 'page-item'],
            'linkOptions' => ['class' => 'page-link'],
        ]); ?>
    </div>
</div>