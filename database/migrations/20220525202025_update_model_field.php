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
     * Valid Column Types
        binary
        boolean
        char
        date
        datetime
        decimal
        float
        double
        smallinteger
        integer
        biginteger
        string
        text
        time
        timestamp
        uuid
     */
    public function up()
    {
        //更新表字段
        /*$this->table('model_config')->changeColumn('type', 'smallinteger');
        $this->table('model_config')->changeColumn('is_tree', 'smallinteger');
        $this->table('model_config')->changeColumn('status', 'smallinteger');

        $this->table('model_field')->changeColumn('decimal_length', 'smallinteger');
        $this->table('model_field')->changeColumn('is_null', 'smallinteger');
        $this->table('model_field')->changeColumn('is_auto_increment', 'smallinteger');
        $this->table('model_field')->changeColumn('is_label', 'smallinteger');
        $this->table('model_field')->changeColumn('is_signed', 'smallinteger');
        $this->table('model_field')->changeColumn('is_show', 'smallinteger');
        $this->table('model_field')->changeColumn('is_fixed', 'smallinteger');
        $this->table('model_field')->changeColumn('is_filter', 'smallinteger');
        $this->table('model_field')->changeColumn('status', 'smallinteger');

        $this->table('field_option')->changeColumn('type', 'smallinteger');
        $this->table('field_option')->changeColumn('status', 'smallinteger');

        $this->table('model_action')->changeColumn('status', 'smallinteger');

        $this->table('model_relation')->changeColumn('status', 'smallinteger');

        $this->table('model_index')->changeColumn('status', 'smallinteger');

        $this->table('menu')->changeColumn('type', 'smallinteger');
        $this->table('menu')->changeColumn('status', 'smallinteger');

        $this->table('admin')->changeColumn('is_super', 'smallinteger');
        $this->table('admin')->changeColumn('status', 'smallinteger');

        $this->table('model_form')->changeColumn('is_disabled', 'smallinteger');
        $this->table('model_form')->changeColumn('status', 'smallinteger');

        $this->table('model_form_rules')->changeColumn('status', 'smallinteger');

        $this->table('roles')->changeColumn('status', 'smallinteger');

        $this->table('model_form_linkage')->changeColumn('status', 'smallinteger');*/

        //更新表数据
        $this->execute('update '.config('database.connections.mysql.prefix').'model_field set type = "varchar",length = 24,default_value = "" where id in(74,76);');
        $this->execute('update '.config('database.connections.mysql.prefix').'model_field set type = "smallint" where id in(7,8,10,24,25,28,29,30,31,32,34,37,43,108,17,58,48,64,66,72,79,85,87,94,101,107);');

    }

    public function down()
    {
        //还原修改
        /*$this->table('model_config')->changeColumn('type', 'integer');
        $this->table('model_config')->changeColumn('is_tree', 'integer');
        $this->table('model_config')->changeColumn('status', 'integer');

        $this->table('model_field')->changeColumn('decimal_length', 'integer');
        $this->table('model_field')->changeColumn('is_null', 'integer');
        $this->table('model_field')->changeColumn('is_auto_increment', 'integer');
        $this->table('model_field')->changeColumn('is_label', 'integer');
        $this->table('model_field')->changeColumn('is_signed', 'integer');
        $this->table('model_field')->changeColumn('is_show', 'integer');
        $this->table('model_field')->changeColumn('is_fixed', 'integer');
        $this->table('model_field')->changeColumn('is_filter', 'integer');
        $this->table('model_field')->changeColumn('status', 'integer');

        $this->table('field_option')->changeColumn('type', 'integer');
        $this->table('field_option')->changeColumn('status', 'integer');

        $this->table('model_action')->changeColumn('status', 'integer');

        $this->table('model_relation')->changeColumn('status', 'integer');

        $this->table('model_index')->changeColumn('status', 'integer');

        $this->table('menu')->changeColumn('type', 'integer');
        $this->table('menu')->changeColumn('status', 'integer');

        $this->table('admin')->changeColumn('is_super', 'integer');
        $this->table('admin')->changeColumn('status', 'integer');

        $this->table('model_form')->changeColumn('is_disabled', 'integer');
        $this->table('model_form')->changeColumn('status', 'integer');

        $this->table('model_form_rules')->changeColumn('status', 'integer');

        $this->table('roles')->changeColumn('status', 'integer');

        $this->table('model_form_linkage')->changeColumn('status', 'integer');*/

        //还原表数据
        $this->execute('update '.config('database.connections.mysql.prefix').'model_field set type = "bigint",length = 20,default_value = 0 where id in(74,76);');
        $this->execute('update '.config('database.connections.mysql.prefix').'model_field set type = "int" where id in(7,8,10,24,25,28,29,30,31,32,34,37,43,108,17,58,48,64,66,72,79,85,87,94,101,107);');

    }
}
