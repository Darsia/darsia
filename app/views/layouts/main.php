<?php
use yii\easyii\modules\shopcart\api\Shopcart;
use yii\easyii\modules\subscribe\api\Subscribe;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;

$goodsCount = count(Shopcart::goods());
?>
<?php $this->beginContent('@app/views/layouts/base.php'); ?>

<header id="header">
    <div class="container">
        <div class="row">
            <div class="h-panel clearfix">
                <nav class="h-nav h-nav-tabs">
                    <a href="#" class="active">Интернет-магазин</a>
                </nav>
                <nav class="h-nav h-nav-center">
                    <?= Menu::widget([
                        'options' => ['class' => 'nav navbar-nav'],
                        'items' => [
                            ['label' => 'Главная', 'url' => ['site/index']],
                            ['label' => 'Каталог', 'url' => ['shop/index']],
                            //['label' => 'News', 'url' => ['news/index']],
                            //['label' => 'Articles', 'url' => ['articles/index']],
                            ['label' => 'Галерея', 'url' => ['gallery/index']],
                            ['label' => 'Гостевая книга', 'url' => ['guestbook/index']],
                            ['label' => 'ЧаВо', 'url' => ['faq/index']],
                            //['label' => 'Contact', 'url' => ['/contact/index']],
                        ],
                    ]); ?>
                </nav>
                <nav class="h-nav pull-right">
                    <a href="<?= Url::to(['/shopcart']) ?>" class="btn btn-default navbar-btn navbar-right" title="Complete order">
                        <i class="glyphicon glyphicon-shopping-cart"></i>
                        <?php if($goodsCount > 0) : ?>
                            <?= $goodsCount ?> <?= $goodsCount > 1 ? 'items' : 'item' ?> - <?= Shopcart::cost() ?>$
                        <?php else : ?>
                            <span class="text-muted">Пусто</span>
                        <?php endif; ?>
                    </a>
                </nav>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-3 col-xs-4 col-xss-6">
                    <div class="logo">
                        <a href="<?= Url::home() ?>"><img src="/uploads/img/logo.png" height="59" width="238" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5 col-sm-5 col-xs-6 col-xss-3">
                    <form action="#" id="h-search">
                        <input type="text" value="Поиск по сайту"/>
                        <input type="submit" value="" />
                        <a href="#" class="h-search_close">x</a>
                    </form>
                    <a href="#" class="h-search__link">&nbsp;</a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-2 col-xss-3">
                    <div class="dropdown h-phone">
                        <a href="#">
                            <small>Бесплатно по всей России</small>
                            <span>8 950 792-08-80 </span>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <main>
        <?php if($this->context->id != 'site') : ?>
            <br/>
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ])?>
        <?php endif; ?>
        <?= $content ?>
        <div class="push"></div>
    </main>
</div>
<footer>
    <div class="container footer-content">
        <div class="row">
            <div class="col-md-2">
                OAT
            </div>
            <div class="col-md-6">
            </div>
            <div class="col-md-4 text-right">
                ©2016 Alexander Guseynov
            </div>
        </div>
    </div>
</footer>
<?php $this->endContent(); ?>


