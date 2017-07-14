<?php
//namespace frontend\models;
use Yii;
/** @var $this \yii\web\View */
/** @var $link string */
/** @var $paramExample string */
use frontend\models\ContactForm;
use frontend\assets\AppAsset;

AppAsset::register($this);


?>
<p>
	<?
		//= ContactForm::$this->email;
		//debag($email); 
	?>	
</p>

<p>The passed parameter: <?//= $paramExample ?></p>