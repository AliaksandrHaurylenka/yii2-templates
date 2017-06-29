<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Nav;

$this->title = 'Templates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-templates">
    <h1><?= Html::encode($this->title) ?></h1>
    <code><?= __FILE__ ?></code>

    <?php
    	$menuItems = [
	        ['label' => '1. Фотогалерея prettyPhoto', 'url' => ['/templates/pretty-photo']],
	        ['label' => '2. Модальное окно "ОБАТНАЯ СВЯЗЬ"', 'url' => ['/templates/modal-feedback']],
	        //['label' => 'About', 'url' => ['/site/about']],
	        //['label' => 'Contact', 'url' => ['/site/contact']],
	    ];

	    echo Nav::widget([
	        'options' => ['class' => 'nav nav-pills nav-stacked'],
	        'items' => $menuItems,
	    ]);
    ?>
</div>
