<?php

use yii\db\Migration;

/**
 * Class m191212_030932_add_item
 */
class m191212_030932_add_item extends Migration
{

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        try {
            $this->insert('{{%user}}', [
                'id' => 2,
                'username' => 'testuser', 
                'auth_key' => Yii::$app->security->generateRandomString(), 
                'password_hash' => Yii::$app->security->generatePasswordHash('testuserP455'),
                'email' => 'user@system.com',
                'created_at' => time(),
                'updated_at' => time(),
            ]);
        } catch (Exception $e) {
            echo $e->getMessage(). "\n";
        } 
        try {
            $this->insert('{{%auth_item}}', [
                'name' => 'admingroup', 
                'type' => 1,
                'created_at' => time(),
                'updated_at' => time(),
            ]);
        } catch (Exception $e) {
            echo $e->getMessage(). "\n";
        } 
        try {
            $this->insert('{{%auth_item}}', [
                'name' => 'usergroup', 
                'type' => 1,
                'created_at' => time(),
                'updated_at' => time(),
            ]);
        } catch (Exception $e) {
            echo $e->getMessage(). "\n";
        } 
        try {
            $this->insert('{{%auth_item}}', [
                'name' => '/*', 
                'type' => 2,
                'created_at' => time(),
                'updated_at' => time(),
            ]);
        } catch (Exception $e) {
            echo $e->getMessage(). "\n";
        } 
        try {
            $this->insert('{{%auth_item}}', [
                'name' => '/v1/auth-test/index', 
                'type' => 2,
                'created_at' => time(),
                'updated_at' => time(),
            ]);
        } catch (Exception $e) {
            echo $e->getMessage(). "\n";
        } 
        try {
            $this->insert('{{%auth_item_child}}', [
                'parent' => 'admingroup',
                'child' => '/*', 
            ]);
        } catch (Exception $e) {
            echo $e->getMessage(). "\n";
        } 
        try {
            $this->insert('{{%auth_assignment}}', [
                'item_name' => 'admingroup',
                'user_id' => 1,
                'created_at' => time(),
            ]);
        } catch (Exception $e) {
            echo $e->getMessage(). "\n";
        } 

    }

    public function down()
    {
        try {
            $this->delete('{{%auth_assignment}}');
        } catch (Exception $e) {
            echo $e->getMessage(). "\n";
        }
        try {
            $this->delete('{{%auth_item_child}}');
        } catch (Exception $e) {
            echo $e->getMessage(). "\n";
        }
        try {
            $this->delete('{{%auth_item}}');
        } catch (Exception $e) {
            echo $e->getMessage(). "\n";
        }
        try {
            $this->delete('{{%user}}', ['id' => 2]);
        } catch (Exception $e) {
            echo $e->getMessage(). "\n";
        }
    }    
}
