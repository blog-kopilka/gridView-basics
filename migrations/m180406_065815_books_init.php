<?php

use yii\db\Migration;

/**
 * Class m180406_065815_books_init
 */
class m180406_065815_books_init extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%books}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'src' => $this->string(),
            'author' => $this->string()->notNull(),
            'description' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'delete' => $this->smallInteger()->notNull()->defaultValue(0),
        ], $tableOptions);
    }
    public function safeDown()
    {
        $this->dropTable('{{%books}}');
    }
}
