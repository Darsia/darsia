<?php
use app\models\AddToCartForm;
use yii\easyii\modules\catalog\api\Catalog;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = $item->seo('title', $item->model->title);
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['shop/index']];
$this->params['breadcrumbs'][] = ['label' => $item->cat->title, 'url' => ['shop/cat', 'slug' => $item->cat->slug]];
$this->params['breadcrumbs'][] = $item->model->title;

$colors = [];
if(!empty($item->data->color) && is_array($item->data->color)) {
    foreach ($item->data->color as $color) {
        $colors[$color] = $color;
    }
}
?>
<h1><?= $item->seo('h1', $item->title) ?></h1>

<div class="row">
    <div class="col-md-4">
        <br/>
        <?= Html::img($item->thumb(120, 240)) ?>
        <?php if(count($item->photos)) : ?>
            <br/><br/>
            <div>
                <?php foreach($item->photos as $photo) : ?>
                    <?= $photo->box(null, 100) ?>
                <?php endforeach;?>
                <?php Catalog::plugin() ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-8">
                <h2>
                    <span class="label label-warning"><?= $item->price ?> руб.</span>
                    <?php if($item->discount) : ?>
                        <del class="small"><?= $item->oldPrice ?></del>
                    <?php endif; ?>
                </h2>
                <h3>Характеристики:</h3>
                <span class="text-muted">Производитель:</span> <?= $item->data->brand ?>
                <br/>
                <span class="text-muted">Страна производитель:</span> <?= $item->data->country ?>
                <br/>
                <span class="text-muted">Размер:</span> <?= $item->data->size ?>
                <br/>

                <span class="text-muted">В наличии:</span> <?= $item->available ? $item->available : 'Out of stock' ?>
                <?php if(!empty($item->data->features)) : ?>
                    <br/>
                    <span class="text-muted">Features:</span> <?= implode(', ', $item->data->features) ?>
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <?php if(Yii::$app->request->get(AddToCartForm::SUCCESS_VAR)) : ?>
                    <h4 class="text-success"><i class="glyphicon glyphicon-ok"></i> В корзине</h4>
                <?php elseif($item->available) : ?>
                    <br/>
                    <div class="well well-sm">
                        <?php if(!Yii::$app->user->isGuest) {?>
                        <?php $form = ActiveForm::begin(['action' => Url::to(['/shopcart/add', 'id' => $item->id])]); ?>
                        <?php if(count($colors)) : ?>
                            <?= $form->field($addToCartForm, 'color')->dropDownList($colors) ?>
                        <?php endif; ?>
                        <?= $form->field($addToCartForm, 'count') ?>
                        <?= Html::submitButton('Добавить в корзину', ['class' => 'btn btn-warning']) ?>
                        <?php ActiveForm::end(); ?>
                        <?php } else {?>
                            <p>Войдите, чтобы сделать заказ</p>
                            <a href="<?= Url::to(['/site/login']) ?>" class="btn btn-default navbar-btn navbar-right" title="Войти">Войти</a>
                            <a href="<?= Url::to(['/site/signup']) ?>" class="btn btn-default navbar-btn navbar-right" title="Регистрация">Регистрация</a>
                        <?php } ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?= $item->description ?>
    </div>
</div>