<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use frontend\components\PrettyPhoto;

$this->title = 'prettyPhoto';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site">
    <h1><?= Html::encode($this->title) ?></h1>
    <code><?= __FILE__ ?></code>

    <?php
    	PrettyPhoto::widget();
     	/*PrettyPhoto::widget([
		     'target' => "a[rel^='prettyPhoto']",
		     'pluginOptions' => [
		         'opacity' => 0.60,
		         'theme' => PrettyPhoto::THEME_DARK_SQUARE,
		         'social_tools' => false,
		         'autoplay_slideshow' => true,
		         'modal' => true
		     ],
		 ]);*/
    ?>
</div>
