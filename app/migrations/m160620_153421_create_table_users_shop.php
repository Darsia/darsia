<?php

use yii\db\Migration;

/**
 * Handles the creation for table `table_users_shop`.
 */
class m160620_153421_create_table_users_shop extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('darsia_users_shop', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'password' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('darsia_users_shop');
    }
}
