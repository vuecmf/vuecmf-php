<?php

use think\migration\Migrator;
use think\migration\db\Column;

class AddIsEditField extends Migrator
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
        //表单设置表增加placeholder字段
        $this->table('model_form')
            ->addColumn('is_edit', 'integer', ['length' => 255, 'null' => false, 'default' => 10, 'comment' => '可编辑：10=是，20=否'])
            ->update();

        //写入初始数据
        //model_field 字段表
        $data = [
			['id' => 262,'field_name' => 'is_edit','label' => '可编辑','model_id' => 9,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '可编辑：10=是，20=否','default_value' => '10','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 89,'status' => 10,]
        ];
        $this->table('model_field')->insert($data)->save();

        //model_form 模型表单表
        $data = [
			['id' => 274,'model_id' => 9,'model_field_id' => 262,'type' => 'radio','default_value' => '10','is_disabled' => 20,'sort_num' => 186,'status' => 10,],
        ];
        $this->table('model_form')->insert($data)->save();
		
		//field_option 字段选项表
		$data = [
			['model_id' => 9,'model_field_id' => 262,'type' => 10,'option_value' => '10','option_label' => '是',],
            ['model_id' => 9,'model_field_id' => 262,'type' => 10,'option_value' => '20','option_label' => '否',],
        ];
		$this->table('field_option')->insert($data)->save();
		
		//更新model_form 模型表单表
		$this->execute('update '.config('database.connections.mysql.prefix').'model_form set placeholder="用户名长度为4到32个字符",is_edit=20  where model_field_id = 141;');

    }

    public function down()
    {
        $this->table('model_form')->removeColumn('is_edit')->save();

        $this->execute('delete from '.config('database.connections.mysql.prefix').'model_field  where id = 262;');

        $this->execute('delete from '.config('database.connections.mysql.prefix').'model_form  where id = 274;');
		
		$this->execute('delete from '.config('database.connections.mysql.prefix').'field_option  where model_field_id = 262 and model_id = 9;');
    }
}
