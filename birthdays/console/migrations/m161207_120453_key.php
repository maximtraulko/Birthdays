<?php

use yii\db\Migration;

class m161207_120453_key extends Migration
{
    public function up()
    {

	$this->execute (ALTER TABLE `depatment` CHANGE `department_id` `department_id` INT(100) NOT NULL AUTO_INCREMENT;
	ALTER TABLE `employee` CHANGE `id` `id` INT(100) NOT NULL AUTO_INCREMENT;
	ALTER TABLE `employee` ADD FOREIGN KEY (`department_id`) REFERENCES `birthdays`.`depatment`(`department_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;);

	
	
    }

    public function down()
    {
        echo "m161207_120453_key cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
