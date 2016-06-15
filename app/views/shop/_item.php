<?php use yii\helpers\Html; ?>

<div class="row">
    <div class="col-md-2">
        <?= Html::img($item->thumb(80, 160)) ?>
    </div>
    <div class="col-md-10">
        <p><?= Html::a($item->title, ['shop/view', 'slug' => $item->slug]) ?></p>
        <p>
            <span class="text-muted">Наименование:</span> <?= $item->title ?>
            <br/>
        </p>
        <h3>
            <?php if($item->discount) : ?>
                <del class="small"><?= $item->oldPrice ?></del>
            <?php endif; ?>
            <?= $item->price ?> руб.
        </h3>
    </div>
</div>
<br>
