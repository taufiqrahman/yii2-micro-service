<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'access_token' => $this->string(32),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        try {
            $this->insert('{{%user}}', [
                'username' => 'admin', 
                'auth_key' => Yii::$app->security->generateRandomString(), 
                'password_hash' => Yii::$app->security->generatePasswordHash('P4ssw0rd'),
                'email' => 'admin@system.com',
                'created_at' => time(),
                'updated_at' => time(),
            ]);
        } catch (Exception $e) {
            echo $e->getMessage(). "\n";
        } 
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
