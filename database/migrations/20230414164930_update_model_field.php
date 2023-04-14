<?php

use think\migration\Migrator;
use think\migration\db\Column;

class UpdateModelField extends Migrator
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
        $this->table('model_field')
            ->addColumn('is_code', 'integer', ['length' => 255, 'null' => false, 'default' => 20, 'comment' => '是否显示文本源码，10=是，20=否','after' => 'is_filter'])
            ->update();

        //写入初始数据
        //model_field 字段表
        $data = [
            ['id' => 247,'field_name' => 'is_code','label' => '显示源码','model_id' => 3,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '是否显示文本源码，10=是，20=否','default_value' => '20','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 34,'status' => 10,],
        ];
        $this->table('model_field')->insert($data)->save();

        //field_option 字段选项表
        $data = [
            ['model_id' => 3,'model_field_id' => 247,'type' => 10,'option_value' => '10','option_label' => '是',],
            ['model_id' => 3,'model_field_id' => 247,'type' => 10,'option_value' => '20','option_label' => '否',],
        ];
        $this->table('field_option')->insert($data)->save();

        //model_form 模型表单表
        $data = [
            ['id' => 265,'model_id' => 3,'model_field_id' => 247,'type' => 'radio','default_value' => '20','is_disabled' => 20,'sort_num' => 55,'status' => 10,],
        ];
        $this->table('model_form')->insert($data)->save();

    }

    public function down()
    {
        $this->table('model_field')->removeColumn('is_code')->save();

        $this->execute('delete from '.config('database.connections.mysql.prefix').'model_field  where id = 247;');
        $this->execute('delete from '.config('database.connections.mysql.prefix').'field_option  where model_field_id = 247;');
        $this->execute('delete from '.config('database.connections.mysql.prefix').'model_form  where id = 265;');
    }
}
