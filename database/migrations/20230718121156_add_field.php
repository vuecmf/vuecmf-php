<?php

use think\migration\Migrator;
use think\migration\db\Column;

class AddField extends Migrator
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
        //管理员表增加父级字段
        $this->table('admin')
            ->addColumn('pid', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '父级用户ID'])
            ->update();
        //表单设置表增加placeholder字段
        $this->table('model_form')
            ->addColumn('placeholder', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '表单提示信息'])
            ->update();

        //写入初始数据
        //model_field 字段表
        $data = [
            ['id' => 260,'field_name' => 'pid','label' => '父级用户','model_id' => 8,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '父级用户ID','default_value' => 0,'is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 20,'is_fixed' => 20,'column_width' => 100,'is_filter' => 20,'sort_num' => 0,'status' => 10,],

            ['id' => 261,'field_name' => 'placeholder','label' => '表单提示','model_id' => 9,'type' => 'varchar','length' => 255,'decimal_length' => 0,'is_null' => 20,'note' => '表单提示信息','default_value' => '','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 20,'sort_num' => 88,'status' => 10,],
        ];
        $this->table('model_field')->insert($data)->save();

        //model_form 模型表单表
        $data = [
            ['id' => 273,'model_id' => 9,'model_field_id' => 261,'type' => 'text','default_value' => '','is_disabled' => 20,'sort_num' => 185,'status' => 10,],
        ];
        $this->table('model_form')->insert($data)->save();

    }

    public function down()
    {
        $this->table('admin')->removeColumn('pid')->save();
        $this->table('model_form')->removeColumn('placeholder')->save();

        $this->execute('delete from '.config('database.connections.mysql.prefix').'model_field  where id in (260, 261);');

        $this->execute('delete from '.config('database.connections.mysql.prefix').'model_form  where id = 273;');
    }
}
