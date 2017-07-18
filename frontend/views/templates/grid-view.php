<?php
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use frontend\models\Bottle;
/* @var $this yii\web\View */
use yii\helpers\Html;


$this->title = 'Таблицы в Yii2';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site">
    <h1><?= Html::encode($this->title) ?></h1>
    <code><?= __FILE__ ?></code>

    <h3><a href="https://nix-tips.ru/yii2-api-guides/guide-ru-output-data-widgets.html#gridview" target="_blank">Документация №1</a></h3>

    <h3><a href="http://yiico.ru/blog/542-yii2-gridview-vidzhet-tablitsy-dannyh" target="_blank">Документация №2</a></h3>
<?php

	$dataProvider = new ActiveDataProvider([
	    'query' => Bottle::find(),
	    'pagination' => [
	        'pageSize' => 20,
	    ],
	]);
	echo GridView::widget([
	    'dataProvider' => $dataProvider,
	]);
?>

</div>