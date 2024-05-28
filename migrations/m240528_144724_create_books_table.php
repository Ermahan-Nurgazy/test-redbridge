<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%books}}`.
 */
class m240528_144724_create_books_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%books}}', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'pages' => $this->integer()->notNull(),
            'language' => $this->string()->notNull(),
            'genre' => $this->string()->notNull(),
            'description' => $this->string()->notNull(),
        ]);

        $this->addForeignKey('fk-books-authors','{{%books}}','author_id','{{%authors}}','id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-books-authors','{{%books}}');
        $this->dropTable('{{%books}}');
    }
}
