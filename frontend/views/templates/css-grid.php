<?php

use yii\helpers\Html;


$this->title = 'Css Grid';
$this->params['breadcrumbs'][] = $this->title;

/*$this->registerCss('
.grid div:nth-child(even) {
  background: #ccc;
}
.grid div:nth-child(odd) {
  background: red;
}
.grid {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr
}

');*/

$this->registerCssFile('@web/css/grid.css');
?>

<div class="site-templates">
  <h1><?= Html::encode($this->title) ?></h1>
  <code><?= __FILE__ ?></code>


  <div class="grid">
    <div>item-1</div>
    <div>item-2</div>
    <div>item-3</div>
    <div>item-4</div>
    <div>item-5</div>
    <div>item-6</div>
    <div>item-7</div>
    <div>item-8</div>
    <div>item-9</div>
    <div>item-10</div>
  </div>
</div>