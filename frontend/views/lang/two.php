<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use pjhl\multilanguage\assets\ChangeLanguageAsset;
use yii\bootstrap\Nav;

ChangeLanguageAsset::register($this);

$this->title = 'Мультиязычный сайт';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site">
    <h1><?= Html::encode($this->title) ?></h1>
    <code><?= __FILE__ ?></code>

    <h3><a href="https://github.com/pjhl/yii2-multilanguage/blob/master/README.ru.md" target="_blank">Документация</a></h3>


    <span>Переключатели языка: </span>
    <a href="#" class="multilanguage-set" data-language="1">EN</a>
    <a href="#" class="multilanguage-set" data-language="2">RU</a>

    <?php
    $menuItems = [
        ['label' => 'One', 'url' => ['/templates/multi-language']],
        ['label' => 'Two', 'url' => ['/lang/two']],
    ];

    echo Nav::widget([
        'options' => ['class' => 'nav nav-tabs'],
        'items' => $menuItems,
    ]);
    ?>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque doloremque impedit sint! Enim laborum, minima! Amet blanditiis doloribus ea eligendi illum, in maiores modi nostrum perferendis quisquam ullam, voluptate voluptatem.</p>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium blanditiis consectetur cumque eligendi, illo maiores neque nihil officia quos sequi sint vitae voluptate. Aut exercitationem natus quibusdam quidem unde voluptate?</p>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet at, consequuntur cum dolores et explicabo, facere ipsam mollitia necessitatibus neque nulla obcaecati perspiciatis placeat porro ratione rerum totam veritatis voluptas?</p>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi consequatur cumque dicta fuga hic ipsam, necessitatibus perferendis praesentium reprehenderit rerum tenetur veniam! Deserunt expedita iure non obcaecati quo repellat.</p>


</div>
