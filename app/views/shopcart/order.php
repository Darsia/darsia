<?php
use yii\helpers\Html;

$this->title = 'Детали заказа';
?>
<h1>Order #<?= $order->id ?></h1>

<div class="well well-sm">Статус: <b><?= $order->status ?></b></div>

<table class="table">
    <thead>
    <tr>
        <th>Товар</th>
        <th width="100">Количество</th>
        <th width="120">Цена за штуку</th>
        <th width="100">Всего</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($order->goods as $good) : ?>
        <tr>
            <td>
                <?= Html::a($good->item->title, ['/shop/view', 'slug' => $good->item->slug]) ?>
                <?= $good->options ? "($good->options)" : '' ?>
            </td>
            <td><?= $good->count ?></td>
            <td>
                <?php if($good->discount) : ?>
                    <del class="text-muted "><small><?= $good->item->oldPrice ?></small></del>
                <?php endif; ?>
                <?= $good->price ?>
            </td>
            <td><?= $good->price * $good->count ?></td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="5" class="text-right">
            <h3>Всего: <?= $order->cost ?> руб.</h3>
        </td>
    </tr>
    </tbody>
</table>
