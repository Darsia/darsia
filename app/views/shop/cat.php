<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = $cat->seo('title', $cat->model->title);
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['shop/index']];
$this->params['breadcrumbs'][] = $cat->model->title;
?>
<h1><?= $cat->seo('h1', $cat->title) ?></h1>
<br/>

<div class="row">
    <div class="col-md-8">
        <?php if(count($items)) : ?>
            <br/>
            <?php foreach($items as $item) : ?>
                <?= $this->render('_item', ['item' => $item]) ?>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Категория пуста</p>
        <?php endif; ?>
    </div>
    <div class="col-md-3 col-md-offset-1">
        <h4>Фильтры</h4>
        <div class="well well-sm">
            <?php $form = ActiveForm::begin(['method' => 'get', 'action' => Url::to(['/shop/cat', 'slug' => $cat->slug])]); ?>
                <?= $form->field($filterForm, 'brand')->dropDownList($cat->fieldOptions('brand', 'Выберите производителя...'))->label('Производитель') ?>
                <?= $form->field($filterForm, 'priceFrom')->label('Цена от') ?>
                <?= $form->field($filterForm, 'priceTo')->label('Цена до') ?>
                <?= Html::submitButton('Фильтровать', ['class' => 'btn btn-primary']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>



<?= $cat->pages() ?>