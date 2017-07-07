<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use pjhl\multilanguage\assets\ChangeLanguageAsset;
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

</div>
