<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 31.05.2017
 * Time: 20:15
 */

namespace frontend\components;

use yii\base\Widget;

class PrettyPhoto extends Widget {

    public $target;
    //public $pluginOptions = [];

    public function init()
    {
        parent::init();
        if ($this->target === null) {
            $this->target = 'a[rel^="prettyPhoto"]';
        }

    }


    public function run()
    {
        return $this -> target;
    }

} 