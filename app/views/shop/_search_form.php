<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<br/>
<?= Html::beginForm(Url::to(['/shop/search']), 'get', ['class' => 'form-inline']) ?>
    <div class="form-group">
        <?= Html::textInput('text', $text, ['class' => 'form-control', 'placeholder' => 'Поиск']) ?>
    </div>
    <?= Html::submitButton('<i class="glyphicon glyphicon-search"></i>', ['class' => 'btn btn-default']) ?>
<?= Html::endForm() ?>
<br/>