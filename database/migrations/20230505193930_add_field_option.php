<?php

use think\migration\Migrator;
use think\migration\db\Column;

class AddFieldOption extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     * biginteger
    binary
    boolean
    date
    datetime
    decimal
    float
    integer
    string
    text
    time
    timestamp
    uuid
     */
    public function up()
    {
        //field_option 字段选项表
        $data = [
            ['model_id' => 9,'model_field_id' => 163,'type' => 10,'option_value' => 'color_picker','option_label' => '颜色选择器',],
        ];
        $this->table('field_option')->insert($data)->save();

    }

    public function down()
    {
        $this->execute('delete from '.config('database.connections.mysql.prefix').'field_option  where model_field_id = 163 and option_value = "color_picker";');
    }
}
