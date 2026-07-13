<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%student}}`.
 */
class m260713_081206_create_student_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%student}}', [
            'id' => $this->primaryKey(),
            'tenant_id' => $this->integer()->notNull(),
            'name' => $this->string(255)->notNull(),
            'phone' => $this->string(20),
            'guardian_phone' => $this->string(20),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->createIndex('idx-student-tenant_id', '{{%student}}', 'tenant_id');
    }

    public function safeDown()
    {
        $this->dropTable('{{%student}}');
    }
}
