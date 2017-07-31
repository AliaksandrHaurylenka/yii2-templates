<?php

use yii\db\Migration;

/**
 * Handles the creation of table `seve_message`.
 */
class m170731_171758_create_seve_message_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('seve_message', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'email' => $this->string(50)->notNull(),
            'phone' => $this->string(20),
            'subject' => $this->string(50)->notNull(),
            'body' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('seve_message');
    }
}
