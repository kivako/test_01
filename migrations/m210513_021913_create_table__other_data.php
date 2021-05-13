<?php

use yii\db\Migration;

/**
 * Class m210513_021913_create_table__other_data
 */
class m210513_021913_create_table__other_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            'other_data',
            [
                'id' => $this->primaryKey(),
                'c1' => $this->string(),
                'c2' => $this->integer()
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('t');
    }

}
