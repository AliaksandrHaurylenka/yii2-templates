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
	        ['label' => '3. Multi Language', 'url' => ['/templates/multi-language']],
	        ['label' => '4. GridView', 'url' => ['/templates/grid-view']],
            ['label' => '5. Form', 'url' => ['/templates/form']],
	    ];

	    echo Nav::widget([
	        'options' => ['class' => 'nav nav-pills nav-stacked'],
	        'items' => $menuItems,
	    ]);
    ?>
</div>
