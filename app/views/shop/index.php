<?php
use yii\easyii\modules\catalog\api\Catalog;
use yii\easyii\modules\file\api\File;
use yii\easyii\modules\page\api\Page;
use yii\helpers\Html;

$page = Page::get('page-shop');

$this->title = $page->seo('title', $page->model->title);
$this->params['breadcrumbs'][] = $page->model->title;

function renderNode($node){
    if(!count($node->children)){
        $html = '<li>'.Html::a($node->title, ['/shop/cat', 'slug' => $node->slug]).'</li>';
    } else {
        $html = '<li>'.$node->title.'</li>';
        $html .= '<ul>';
        foreach($node->children as $child) $html .= renderNode($child);
        $html .= '</ul>';
    }
    return $html;
}
?>


<div class="row">
    <div class="col-md-8">
        <h3 class="sidebar-title">
            <?= $page->model->title ?>
        </h3>
        <br/>
        <ul class="sidebar-list">
            <?php foreach(Catalog::tree() as $node) echo renderNode($node); ?>
        </ul>
    </div>
    <div class="col-md-4">
        <?= $this->render('_search_form', ['text' => '']) ?>

        <h4>Последние товары</h4>
        <?php foreach(Catalog::last(3) as $item) : ?>
            <p>
                <?= Html::img($item->thumb(30)) ?>
                <?= Html::a($item->title, ['/shop/view', 'slug' => $item->slug]) ?><br/>
                <span class="label label-warning"><?= $item->price ?> руб.</span>
            </p>
        <?php endforeach; ?>
    </div>
</div>