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
          ['label' => '5. Form Save Message', 'url' => ['/templates/form-save-message']],
            ['label' => '6. One Form', 'url' => ['/templates/one-form']],
          ['label' => '6. Загрузка файлов', 'url' => ['/templates/upload-form']],
	    ];

	    echo Nav::widget([
	        'options' => ['class' => 'nav nav-pills nav-stacked'],
	        'items' => $menuItems,
	    ]);
    ?>
</div>
