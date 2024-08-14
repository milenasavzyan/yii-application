<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m240724_121929_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->null()->defaultValue(null),
            'title' => $this->string()->notNull(),
            'image' => $this->string()->null(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-category-parent_id',
            '{{%category}}',
            'parent_id',
            '{{%category}}',
            'id',
            'SET NULL',
            'CASCADE'
        );
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-category-parent_id', '{{%category}}');

        $this->dropTable('{{%category}}');
    }
}
