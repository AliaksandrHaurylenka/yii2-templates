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

    <h3><a href="https://github.com/pjhl/yii2-multilanguage/blob/master/README.ru.md" target="_blank">Документация №1</a> (не разобрался)</h3>


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

    <hr>

    <h3><a href="http://atoumus.github.io/yii2-i18n.html" target="_blank">Документация №2</a> (реализация сайта БелСтеклоПром)</h3>
    <h4>Нюансы:</h4>
    <ol>
        <li>'<code>&#39;basePath&#39; =&gt; &#39;@app/messages&#39;</code> - папка в папке frontend</li>
        <li></li>
    </ol>
  <p><a href="https://nix-tips.ru/yii2-api-guides/guide-ru-tutorial-i18n.html" target="_blank">Doc Yii2</a></p>


</div>
