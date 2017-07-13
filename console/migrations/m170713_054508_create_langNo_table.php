<?php

use yii\db\Migration;

/**
 * Handles the creation of table `langNo`.
 */
class m170713_054508_create_langNo_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('langNo', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('langNo');
    }
}
