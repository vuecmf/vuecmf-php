<?php

use think\migration\Migrator;
use think\migration\db\Column;

class VuecmfDatabase extends Migrator
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
        $this->table('model_config', ['id' => true,  'comment'=>'系统--模型配置管理表'])
            ->addColumn('table_name', 'string', ['length' => 64, 'null' => false, 'default' => '', 'comment' => '模型对应的表名(不含表前缘)'])
            ->addColumn('label', 'string', ['length' => 64, 'null' => false, 'default' => '', 'comment' => '模型标签'])
            ->addColumn('component_tpl', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '组件模板'])
            ->addColumn('default_action_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '默认动作ID'])
            ->addColumn('search_field_id', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '搜索字段ID，多个用竖线分隔'])
            ->addColumn('type', 'integer', ['length' => 4, 'null' => false, 'default' => 20, 'comment' => '类型：10=内置，20=扩展'])
            ->addColumn('is_tree', 'integer', ['length' => 4, 'null' => false, 'default' => 20, 'comment' => '是否为目录树：10=是，20=否'])
            ->addColumn('remark', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '模型对应表的备注'])
            ->addColumn('status', 'integer', ['length' => 4, 'null' => false, 'default' => 10, 'comment' => '状态：10=开启，20=禁用'])
            ->addIndex(['table_name'], ['unique' => true])
            ->create();

        $this->table('model_field', ['id' => true,  'comment'=>'系统--模型字段管理表'])
            ->addColumn('field_name', 'string', ['length' => 64, 'null' => false, 'default' => '', 'comment' => '字段名称'])
            ->addColumn('label', 'string', ['length' => 64, 'null' => false, 'default' => '', 'comment' => '字段中文名称'])
            ->addColumn('model_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '所属模型ID'])
            ->addColumn('type', 'string', ['length' => 20, 'null' => false, 'default' => '', 'comment' => '字段类型'])
            ->addColumn('length', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '字段长度'])
            ->addColumn('decimal_length', 'integer', ['length' => 2, 'null' => false, 'default' => 0, 'comment' => '小数位数长度'])
            ->addColumn('is_null', 'integer', ['length' => 4, 'null' => false, 'default' => 10, 'comment' => '是否为空：10=是，20=否'])
            ->addColumn('note', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '字段备注说明'])
            ->addColumn('default_value', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '默认值'])
            ->addColumn('is_auto_increment', 'integer', ['length' => 4, 'null' => false, 'default' => 20, 'comment' => '是否自动递增：10=是，20=否'])
            ->addColumn('is_label', 'integer', ['length' => 4, 'null' => false, 'default' => 20, 'comment' => '是否为标题字段：10=是，20=否'])
            ->addColumn('is_signed', 'integer', ['length' => 4, 'null' => false, 'default' => 10, 'comment' => '是否可为负数：10=是，20=否'])
            ->addColumn('is_show', 'integer', ['length' => 4, 'null' => false, 'default' => 10, 'comment' => '默认列表中显示：10=显示，20=不显示'])
            ->addColumn('is_fixed', 'integer', ['length' => 4, 'null' => false, 'default' => 20, 'comment' => '默认列表中固定：10=固定，20=不固定'])
            ->addColumn('column_width', 'integer', ['length' => 11, 'null' => false, 'default' => 150, 'comment' => '默认列宽度'])
            ->addColumn('is_filter', 'integer', ['length' => 4, 'null' => false, 'default' => 10, 'comment' => '是否可筛选：10=是，20=否'])
            ->addColumn('sort_num', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '排序(小在前)'])
            ->addColumn('status', 'integer', ['length' => 4, 'null' => false, 'default' => 10, 'comment' => '状态：10=开启，20=禁用'])
            ->addIndex(['field_name','model_id'], ['unique' => true])
            ->create();

        $this->table('field_option', ['id' => true,  'comment'=>'系统--字段的选项列表'])
            ->addColumn('model_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '所属模型ID'])
            ->addColumn('model_field_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '模型字段ID'])
            ->addColumn('option_value', 'string', ['length' => 64, 'null' => false, 'default' => '', 'comment' => '选项值'])
            ->addColumn('option_label', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '选项标签'])
            ->addColumn('type', 'integer', ['length' => 4, 'null' => false, 'default' => 20, 'comment' => '类型：10=内置，20=扩展'])
            ->addColumn('status', 'integer', ['length' => 4, 'null' => false, 'default' => 10, 'comment' => '状态：10=开启，20=禁用'])
            ->addIndex(['model_field_id','option_value'], ['unique' => true])
            ->create();

        $this->table('model_action', ['id' => true,  'comment'=>'系统--模型动作表'])
            ->addColumn('label', 'string', ['length' => 64, 'null' => false, 'default' => '', 'comment' => '动作标签'])
            ->addColumn('api_path', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '后端请求地址'])
            ->addColumn('model_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '所属模型ID'])
            ->addColumn('action_type', 'string', ['length' => 32, 'null' => false, 'default' => '', 'comment' => '动作类型'])
            ->addColumn('status', 'integer', ['length' => 4, 'null' => false, 'default' => 10, 'comment' => '状态：10=开启，20=禁用'])
            ->addIndex(['action_type','model_id'], ['unique' => true])
            ->create();

        $this->table('model_relation', ['id' => true,  'comment'=>'系统--模型关联设置表'])
            ->addColumn('model_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '模型ID'])
            ->addColumn('model_field_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '模型字段ID'])
            ->addColumn('relation_model_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '关联模型ID'])
            ->addColumn('relation_field_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '关联模型字段ID'])
            ->addColumn('relation_show_field_id', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '关联模型显示字段ID,多个逗号分隔，全部用*'])
            ->addColumn('status', 'integer', ['length' => 4, 'null' => false, 'default' => 10, 'comment' => '状态：10=开启，20=禁用'])
            ->addIndex(['model_field_id','relation_field_id'], ['unique' => true])
            ->create();

        $this->table('model_index', ['id' => true,  'comment'=>'系统--模型索引设置表'])
            ->addColumn('model_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '模型ID'])
            ->addColumn('model_field_id', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '模型字段ID, 多个用逗号分隔'])
            ->addColumn('index_type', 'string', ['length' => 32, 'null' => false, 'default' => 'NORMAL', 'comment' => '索引类型： PRIMARY=主键，NORMAL=常规，UNIQUE=唯一，FULLTEXT=全文'])
            ->addColumn('status', 'integer', ['length' => 4, 'null' => false, 'default' => 10, 'comment' => '状态：10=开启，20=禁用'])
            ->create();

        $this->table('menu', ['id' => true,  'comment'=>'系统--菜单表'])
            ->addColumn('title', 'string', ['length' => 64, 'null' => false, 'default' => '', 'comment' => '菜单标题'])
            ->addColumn('icon', 'string', ['length' => 32, 'null' => false, 'default' => '', 'comment' => '菜单图标'])
            ->addColumn('pid', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '父级DI'])
            ->addColumn('model_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '模型ID'])
            ->addColumn('type', 'integer', ['length' => 4, 'null' => false, 'default' => 20, 'comment' => '类型：10=内置，20=扩展'])
            ->addColumn('sort_num', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '排序(小在前)'])
            ->addColumn('status', 'integer', ['length' => 4, 'null' => false, 'default' => 10, 'comment' => '状态：10=开启，20=禁用'])
            ->create();

        $this->table('admin', ['id' => true,  'comment'=>'系统--管理员表'])
            ->addColumn('username', 'string', ['length' => 32, 'null' => false, 'default' => '', 'comment' => '用户名'])
            ->addColumn('password', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '密码'])
            ->addColumn('email', 'string', ['length' => 64, 'null' => false, 'default' => '', 'comment' => '邮箱'])
            ->addColumn('mobile', 'string', ['length' => 32, 'null' => false, 'default' => '', 'comment' => '手机'])
            ->addColumn('is_super', 'integer', ['length' => 4, 'null' => false, 'default' => 20, 'comment' => '超级管理员：10=是，20=否'])
            ->addColumn('reg_time', 'timestamp', ['null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '注册时间'])
            ->addColumn('reg_ip', 'string', ['length' => 24, 'null' => false, 'default' => '', 'comment' => '注册IP'])
            ->addColumn('last_login_time', 'timestamp', ['null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '最后登录时间'])
            ->addColumn('last_login_ip', 'string', ['length' => 24, 'null' => false, 'default' => '', 'comment' => '最后登录IP'])
            ->addColumn('update_time', 'timestamp', ['null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '更新时间'])
            ->addColumn('token', 'string', ['null' => false, 'default' => '', 'comment' => 'api访问token'])
            ->addColumn('status', 'integer', ['length' => 4, 'null' => false, 'default' => 10, 'comment' => '状态：10=开启，20=禁用'])
            ->addIndex(['username'], ['unique' => true])
            ->addIndex(['email'], ['unique' => true])
            ->addIndex(['mobile'], ['unique' => true])
            ->create();

        $this->table('model_form', ['id' => true,  'comment'=>'系统--模型表单表'])
            ->addColumn('model_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '模型ID'])
            ->addColumn('model_field_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '模型字段ID'])
            ->addColumn('type', 'string', ['length' => 32, 'null' => false, 'default' => '', 'comment' => '控件类型'])
            ->addColumn('default_value', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '控件默认值'])
            ->addColumn('is_disabled', 'integer', ['length' => 4, 'null' => false, 'default' => 20, 'comment' => '表单中是否禁用： 10=是，20=否'])
            ->addColumn('sort_num', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '排序(小在前)'])
            ->addColumn('status', 'integer', ['length' => 4, 'null' => false, 'default' => 10, 'comment' => '状态：10=开启，20=禁用'])
            ->addIndex(['model_field_id'], ['unique' => true])
            ->create();

        $this->table('model_form_rules', ['id' => true,  'comment'=>'系统--模型表单验证设置表'])
            ->addColumn('model_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '模型ID'])
            ->addColumn('model_form_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '模型表单ID'])
            ->addColumn('rule_type', 'string', ['length' => 32, 'null' => false, 'default' => '', 'comment' => '验证类型'])
            ->addColumn('rule_value', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '验证规则'])
            ->addColumn('error_tips', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '错误提示信息'])
            ->addColumn('status', 'integer', ['length' => 4, 'null' => false, 'default' => 10, 'comment' => '状态：10=开启，20=禁用'])
            ->create();

        $this->table('roles', ['id' => true, 'comment'=>'系统--角色表'])
            ->addColumn('role_name', 'string', ['length' => 64, 'null' => false, 'default' => '', 'comment' => '角色名称'])
            ->addColumn('app_name', 'string', ['length' => 64, 'null' => false, 'default' => '', 'comment' => '应用名称'])
            ->addColumn('pid', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '父级DI'])
            ->addColumn('id_path', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => 'ID层级路径'])
            ->addColumn('remark', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '角色的备注信息'])
            ->addColumn('status', 'integer', ['length' => 4, 'null' => false, 'default' => 10, 'comment' => '状态：10=开启，20=禁用'])
            ->addIndex(['role_name', 'app_name'], ['unique' => true])
            ->create();

        $this->table('model_form_linkage', ['id' => true,  'comment'=>'系统--模型表单联动设置表'])
            ->addColumn('model_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '模型ID'])
            ->addColumn('model_field_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '模型字段ID'])
            ->addColumn('linkage_field_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '联动表单的字段ID'])
            ->addColumn('linkage_action_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '获取联动表单数据的动作ID'])
            ->addColumn('status', 'integer', ['length' => 4, 'null' => false, 'default' => 10, 'comment' => '状态：10=开启，20=禁用'])
            ->addIndex(['model_field_id','linkage_field_id'], ['unique' => true])
            ->create();


        //写入初始数据
        $data = [
            // model_config 模型
            ['id' => 1, 'table_name' => 'model_config', 'label' => '模型配置', 'default_action_id' => 1, 'component_tpl' => 'template/content/List', 'search_field_id' => '2,3,5', 'type' => 10, 'is_tree' => 20, 'remark' => '系统--模型配置管理表', 'status' => 10],
            // model_action 模型
            ['id' => 2, 'table_name' => 'model_action', 'label' => '模型动作', 'default_action_id' => 5, 'component_tpl' => 'template/content/List', 'search_field_id' => '13,14,16', 'type' => 10, 'is_tree' => 20, 'remark' => '系统--模型动作表', 'status' => 10],
            // model_field 模型
            ['id' => 3, 'table_name' => 'model_field', 'label' => '模型字段', 'default_action_id' => 10, 'component_tpl' => 'template/content/List', 'search_field_id' => '19,20,22', 'type' => 10, 'is_tree' => 20, 'remark' => '系统--模型字段管理表', 'status' => 10],
            // field_option 模型
            ['id' => 4, 'table_name' => 'field_option', 'label' => '字段选项', 'default_action_id' => 15, 'component_tpl' => 'template/content/List', 'search_field_id' => '41,42', 'type' => 10, 'is_tree' => 20, 'remark' => '系统--字段的选项列表', 'status' => 10],
            // model_index 模型
            ['id' => 5, 'table_name' => 'model_index', 'label' => '模型索引', 'default_action_id' => 21, 'component_tpl' => 'template/content/List', 'search_field_id' => '', 'type' => 10, 'is_tree' => 20, 'remark' => '系统--模型索引设置表', 'status' => 10],
            // model_relation 模型
            ['id' => 6, 'table_name' => 'model_relation', 'label' => '模型关联', 'default_action_id' => 27, 'component_tpl' => 'template/content/List', 'search_field_id' => '51,53', 'type' => 10, 'is_tree' => 20, 'remark' => '系统--模型关联设置表', 'status' => 10],
            // menu 模型
            ['id' => 7, 'table_name' => 'menu', 'label' => '菜单', 'default_action_id' => 33, 'component_tpl' => 'template/content/List', 'search_field_id' => '60,61', 'type' => 10, 'is_tree' => 10, 'remark' => '系统--菜单表', 'status' => 10],
            // admin 模型
            ['id' => 8, 'table_name' => 'admin', 'label' => '管理员', 'default_action_id' => 40, 'component_tpl' => 'template/content/List', 'search_field_id' => '67,69,70', 'type' => 10, 'is_tree' => 20, 'remark' => '系统--管理员表', 'status' => 10],
            // model_form 模型
            ['id' => 9, 'table_name' => 'model_form', 'label' => '模型表单', 'default_action_id' => 50, 'component_tpl' => 'template/content/List', 'search_field_id' => '82,83', 'type' => 10, 'is_tree' => 20, 'remark' => '系统--模型表单设置表', 'status' => 10],
            // model_form_rules 模型
            ['id' => 10, 'table_name' => 'model_form_rules', 'label' => '模型表单验证', 'default_action_id' => 56, 'component_tpl' => 'template/content/List', 'search_field_id' => '90,91,92', 'type' => 10, 'is_tree' => 20, 'remark' => '系统--模型表单验证设置表', 'status' => 10],
            // roles 模型
            ['id' => 11, 'table_name' => 'roles', 'label' => '角色', 'default_action_id' => 62, 'component_tpl' => 'template/content/List', 'search_field_id' => '95,96', 'type' => 10, 'is_tree' => 10, 'remark' => '系统--角色表', 'status' => 10],
            // model_form_linkage 模型
            ['id' => 12, 'table_name' => 'model_form_linkage', 'label' => '模型表单联动', 'default_action_id' => 79, 'component_tpl' => 'template/content/List', 'search_field_id' => '103,104,105', 'type' => 10, 'is_tree' => 20, 'remark' => '系统--模型表单联动设置表', 'status' => 10],
            // upload_file 模型（暂无数据表）
            ['id' => 13, 'table_name' => 'upload_file', 'label' => '文件上传', 'default_action_id' => 0, 'component_tpl' => '', 'search_field_id' => '', 'type' => 10, 'is_tree' => 20, 'remark' => '系统--文件上传', 'status' => 10],
        ];
        $this->table('model_config')->insert($data)->save();

        $data = [
            //表 model_config 字段
            ['id' => 1, 'field_name' => 'id', 'label' => 'ID', 'model_id' => 1, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '自增ID', 'default_value' => 0, 'is_auto_increment' => 10, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 20,  'sort_num' => 1, 'status' => 10],
            ['id' => 2, 'field_name' => 'table_name', 'label' => '表名', 'model_id' => 1, 'type' => 'varchar', 'length' => 64, 'decimal_length' => 0, 'is_null' => 20, 'note' => '模型对应的表名(不含表前缘)', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 10, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 2, 'status' => 10],
            ['id' => 3, 'field_name' => 'label', 'label' => '模型标签', 'model_id' => 1, 'type' => 'varchar', 'length' => 64, 'decimal_length' => 0, 'is_null' => 20, 'note' => '模型标签', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 3, 'status' => 10],
            ['id' => 4, 'field_name' => 'component_tpl', 'label' => '组件模板', 'model_id' => 1, 'type' => 'varchar', 'length' => 255, 'decimal_length' => 0, 'is_null' => 20, 'note' => '组件模板', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 4, 'status' => 10],
            ['id' => 5, 'field_name' => 'default_action_id', 'label' => '默认动作', 'model_id' => 1, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '默认动作ID', 'default_value' => 0, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 5, 'status' => 10],
            ['id' => 6, 'field_name' => 'search_field_id', 'label' => '搜索字段', 'model_id' => 1, 'type' => 'varchar', 'length' => 255, 'decimal_length' => 0, 'is_null' => 20, 'note' => '搜索字段ID，多个用逗号分隔', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 300, 'is_filter' => 20,  'sort_num' => 6, 'status' => 10],
            ['id' => 7, 'field_name' => 'type', 'label' => '类型', 'model_id' => 1, 'type' => 'int', 'length' => 4, 'decimal_length' => 0, 'is_null' => 20, 'note' => '类型：10=内置，20=扩展', 'default_value' => 20, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 10,  'sort_num' => 7, 'status' => 10],
            ['id' => 8, 'field_name' => 'is_tree', 'label' => '目录树', 'model_id' => 1, 'type' => 'int', 'length' => 4, 'decimal_length' => 0, 'is_null' => 20, 'note' => '是否为目录树：10=是，20=否', 'default_value' => 20, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 10,  'sort_num' => 8, 'status' => 10],
            ['id' => 9, 'field_name' => 'remark', 'label' => '表备注', 'model_id' => 1, 'type' => 'varchar', 'length' => 255, 'decimal_length' => 0, 'is_null' => 20, 'note' => '模型对应表的备注', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 10,  'sort_num' => 9, 'status' => 10],
            ['id' => 10, 'field_name' => 'status', 'label' => '状态', 'model_id' => 1, 'type' => 'int', 'length' => 4, 'decimal_length' => 0, 'is_null' => 20, 'note' => '状态：10=开启，20=禁用', 'default_value' => 10, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 10,  'sort_num' => 10, 'status' => 10],
            //表 model_action 字段
            ['id' => 11, 'field_name' => 'id', 'label' => 'ID', 'model_id' => 2, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '自增ID', 'default_value' => 0, 'is_auto_increment' => 10, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 20,  'sort_num' => 11, 'status' => 10],
            ['id' => 13, 'field_name' => 'label', 'label' => '动作标签', 'model_id' => 2, 'type' => 'varchar', 'length' => 64, 'decimal_length' => 0, 'is_null' => 20, 'note' => '动作标签', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 10, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 13, 'status' => 10],
            ['id' => 14, 'field_name' => 'api_path', 'label' => '后端请求地址', 'model_id' => 2, 'type' => 'varchar', 'length' => 255, 'decimal_length' => 0, 'is_null' => 20, 'note' => '后端请求地址', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 14, 'status' => 10],
            ['id' => 15, 'field_name' => 'model_id', 'label' => '所属模型', 'model_id' => 2, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '所属模型ID', 'default_value' => 0, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 20,  'sort_num' => 15, 'status' => 10],
            ['id' => 16, 'field_name' => 'action_type', 'label' => '动作类型', 'model_id' => 2, 'type' => 'varchar', 'length' => 32, 'decimal_length' => 0, 'is_null' => 20, 'note' => '动作类型', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 16, 'status' => 10],
            ['id' => 17, 'field_name' => 'status', 'label' => '状态', 'model_id' => 2, 'type' => 'int', 'length' => 4, 'decimal_length' => 0, 'is_null' => 20, 'note' => '状态：10=开启，20=禁用', 'default_value' => 10, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 10,  'sort_num' => 17, 'status' => 10],
            //表 model_field 字段
            ['id' => 18, 'field_name' => 'id', 'label' => 'ID', 'model_id' => 3, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '自增ID', 'default_value' => 0, 'is_auto_increment' => 10, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 20,  'sort_num' => 18, 'status' => 10],
            ['id' => 19, 'field_name' => 'field_name', 'label' => '字段名称', 'model_id' => 3, 'type' => 'varchar', 'length' => 64, 'decimal_length' => 0, 'is_null' => 20, 'note' => '表的字段名称', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 10, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 19, 'status' => 10],
            ['id' => 20, 'field_name' => 'label', 'label' => '字段中文名', 'model_id' => 3, 'type' => 'varchar', 'length' => 64, 'decimal_length' => 0, 'is_null' => 20, 'note' => '表的字段中文名称', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 10, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 20, 'status' => 10],
            ['id' => 21, 'field_name' => 'model_id', 'label' => '所属模型', 'model_id' => 3, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '所属模型ID', 'default_value' => 0, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 20,  'sort_num' => 21, 'status' => 10],
            ['id' => 22, 'field_name' => 'type', 'label' => '字段类型', 'model_id' => 3, 'type' => 'varchar', 'length' => 20, 'decimal_length' => 0, 'is_null' => 20, 'note' => '表的字段类型', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 22, 'status' => 10],
            ['id' => 23, 'field_name' => 'length', 'label' => '字段长度', 'model_id' => 3, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '表的字段长度', 'default_value' => 0, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 10,  'sort_num' => 23, 'status' => 10],
            ['id' => 24, 'field_name' => 'decimal_length', 'label' => '小数位数', 'model_id' => 3, 'type' => 'int', 'length' => 2, 'decimal_length' => 0, 'is_null' => 20, 'note' => '表的字段为decimal类型时的小数位数', 'default_value' => 0, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 10,  'sort_num' => 24, 'status' => 10],
            ['id' => 25, 'field_name' => 'is_null', 'label' => '是否为空', 'model_id' => 3, 'type' => 'int', 'length' => 4, 'decimal_length' => 0, 'is_null' => 20, 'note' => '是否为空：10=是，20=否', 'default_value' => 10, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 10,  'sort_num' => 25, 'status' => 10],
            ['id' => 26, 'field_name' => 'note', 'label' => '字段备注', 'model_id' => 3, 'type' => 'varchar', 'length' => 255, 'decimal_length' => 0, 'is_null' => 20, 'note' => '表的字段备注说明', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 26, 'status' => 10],
            ['id' => 27, 'field_name' => 'default_value', 'label' => '默认值', 'model_id' => 3, 'type' => 'varchar', 'length' => 255, 'decimal_length' => 0, 'is_null' => 20, 'note' => '数据默认值', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 27, 'status' => 10],
            ['id' => 28, 'field_name' => 'is_auto_increment', 'label' => '自动递增', 'model_id' => 3, 'type' => 'int', 'length' => 4, 'decimal_length' => 0, 'is_null' => 20, 'note' => '是否自动递增：10=是，20=否', 'default_value' => 20, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 10,  'sort_num' => 28, 'status' => 10],
            ['id' => 29, 'field_name' => 'is_label', 'label' => '标题字段', 'model_id' => 3, 'type' => 'int', 'length' => 4, 'decimal_length' => 0, 'is_null' => 20, 'note' => '是否为标题字段：10=是，20=否', 'default_value' => 20, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 10,  'sort_num' => 29, 'status' => 10],
            ['id' => 30, 'field_name' => 'is_signed', 'label' => '可为负数', 'model_id' => 3, 'type' => 'int', 'length' => 4, 'decimal_length' => 0, 'is_null' => 20, 'note' => '是否可为负数：10=是，20=否', 'default_value' => 10, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 10,  'sort_num' => 30, 'status' => 10],
            ['id' => 31, 'field_name' => 'is_show', 'label' => '列表可显', 'model_id' => 3, 'type' => 'int', 'length' => 4, 'decimal_length' => 0, 'is_null' => 20, 'note' => '默认列表中显示：10=显示，20=不显示', 'default_value' => 10, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 10,  'sort_num' => 31, 'status' => 10],
            ['id' => 32, 'field_name' => 'is_fixed', 'label' => '固定列', 'model_id' => 3, 'type' => 'int', 'length' => 4, 'decimal_length' => 0, 'is_null' => 20, 'note' => '默认列表中固定：10=固定，20=不固定', 'default_value' => 20, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 10,  'sort_num' => 32, 'status' => 10],
            ['id' => 33, 'field_name' => 'column_width', 'label' => '列宽度', 'model_id' => 3, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '列表中默认显示宽度：0表示不限', 'default_value' => 150, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 10,  'sort_num' => 33, 'status' => 10],
            ['id' => 34, 'field_name' => 'is_filter', 'label' => '可筛选', 'model_id' => 3, 'type' => 'int', 'length' => 4, 'decimal_length' => 0, 'is_null' => 20, 'note' => '列表中是否可为筛选条件：10=是，20=否', 'default_value' => 10, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 10,  'sort_num' => 34, 'status' => 10],
            ['id' => 36, 'field_name' => 'sort_num', 'label' => '排序', 'model_id' => 3, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '表单/列表中字段的排列顺序(小在前)', 'default_value' => 0, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 10,  'sort_num' => 36, 'status' => 10],
            ['id' => 37, 'field_name' => 'status', 'label' => '状态', 'model_id' => 3, 'type' => 'int', 'length' => 4, 'decimal_length' => 0, 'is_null' => 20, 'note' => '状态：10=开启，20=禁用', 'default_value' => 10, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 10,  'sort_num' => 37, 'status' => 10],
            //表 field_option 字段
            ['id' => 38, 'field_name' => 'id', 'label' => 'ID', 'model_id' => 4, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '自增ID', 'default_value' => 0, 'is_auto_increment' => 10, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 20,  'sort_num' => 38, 'status' => 10],
            ['id' => 39, 'field_name' => 'model_id', 'label' => '所属模型', 'model_id' => 4, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '所属模型ID', 'default_value' => 0, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 20,  'sort_num' => 39, 'status' => 10],
            ['id' => 40, 'field_name' => 'model_field_id', 'label' => '模型字段', 'model_id' => 4, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '模型字段ID', 'default_value' => 0, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 20,  'sort_num' => 40, 'status' => 10],
            ['id' => 41, 'field_name' => 'option_value', 'label' => '选项值', 'model_id' => 4, 'type' => 'varchar', 'length' => 64, 'decimal_length' => 0, 'is_null' => 20, 'note' => '选项值', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 10, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 41, 'status' => 10],
            ['id' => 42, 'field_name' => 'option_label', 'label' => '选项标签', 'model_id' => 4, 'type' => 'varchar', 'length' => 255, 'decimal_length' => 0, 'is_null' => 20, 'note' => '选项标签', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 42, 'status' => 10],
            ['id' => 43, 'field_name' => 'status', 'label' => '状态', 'model_id' => 4, 'type' => 'int', 'length' => 4, 'decimal_length' => 0, 'is_null' => 20, 'note' => '状态：10=开启，20=禁用', 'default_value' => 10, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 10,  'sort_num' => 43, 'status' => 10],
            //表 model_index 字段
            ['id' => 44, 'field_name' => 'id', 'label' => 'ID', 'model_id' => 5, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '自增ID', 'default_value' => 0, 'is_auto_increment' => 10, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 20,  'sort_num' => 44, 'status' => 10],
            ['id' => 45, 'field_name' => 'model_id', 'label' => '所属模型', 'model_id' => 5, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '所属模型ID', 'default_value' => 0, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 20,  'sort_num' => 45, 'status' => 10],
            ['id' => 46, 'field_name' => 'model_field_id', 'label' => '模型字段', 'model_id' => 5, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '模型字段ID', 'default_value' => 0, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 46, 'status' => 10],
            ['id' => 47, 'field_name' => 'index_type', 'label' => '索引类型', 'model_id' => 5, 'type' => 'varchar', 'length' => 32, 'decimal_length' => 0, 'is_null' => 20, 'note' => '索引类型： PRIMARY=主键，NORMAL=常规，UNIQUE=唯一，FULLTEXT=全文', 'default_value' => 'NORMAL', 'is_auto_increment' => 20, 'is_label' => 10, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 47, 'status' => 10],
            ['id' => 48, 'field_name' => 'status', 'label' => '状态', 'model_id' => 5, 'type' => 'int', 'length' => 4, 'decimal_length' => 0, 'is_null' => 20, 'note' => '状态：10=开启，20=禁用', 'default_value' => 10, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 10,  'sort_num' => 48, 'status' => 10],
            //表 model_relation 字段
            ['id' => 49, 'field_name' => 'id', 'label' => 'ID', 'model_id' => 6, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '自增ID', 'default_value' => 0, 'is_auto_increment' => 10, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 20,  'sort_num' => 49, 'status' => 10],
            ['id' => 50, 'field_name' => 'model_id', 'label' => '所属模型', 'model_id' => 6, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '所属模型ID', 'default_value' => 0, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 20,  'sort_num' => 50, 'status' => 10],
            ['id' => 51, 'field_name' => 'model_field_id', 'label' => '模型字段', 'model_id' => 6, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '模型字段ID', 'default_value' => 0, 'is_auto_increment' => 20, 'is_label' => 10, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 20,  'sort_num' => 51, 'status' => 10],
            ['id' => 52, 'field_name' => 'relation_model_id', 'label' => '关联模型', 'model_id' => 6, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '关联模型ID', 'default_value' => 0, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 52, 'status' => 10],
            ['id' => 53, 'field_name' => 'relation_field_id', 'label' => '关联模型字段', 'model_id' => 6, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '关联模型字段ID', 'default_value' => 0, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 53, 'status' => 10],
            ['id' => 57, 'field_name' => 'relation_show_field_id', 'label' => '显示字段', 'model_id' => 6, 'type' => 'varchar', 'length' => 255, 'decimal_length' => 0, 'is_null' => 20, 'note' => '关联模型显示字段ID,多个逗号分隔，全部用*', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 57, 'status' => 10],
            ['id' => 58, 'field_name' => 'status', 'label' => '状态', 'model_id' => 6, 'type' => 'int', 'length' => 4, 'decimal_length' => 0, 'is_null' => 20, 'note' => '状态：10=开启，20=禁用', 'default_value' => 10, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 10,  'sort_num' => 58, 'status' => 10],
            //表 menu 字段
            ['id' => 59, 'field_name' => 'id', 'label' => 'ID', 'model_id' => 7, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '自增ID', 'default_value' => 0, 'is_auto_increment' => 10, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 20, 'is_fixed' => 20, 'column_width' => 0, 'is_filter' => 20,  'sort_num' => 59, 'status' => 10],
            ['id' => 60, 'field_name' => 'title', 'label' => '菜单标题', 'model_id' => 7, 'type' => 'varchar', 'length' => 64, 'decimal_length' => 0, 'is_null' => 20, 'note' => '菜单标题', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 10, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 0, 'is_filter' => 10,  'sort_num' => 60, 'status' => 10],
            ['id' => 61, 'field_name' => 'icon', 'label' => '菜单图标', 'model_id' => 7, 'type' => 'varchar', 'length' => 32, 'decimal_length' => 0, 'is_null' => 20, 'note' => '菜单图标', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 0, 'is_filter' => 10,  'sort_num' => 61, 'status' => 10],
            ['id' => 62, 'field_name' => 'pid', 'label' => '父级', 'model_id' => 7, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '父级ID', 'default_value' => 0, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 20, 'is_fixed' => 20, 'column_width' => 0, 'is_filter' => 10,  'sort_num' => 62, 'status' => 10],
            ['id' => 63, 'field_name' => 'model_id', 'label' => '模型', 'model_id' => 7, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '模型ID', 'default_value' => 0, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 0, 'is_filter' => 10,  'sort_num' => 63, 'status' => 10],
            ['id' => 64, 'field_name' => 'type', 'label' => '类型', 'model_id' => 7, 'type' => 'int', 'length' => 4, 'decimal_length' => 0, 'is_null' => 20, 'note' => '类型：10=内置，20=扩展', 'default_value' => 20, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 10,  'sort_num' => 64, 'status' => 10],
            ['id' => 65, 'field_name' => 'sort_num', 'label' => '排序', 'model_id' => 7, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '菜单的排列顺序(小在前)', 'default_value' => 0, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 0, 'is_filter' => 10,  'sort_num' => 65, 'status' => 10],
            ['id' => 66, 'field_name' => 'status', 'label' => '状态', 'model_id' => 7, 'type' => 'int', 'length' => 4, 'decimal_length' => 0, 'is_null' => 20, 'note' => '状态：10=开启，20=禁用', 'default_value' => 10, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 0, 'is_filter' => 10,  'sort_num' => 66, 'status' => 10],
            //表 admin 字段
            ['id' => 67, 'field_name' => 'id', 'label' => 'ID', 'model_id' => 8, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '自增ID', 'default_value' => 0, 'is_auto_increment' => 10, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 20,  'sort_num' => 67, 'status' => 10],
            ['id' => 68, 'field_name' => 'username', 'label' => '用户名', 'model_id' => 8, 'type' => 'varchar', 'length' => 32, 'decimal_length' => 0, 'is_null' => 20, 'note' => '用户名', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 10, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 68, 'status' => 10],
            ['id' => 69, 'field_name' => 'password', 'label' => '密码', 'model_id' => 8, 'type' => 'varchar', 'length' => 255, 'decimal_length' => 0, 'is_null' => 20, 'note' => '密码', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 20, 'is_fixed' => 20, 'column_width' => 0, 'is_filter' => 20,  'sort_num' => 69, 'status' => 10],
            ['id' => 70, 'field_name' => 'email', 'label' => '邮箱', 'model_id' => 8, 'type' => 'varchar', 'length' => 64, 'decimal_length' => 0, 'is_null' => 20, 'note' => '邮箱', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 70, 'status' => 10],
            ['id' => 71, 'field_name' => 'mobile', 'label' => '手机', 'model_id' => 8, 'type' => 'varchar', 'length' => 32, 'decimal_length' => 0, 'is_null' => 20, 'note' => '手机', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 71, 'status' => 10],
            ['id' => 72, 'field_name' => 'is_super', 'label' => '超级管理员', 'model_id' => 8, 'type' => 'int', 'length' => 4, 'decimal_length' => 0, 'is_null' => 20, 'note' => '超级管理员：10=是，20=否', 'default_value' => 20, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 72, 'status' => 10],
            ['id' => 73, 'field_name' => 'reg_time', 'label' => '注册时间', 'model_id' => 8, 'type' => 'timestamp', 'length' => 0, 'decimal_length' => 0, 'is_null' => 20, 'note' => '注册时间', 'default_value' => 'CURRENT_TIMESTAMP', 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 73, 'status' => 10],
            ['id' => 74, 'field_name' => 'reg_ip', 'label' => '注册IP', 'model_id' => 8, 'type' => 'bigint', 'length' => 20, 'decimal_length' => 0, 'is_null' => 20, 'note' => '注册IP', 'default_value' => 0, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 20,  'sort_num' => 74, 'status' => 10],
            ['id' => 75, 'field_name' => 'last_login_time', 'label' => '最后登录时间', 'model_id' => 8, 'type' => 'timestamp', 'length' => 0, 'decimal_length' => 0, 'is_null' => 20, 'note' => '最后登录时间', 'default_value' => 'CURRENT_TIMESTAMP', 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 75, 'status' => 10],
            ['id' => 76, 'field_name' => 'last_login_ip', 'label' => '最后登录IP', 'model_id' => 8, 'type' => 'bigint', 'length' => 20, 'decimal_length' => 0, 'is_null' => 20, 'note' => '最后登录IP', 'default_value' => 0, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 20,  'sort_num' => 76, 'status' => 10],
            ['id' => 77, 'field_name' => 'update_time', 'label' => '更新时间', 'model_id' => 8, 'type' => 'timestamp', 'length' => 0, 'decimal_length' => 0, 'is_null' => 20, 'note' => '更新时间', 'default_value' => 'CURRENT_TIMESTAMP', 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 77, 'status' => 10],
            ['id' => 78, 'field_name' => 'token', 'label' => '访问token', 'model_id' => 8, 'type' => 'varchar', 'length' => 255, 'decimal_length' => 0, 'is_null' => 20, 'note' => 'api访问token', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 78, 'status' => 10],
            ['id' => 79, 'field_name' => 'status', 'label' => '状态', 'model_id' => 8, 'type' => 'int', 'length' => 4, 'decimal_length' => 0, 'is_null' => 20, 'note' => '状态：10=开启，20=禁用', 'default_value' => 10, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 10,  'sort_num' => 79, 'status' => 10],
            //表 model_form 字段
            ['id' => 80, 'field_name' => 'id', 'label' => 'ID', 'model_id' => 9, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '自增ID', 'default_value' => 0, 'is_auto_increment' => 10, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 20,  'sort_num' => 80, 'status' => 10],
            ['id' => 81, 'field_name' => 'model_id', 'label' => '所属模型', 'model_id' => 9, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '所属模型ID', 'default_value' => 0, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 20,  'sort_num' => 81, 'status' => 10],
            ['id' => 82, 'field_name' => 'model_field_id', 'label' => '模型字段', 'model_id' => 9, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '模型字段ID', 'default_value' => 0, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 82, 'status' => 10],
            ['id' => 83, 'field_name' => 'type', 'label' => '控件类型', 'model_id' => 9, 'type' => 'varchar', 'length' => 32, 'decimal_length' => 0, 'is_null' => 20, 'note' => '表单控件类型', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 10, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 83, 'status' => 10],
            ['id' => 84, 'field_name' => 'default_value', 'label' => '控件默认值', 'model_id' => 9, 'type' => 'varchar', 'length' => 255, 'decimal_length' => 0, 'is_null' => 20, 'note' => '表单控件默认值', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 84, 'status' => 10],
            ['id' => 85, 'field_name' => 'is_disabled', 'label' => '是否禁用', 'model_id' => 9, 'type' => 'int', 'length' => 4, 'decimal_length' => 0, 'is_null' => 20, 'note' => '添加/编辑表单中是否禁用： 10=是，20=否', 'default_value' => 20, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 10,  'sort_num' => 85, 'status' => 10],
            ['id' => 86, 'field_name' => 'sort_num', 'label' => '排序', 'model_id' => 9, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '菜单的排列顺序(小在前)', 'default_value' => 0, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 10,  'sort_num' => 86, 'status' => 10],
            ['id' => 87, 'field_name' => 'status', 'label' => '状态', 'model_id' => 9, 'type' => 'int', 'length' => 4, 'decimal_length' => 0, 'is_null' => 20, 'note' => '状态：10=开启，20=禁用', 'default_value' => 10, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 10,  'sort_num' => 87, 'status' => 10],
            //表 model_form_rules 字段
            ['id' => 88, 'field_name' => 'id', 'label' => 'ID', 'model_id' => 10, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '自增ID', 'default_value' => 0, 'is_auto_increment' => 10, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 20,  'sort_num' => 88, 'status' => 10],
            ['id' => 89, 'field_name' => 'model_id', 'label' => '所属模型', 'model_id' => 10, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '所属模型ID', 'default_value' => 0, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 20,  'sort_num' => 89, 'status' => 10],
            ['id' => 90, 'field_name' => 'model_form_id', 'label' => '模型表单', 'model_id' => 10, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '模型表单ID', 'default_value' => 0, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 20,  'sort_num' => 90, 'status' => 10],
            ['id' => 91, 'field_name' => 'rule_type', 'label' => '验证类型', 'model_id' => 10, 'type' => 'varchar', 'length' => 32, 'decimal_length' => 0, 'is_null' => 20, 'note' => '表单验证类型', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 10, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 91, 'status' => 10],
            ['id' => 92, 'field_name' => 'rule_value', 'label' => '验证规则', 'model_id' => 10, 'type' => 'varchar', 'length' => 255, 'decimal_length' => 0, 'is_null' => 20, 'note' => '表单验证规则', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 92, 'status' => 10],
            ['id' => 93, 'field_name' => 'error_tips', 'label' => '错误提示', 'model_id' => 10, 'type' => 'varchar', 'length' => 255, 'decimal_length' => 0, 'is_null' => 20, 'note' => '表单验证不通过的错误提示信息', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 93, 'status' => 10],
            ['id' => 94, 'field_name' => 'status', 'label' => '状态', 'model_id' => 10, 'type' => 'int', 'length' => 4, 'decimal_length' => 0, 'is_null' => 20, 'note' => '状态：10=开启，20=禁用', 'default_value' => 10, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 10,  'sort_num' => 94, 'status' => 10],
            //表 roles 字段
            ['id' => 95, 'field_name' => 'id', 'label' => 'ID', 'model_id' => 11, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '自增ID', 'default_value' => 0, 'is_auto_increment' => 10, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 20,  'sort_num' => 95, 'status' => 10],
            ['id' => 96, 'field_name' => 'role_name', 'label' => '角色名称', 'model_id' => 11, 'type' => 'varchar', 'length' => 64, 'decimal_length' => 0, 'is_null' => 20, 'note' => '用户的角色名称', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 10, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 96, 'status' => 10],
            ['id' => 97, 'field_name' => 'app_name', 'label' => '应用名称', 'model_id' => 11, 'type' => 'varchar', 'length' => 64, 'decimal_length' => 0, 'is_null' => 20, 'note' => '角色所属应用名称', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 97, 'status' => 10],
            ['id' => 98, 'field_name' => 'pid', 'label' => '父级', 'model_id' => 11, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '父级ID', 'default_value' => 0, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 98, 'status' => 10],
            ['id' => 99, 'field_name' => 'id_path', 'label' => '层级路径', 'model_id' => 11, 'type' => 'varchar', 'length' => 255, 'decimal_length' => 0, 'is_null' => 20, 'note' => '角色ID层级路径', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 99, 'status' => 10],
            ['id' => 100, 'field_name' => 'remark', 'label' => '备注', 'model_id' => 11, 'type' => 'varchar', 'length' => 255, 'decimal_length' => 0, 'is_null' => 20, 'note' => '角色的备注信息', 'default_value' => '', 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 100, 'status' => 10],
            ['id' => 101, 'field_name' => 'status', 'label' => '状态', 'model_id' => 11, 'type' => 'int', 'length' => 4, 'decimal_length' => 0, 'is_null' => 20, 'note' => '状态：10=开启，20=禁用', 'default_value' => 10, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 10,  'sort_num' => 101, 'status' => 10],
            //表 model_form_linkage 字段
            ['id' => 102, 'field_name' => 'id', 'label' => 'ID', 'model_id' => 12, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '自增ID', 'default_value' => 0, 'is_auto_increment' => 10, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 20,  'sort_num' => 102, 'status' => 10],
            ['id' => 103, 'field_name' => 'model_id', 'label' => '所属模型', 'model_id' => 12, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '所属模型ID', 'default_value' => 0, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 20,  'sort_num' => 103, 'status' => 10],
            ['id' => 104, 'field_name' => 'model_field_id', 'label' => '模型字段', 'model_id' => 12, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '模型字段ID', 'default_value' => 0, 'is_auto_increment' => 20, 'is_label' => 10, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 20,  'sort_num' => 104, 'status' => 10],
            ['id' => 105, 'field_name' => 'linkage_field_id', 'label' => '联动字段', 'model_id' => 12, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '联动表单的字段ID', 'default_value' => 0, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 105, 'status' => 10],
            ['id' => 106, 'field_name' => 'linkage_action_id', 'label' => '联动动作', 'model_id' => 12, 'type' => 'int', 'length' => 11, 'decimal_length' => 0, 'is_null' => 20, 'note' => '获取联动表单数据的动作ID', 'default_value' => 0, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 150, 'is_filter' => 10,  'sort_num' => 106, 'status' => 10],
            ['id' => 107, 'field_name' => 'status', 'label' => '状态', 'model_id' => 12, 'type' => 'int', 'length' => 4, 'decimal_length' => 0, 'is_null' => 20, 'note' => '状态：10=开启，20=禁用', 'default_value' => 10, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 10,  'sort_num' => 107, 'status' => 10],
            //表 field_option 增加 type 字段
            ['id' => 108, 'field_name' => 'type', 'label' => '类型', 'model_id' => 4, 'type' => 'int', 'length' => 4, 'decimal_length' => 0, 'is_null' => 20, 'note' => '类型：10=内置，20=扩展', 'default_value' => 20, 'is_auto_increment' => 20, 'is_label' => 20, 'is_signed' => 20, 'is_show' => 10, 'is_fixed' => 20, 'column_width' => 100, 'is_filter' => 10,  'sort_num' => 108, 'status' => 10],

        ];
        $this->table('model_field')->insert($data)->save();


        $data = [
            //表model_config 索引
            ['model_id' => 1, 'model_field_id' => '2', 'index_type' => 'UNIQUE'],
            //表 model_action 索引
            ['model_id' => 2, 'model_field_id' => '15,16', 'index_type' => 'UNIQUE'],
            //表 model_field 索引
            ['model_id' => 3, 'model_field_id' => '19,21', 'index_type' => 'UNIQUE'],
            //表 field_option 索引
            ['model_id' => 4, 'model_field_id' => '40,41', 'index_type' => 'UNIQUE'],
            //表 model_relation 索引
            ['model_id' => 6, 'model_field_id' => '51,53', 'index_type' => 'UNIQUE'],
            //表 admin 索引
            ['model_id' => 8, 'model_field_id' => '68', 'index_type' => 'UNIQUE'],
            ['model_id' => 8, 'model_field_id' => '70', 'index_type' => 'UNIQUE'],
            ['model_id' => 8, 'model_field_id' => '71', 'index_type' => 'UNIQUE'],
            //表 model_form 索引
            ['model_id' => 9, 'model_field_id' => '82', 'index_type' => 'UNIQUE'],
            //表 roles 索引
            ['model_id' => 11, 'model_field_id' => '96,97', 'index_type' => 'UNIQUE'],
            //表 model_form_linkage 索引
            ['model_id' => 12, 'model_field_id' => '104,105', 'index_type' => 'UNIQUE'],

        ];
        $this->table('model_index')->insert($data)->save();

        $data = [
            ['model_id' => 1, 'model_field_id' => 4, 'type' => 10, 'option_value' => 'template/content/List', 'option_label' => '列表组件'],
            ['model_id' => 1, 'model_field_id' => 7, 'type' => 10, 'option_value' => 10, 'option_label' => '内置'],
            ['model_id' => 1, 'model_field_id' => 7, 'type' => 10, 'option_value' => 20, 'option_label' => '扩展'],
            ['model_id' => 1, 'model_field_id' => 8, 'type' => 10, 'option_value' => 10, 'option_label' => '是'],
            ['model_id' => 1, 'model_field_id' => 8, 'type' => 10, 'option_value' => 20, 'option_label' => '否'],
            ['model_id' => 1, 'model_field_id' => 10, 'type' => 10, 'option_value' => 10, 'option_label' => '开启'],
            ['model_id' => 1, 'model_field_id' => 10, 'type' => 10, 'option_value' => 20, 'option_label' => '禁用'],
            ['model_id' => 2, 'model_field_id' => 16, 'type' => 10, 'option_value' => 'action_list', 'option_label' => '获取动作列表'],
            ['model_id' => 2, 'model_field_id' => 16, 'type' => 10, 'option_value' => 'list', 'option_label' => '列表'],
            ['model_id' => 2, 'model_field_id' => 16, 'type' => 10, 'option_value' => 'detail', 'option_label' => '详情'],
            ['model_id' => 2, 'model_field_id' => 16, 'type' => 10, 'option_value' => 'save', 'option_label' => '保存'],
            ['model_id' => 2, 'model_field_id' => 16, 'type' => 10, 'option_value' => 'save_all', 'option_label' => '批量保存'],
            ['model_id' => 2, 'model_field_id' => 16, 'type' => 10, 'option_value' => 'delete', 'option_label' => '删除'],
            ['model_id' => 2, 'model_field_id' => 16, 'type' => 10, 'option_value' => 'dropdown', 'option_label' => '下拉列表'],
            ['model_id' => 2, 'model_field_id' => 16, 'type' => 10, 'option_value' => 'add_permission', 'option_label' => '设置角色权限'],
            ['model_id' => 2, 'model_field_id' => 16, 'type' => 10, 'option_value' => 'assign_role', 'option_label' => '分配角色'],
            ['model_id' => 2, 'model_field_id' => 16, 'type' => 10, 'option_value' => 'assign_users', 'option_label' => '批量分配用户'],
            ['model_id' => 2, 'model_field_id' => 16, 'type' => 10, 'option_value' => 'del_permission', 'option_label' => '删除角色权限'],
            ['model_id' => 2, 'model_field_id' => 16, 'type' => 10, 'option_value' => 'del_users', 'option_label' => '批量删除用户'],
            ['model_id' => 2, 'model_field_id' => 16, 'type' => 10, 'option_value' => 'get_all_roles', 'option_label' => '获取所有角色'],
            ['model_id' => 2, 'model_field_id' => 16, 'type' => 10, 'option_value' => 'get_all_users', 'option_label' => '获取所有用户'],
            ['model_id' => 2, 'model_field_id' => 16, 'type' => 10, 'option_value' => 'get_permission', 'option_label' => '获取角色下所有权限'],
            ['model_id' => 2, 'model_field_id' => 16, 'type' => 10, 'option_value' => 'get_roles', 'option_label' => '获取用户的角色'],
            ['model_id' => 2, 'model_field_id' => 16, 'type' => 10, 'option_value' => 'get_users', 'option_label' => '获取角色下所有用户'],
            ['model_id' => 2, 'model_field_id' => 16, 'type' => 10, 'option_value' => 'get_user_permission', 'option_label' => '获取用户权限'],
            ['model_id' => 2, 'model_field_id' => 16, 'type' => 10, 'option_value' => 'set_user_permission', 'option_label' => '设置用户权限'],
            ['model_id' => 2, 'model_field_id' => 16, 'type' => 10, 'option_value' => 'login', 'option_label' => '登录后台'],
            ['model_id' => 2, 'model_field_id' => 16, 'type' => 10, 'option_value' => 'logout', 'option_label' => '退出系统'],
            ['model_id' => 2, 'model_field_id' => 16, 'type' => 10, 'option_value' => 'nav', 'option_label' => '导航菜单'],
            ['model_id' => 2, 'model_field_id' => 16, 'type' => 10, 'option_value' => 'upload', 'option_label' => '上传文件'],
            ['model_id' => 2, 'model_field_id' => 17, 'type' => 10, 'option_value' => 10, 'option_label' => '开启'],
            ['model_id' => 2, 'model_field_id' => 17, 'type' => 10, 'option_value' => 20, 'option_label' => '禁用'],
            ['model_id' => 3, 'model_field_id' => 22, 'type' => 10, 'option_value' => 'char', 'option_label' => '固定长度字符串'],
            ['model_id' => 3, 'model_field_id' => 22, 'type' => 10, 'option_value' => 'varchar', 'option_label' => '可变长度字符串'],
            ['model_id' => 3, 'model_field_id' => 22, 'type' => 10, 'option_value' => 'text', 'option_label' => '多行文本'],
            ['model_id' => 3, 'model_field_id' => 22, 'type' => 10, 'option_value' => 'mediumtext', 'option_label' => '中型多行文本'],
            ['model_id' => 3, 'model_field_id' => 22, 'type' => 10, 'option_value' => 'longtext', 'option_label' => '大型多行文本'],
            ['model_id' => 3, 'model_field_id' => 22, 'type' => 10, 'option_value' => 'tinyint', 'option_label' => '小型数值'],
            ['model_id' => 3, 'model_field_id' => 22, 'type' => 10, 'option_value' => 'smallint', 'option_label' => '中型数值'],
            ['model_id' => 3, 'model_field_id' => 22, 'type' => 10, 'option_value' => 'int', 'option_label' => '大型数值'],
            ['model_id' => 3, 'model_field_id' => 22, 'type' => 10, 'option_value' => 'bigint', 'option_label' => '越大型数值'],
            ['model_id' => 3, 'model_field_id' => 22, 'type' => 10, 'option_value' => 'float', 'option_label' => '单精度浮点型'],
            ['model_id' => 3, 'model_field_id' => 22, 'type' => 10, 'option_value' => 'double', 'option_label' => '双精度浮点型'],
            ['model_id' => 3, 'model_field_id' => 22, 'type' => 10, 'option_value' => 'decimal', 'option_label' => '金额型'],
            ['model_id' => 3, 'model_field_id' => 22, 'type' => 10, 'option_value' => 'date', 'option_label' => '日期'],
            ['model_id' => 3, 'model_field_id' => 22, 'type' => 10, 'option_value' => 'datetime', 'option_label' => '日期时间'],
            ['model_id' => 3, 'model_field_id' => 22, 'type' => 10, 'option_value' => 'timestamp', 'option_label' => '日期时间'],
            ['model_id' => 3, 'model_field_id' => 25, 'type' => 10, 'option_value' => 10, 'option_label' => '是'],
            ['model_id' => 3, 'model_field_id' => 25, 'type' => 10, 'option_value' => 20, 'option_label' => '否'],
            ['model_id' => 3, 'model_field_id' => 28, 'type' => 10, 'option_value' => 10, 'option_label' => '是'],
            ['model_id' => 3, 'model_field_id' => 28, 'type' => 10, 'option_value' => 20, 'option_label' => '否'],
            ['model_id' => 3, 'model_field_id' => 29, 'type' => 10, 'option_value' => 10, 'option_label' => '是'],
            ['model_id' => 3, 'model_field_id' => 29, 'type' => 10, 'option_value' => 20, 'option_label' => '否'],
            ['model_id' => 3, 'model_field_id' => 30, 'type' => 10, 'option_value' => 10, 'option_label' => '是'],
            ['model_id' => 3, 'model_field_id' => 30, 'type' => 10, 'option_value' => 20, 'option_label' => '否'],
            ['model_id' => 3, 'model_field_id' => 31, 'type' => 10, 'option_value' => 10, 'option_label' => '显示'],
            ['model_id' => 3, 'model_field_id' => 31, 'type' => 10, 'option_value' => 20, 'option_label' => '不显示'],
            ['model_id' => 3, 'model_field_id' => 32, 'type' => 10, 'option_value' => 10, 'option_label' => '固定'],
            ['model_id' => 3, 'model_field_id' => 32, 'type' => 10, 'option_value' => 20, 'option_label' => '不固定'],
            ['model_id' => 3, 'model_field_id' => 34, 'type' => 10, 'option_value' => 10, 'option_label' => '是'],
            ['model_id' => 3, 'model_field_id' => 34, 'type' => 10, 'option_value' => 20, 'option_label' => '否'],
            ['model_id' => 3, 'model_field_id' => 35, 'type' => 10, 'option_value' => 10, 'option_label' => '是'],
            ['model_id' => 3, 'model_field_id' => 35, 'type' => 10, 'option_value' => 20, 'option_label' => '否'],
            ['model_id' => 3, 'model_field_id' => 37, 'type' => 10, 'option_value' => 10, 'option_label' => '开启'],
            ['model_id' => 3, 'model_field_id' => 37, 'type' => 10, 'option_value' => 20, 'option_label' => '禁用'],
            ['model_id' => 4, 'model_field_id' => 43, 'type' => 10, 'option_value' => 10, 'option_label' => '开启'],
            ['model_id' => 4, 'model_field_id' => 43, 'type' => 10, 'option_value' => 20, 'option_label' => '禁用'],
            ['model_id' => 5, 'model_field_id' => 47, 'type' => 10, 'option_value' => 'NORMAL', 'option_label' => '常规'],
            ['model_id' => 5, 'model_field_id' => 47, 'type' => 10, 'option_value' => 'UNIQUE', 'option_label' => '唯一'],
            ['model_id' => 5, 'model_field_id' => 47, 'type' => 10, 'option_value' => 'FULLTEXT', 'option_label' => '全文'],
            ['model_id' => 5, 'model_field_id' => 48, 'type' => 10, 'option_value' => 10, 'option_label' => '开启'],
            ['model_id' => 5, 'model_field_id' => 48, 'type' => 10, 'option_value' => 20, 'option_label' => '禁用'],
            ['model_id' => 6, 'model_field_id' => 58, 'type' => 10, 'option_value' => 10, 'option_label' => '开启'],
            ['model_id' => 6, 'model_field_id' => 58, 'type' => 10, 'option_value' => 20, 'option_label' => '禁用'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'map-location', 'option_label' => '定位'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'coordinate', 'option_label' => '坐标'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'alarm-clock', 'option_label' => '闹钟'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'clock', 'option_label' => '时钟'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'calendar', 'option_label' => '日历'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'apple', 'option_label' => '苹果'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'pear', 'option_label' => '梨子'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'orange', 'option_label' => '桔子'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'cherry', 'option_label' => '樱桃'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'grape', 'option_label' => '葡萄'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'watermelon', 'option_label' => '西瓜'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'burger', 'option_label' => '汉堡包'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'dessert', 'option_label' => '甜点'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'fries', 'option_label' => '薯条'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'ice-cream', 'option_label' => '冰淇淋'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'milk-tea', 'option_label' => '奶茶'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'lollipop', 'option_label' => '棒棒糖'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'sugar', 'option_label' => '糖果'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'food', 'option_label' => '食物'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'fork-spoon', 'option_label' => '叉勺'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'coffee-cup', 'option_label' => '咖啡杯'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'goblet', 'option_label' => '高脚杯'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'mug', 'option_label' => '杯子'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'bowl', 'option_label' => '碗'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'arrow-left', 'option_label' => '左箭头'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'arrow-right', 'option_label' => '右箭头'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'avatar', 'option_label' => '头像'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'user', 'option_label' => '用户'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'male', 'option_label' => '男'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'female', 'option_label' => '女'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'bell', 'option_label' => '铃'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'basketball', 'option_label' => '篮球'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'bicycle', 'option_label' => '自行车'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'ship', 'option_label' => '船'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'van', 'option_label' => '货车'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'box', 'option_label' => '箱子'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'briefcase', 'option_label' => '公文包'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'suitcase', 'option_label' => '手提箱'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'brush', 'option_label' => '刷子'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'camera', 'option_label' => '相机'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'video-camera', 'option_label' => '摄像机'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'cellphone', 'option_label' => '手机'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'phone', 'option_label' => '电话'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'headset', 'option_label' => '耳机'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'watch', 'option_label' => '手表'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'cpu', 'option_label' => 'CPU'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'microphone', 'option_label' => '麦克风'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'monitor', 'option_label' => '显示器'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'mouse', 'option_label' => '鼠标'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'printer', 'option_label' => '打印机'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'picture', 'option_label' => '图片'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'film', 'option_label' => '电影'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'video-play', 'option_label' => '播放'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'video-pause', 'option_label' => '暂停'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'chat-dot-round', 'option_label' => '聊天'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'circle-check', 'option_label' => '打钩'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'circle-close', 'option_label' => '打叉'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'circle-plus', 'option_label' => '圆形加号'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'umbrella', 'option_label' => '雨伞'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'mostly-cloudy', 'option_label' => '云朵'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'wind-power', 'option_label' => '风力'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'lightning', 'option_label' => '闪电'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'sunny', 'option_label' => '太阳'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'moon', 'option_label' => '月亮'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'star', 'option_label' => '星星'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'money', 'option_label' => '钞票'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'coin', 'option_label' => '硬币'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'credit-card', 'option_label' => '信用卡'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'wallet', 'option_label' => '钱包'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'discount', 'option_label' => '折扣'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'goods', 'option_label' => '购物袋'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'shopping-cart', 'option_label' => '购物车'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'price-tag', 'option_label' => '价格标签'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'collection-tag', 'option_label' => '收藏标签'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'compass', 'option_label' => '指南针'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'connection', 'option_label' => '连接'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'link', 'option_label' => '超链接'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'scissor', 'option_label' => '剪切'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'copy-document', 'option_label' => '复制'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'delete', 'option_label' => '删除'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'rank', 'option_label' => '移动'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'crop', 'option_label' => '裁切'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'edit', 'option_label' => '编辑'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'filter', 'option_label' => '过滤'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'upload', 'option_label' => '上传'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'download', 'option_label' => '下载'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'finished', 'option_label' => '完成'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'document', 'option_label' => '文档'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'folder', 'option_label' => '文件夹'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'data-analysis', 'option_label' => '数据分析'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'histogram', 'option_label' => '直方图'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'trend-charts', 'option_label' => '折线图'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'pie-chart', 'option_label' => '饼图'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'flag', 'option_label' => '旗帜'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'full-screen', 'option_label' => '全屏'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'grid', 'option_label' => '网格'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'guide', 'option_label' => '路标'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'help', 'option_label' => '帮助'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'view', 'option_label' => '展示'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'hide', 'option_label' => '隐藏'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'list', 'option_label' => '列表'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'house', 'option_label' => '房子'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'office-building', 'option_label' => '办公楼'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'school', 'option_label' => '学校'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'shop', 'option_label' => '商店'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'key', 'option_label' => '钥匙'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'lock', 'option_label' => '锁'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'management', 'option_label' => '管理'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'magnet', 'option_label' => '磁铁'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'medal', 'option_label' => '奖章'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'menu', 'option_label' => '菜单'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'message-box', 'option_label' => '消息盒子'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'message', 'option_label' => '信封'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'postcard', 'option_label' => '明信片'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'notebook', 'option_label' => '笔记本'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'info-filled', 'option_label' => '信息'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'warning-filled', 'option_label' => '警告'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'notification', 'option_label' => '通知'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'question-filled', 'option_label' => '问号'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'odometer', 'option_label' => '里程计'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'more', 'option_label' => '更多'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'operation', 'option_label' => '操作'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'opportunity', 'option_label' => '机会'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'paperclip', 'option_label' => '回形针'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'present', 'option_label' => '当前'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'reading', 'option_label' => '阅读'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'search', 'option_label' => '放大镜'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'zoom-in', 'option_label' => '放大镜+'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'zoom-out', 'option_label' => '放大镜-'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'setting', 'option_label' => '齿轮'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'share', 'option_label' => '分享'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'sort', 'option_label' => '排序'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'stamp', 'option_label' => '图章'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'switch-button', 'option_label' => '开关'],
            ['model_id' => 7, 'model_field_id' => 61, 'type' => 10, 'option_value' => 'takeaway-box', 'option_label' => '任务'],
            ['model_id' => 7, 'model_field_id' => 64, 'type' => 10, 'option_value' => 10, 'option_label' => '内置'],
            ['model_id' => 7, 'model_field_id' => 64, 'type' => 10, 'option_value' => 20, 'option_label' => '扩展'],
            ['model_id' => 7, 'model_field_id' => 66, 'type' => 10, 'option_value' => 10, 'option_label' => '开启'],
            ['model_id' => 7, 'model_field_id' => 66, 'type' => 10, 'option_value' => 20, 'option_label' => '禁用'],
            ['model_id' => 8, 'model_field_id' => 72, 'type' => 10, 'option_value' => 10, 'option_label' => '是'],
            ['model_id' => 8, 'model_field_id' => 72, 'type' => 10, 'option_value' => 20, 'option_label' => '否'],
            ['model_id' => 8, 'model_field_id' => 79, 'type' => 10, 'option_value' => 10, 'option_label' => '开启'],
            ['model_id' => 8, 'model_field_id' => 79, 'type' => 10, 'option_value' => 20, 'option_label' => '禁用'],
            ['model_id' => 9, 'model_field_id' => 83, 'type' => 10, 'option_value' => 'text', 'option_label' => '文本输入框'],
            ['model_id' => 9, 'model_field_id' => 83, 'type' => 10, 'option_value' => 'textarea', 'option_label' => '多行文本输入框'],
            ['model_id' => 9, 'model_field_id' => 83, 'type' => 10, 'option_value' => 'radio', 'option_label' => '单选框'],
            ['model_id' => 9, 'model_field_id' => 83, 'type' => 10, 'option_value' => 'password', 'option_label' => '密码框'],
            ['model_id' => 9, 'model_field_id' => 83, 'type' => 10, 'option_value' => 'checkbox', 'option_label' => '多选框'],
            ['model_id' => 9, 'model_field_id' => 83, 'type' => 10, 'option_value' => 'input_number', 'option_label' => '计数器'],
            ['model_id' => 9, 'model_field_id' => 83, 'type' => 10, 'option_value' => 'select', 'option_label' => '单选下拉框'],
            ['model_id' => 9, 'model_field_id' => 83, 'type' => 10, 'option_value' => 'select_mul', 'option_label' => '多选下拉框'],
            ['model_id' => 9, 'model_field_id' => 83, 'type' => 10, 'option_value' => 'switch', 'option_label' => '开关'],
            ['model_id' => 9, 'model_field_id' => 83, 'type' => 10, 'option_value' => 'date', 'option_label' => '日期日历'],
            ['model_id' => 9, 'model_field_id' => 83, 'type' => 10, 'option_value' => 'datetime', 'option_label' => '日期时间日历'],
            ['model_id' => 9, 'model_field_id' => 83, 'type' => 10, 'option_value' => 'upload_image', 'option_label' => '图片上传'],
            ['model_id' => 9, 'model_field_id' => 83, 'type' => 10, 'option_value' => 'upload_file', 'option_label' => '文件上传'],
            ['model_id' => 9, 'model_field_id' => 83, 'type' => 10, 'option_value' => 'editor', 'option_label' => '编辑器'],
            ['model_id' => 9, 'model_field_id' => 83, 'type' => 10, 'option_value' => 'hidden', 'option_label' => '隐藏域'],
            ['model_id' => 9, 'model_field_id' => 85, 'type' => 10, 'option_value' => 10, 'option_label' => '是'],
            ['model_id' => 9, 'model_field_id' => 85, 'type' => 10, 'option_value' => 20, 'option_label' => '否'],
            ['model_id' => 9, 'model_field_id' => 87, 'type' => 10, 'option_value' => 10, 'option_label' => '开启'],
            ['model_id' => 9, 'model_field_id' => 87, 'type' => 10, 'option_value' => 20, 'option_label' => '禁用'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'require', 'option_label' => '必填'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'number', 'option_label' => '纯数字(不包负数和小数点)'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'integer', 'option_label' => '整数'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'float', 'option_label' => '浮点数'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'boolean', 'option_label' => '布尔值'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'email', 'option_label' => '邮箱'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'array', 'option_label' => '数组'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'accepted', 'option_label' => '是否为(yes,on,或是1)'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'date', 'option_label' => '日期'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'alpha', 'option_label' => '纯字母'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'alphaNum', 'option_label' => '字母和数字'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'alphaDash', 'option_label' => '字母和数字，下划线_及破折号-'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'chs', 'option_label' => '纯汉字'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'chsAlpha', 'option_label' => '汉字、字母'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'chsAlphaNum', 'option_label' => '汉字、字母和数字'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'chsDash', 'option_label' => '汉字、字母、数字和下划线_及破折号-'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'cntrl', 'option_label' => '换行、缩进、空格'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'graph', 'option_label' => '可打印字符(空格除外)'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'print', 'option_label' => '可打印字符(包括空格)'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'lower', 'option_label' => '小写字符'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'upper', 'option_label' => '大写字符'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'space', 'option_label' => '空白字符(包括缩进，垂直制表符，换行符，回车和换页字符)'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'xdigit', 'option_label' => '十六进制字符串'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'activeUrl', 'option_label' => '域名或者IP'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'url', 'option_label' => 'URL地址'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'ip', 'option_label' => 'IP地址'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'dateFormat', 'option_label' => '指定格式的日期'], //dateFormat:format
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'mobile', 'option_label' => '手机号码'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'idCard', 'option_label' => '身份证号码'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'macAddr', 'option_label' => 'MAC地址'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'zip', 'option_label' => '邮政编码'],
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'in', 'option_label' => '在某个范围'], //'in:1,2,3'
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'notIn', 'option_label' => '不在某个范围'], //'notIn:1,2,3'
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'between', 'option_label' => '在某个区间'], //'between:1,10'
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'notBetween', 'option_label' => '不在某个范围'], //'notBetween:1,10'
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'length', 'option_label' => '长度是否在某个范围'], //'length:4,25' 或 'length:4'
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'max', 'option_label' => '最大长度'], //'max:25'
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'min', 'option_label' => '最小长度'], //'min:5'
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'after', 'option_label' => '在某个日期之后'], //'after:2016-3-18'
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'before', 'option_label' => '在某个日期之前'], //'before:2016-10-01'
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'expire', 'option_label' => '在某个有效日期之内'], //'expire:2016-2-1,2016-10-01'
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'allowIp', 'option_label' => 'IP是否在某个范围(多个IP用逗号分隔)'], //'allowIp:114.45.4.55'
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'denyIp', 'option_label' => 'IP是否禁止(多个IP用逗号分隔)'], //'denyIp:114.45.4.55'
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'confirm', 'option_label' => '和另外一个字段的值一致'], //confirm:password
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'different', 'option_label' => '和另外一个字段的值不一致'], //different:account
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => '=', 'option_label' => '等于某个值'], // '=:100'
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => '>=', 'option_label' => '大于等于某个值'], //'>=:100'
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => '>', 'option_label' => '大于某个值'], //'>:100'
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => '<=', 'option_label' => '小于等于某个值'], //'<=:100'
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => '<', 'option_label' => '小于某个值'], //'<:100' 或 '<:market_price' 对比其他字段大小（数值大小对比）
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'filter', 'option_label' => '支持使用filter_var进行验证'], //'filter:validate_ip'
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'regex', 'option_label' => '正则验证'], // ['regex'=>'/^(yes|on|1)$/i']
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'file', 'option_label' => '文件'], //验证是否是一个上传文件
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'image', 'option_label' => '图像文件'],  //image:width,height,type  (width height和type都是可选，width和height必须同时定义)
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'fileExt', 'option_label' => '上传文件后缀'], //fileExt:允许的文件后缀
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'fileMime', 'option_label' => '上传文件类型'], //fileMime:允许的文件类型
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'fileSize', 'option_label' => '上传文件大小'], //fileSize:允许的文件字节大小
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'token', 'option_label' => '表单令牌'], //token:表单令牌名称
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'unique', 'option_label' => '请求的字段值是否为唯一'], //unique:table,field,except,pk
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'requireIf', 'option_label' => '某个字段的值等于某个值的时候必须'], //requireIf:field,value
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'requireWith', 'option_label' => '某个字段有值的时候必须'], //requireWith:field
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'requireWithout', 'option_label' => '某个字段没有值的时候必须'], //requireWithout:field
            ['model_id' => 10, 'model_field_id' => 91, 'type' => 10, 'option_value' => 'requireCallback', 'option_label' => '某个callable为真的时候字段必须'], //requireCallback:callable
            ['model_id' => 10, 'model_field_id' => 94, 'type' => 10, 'option_value' => 10, 'option_label' => '开启'],
            ['model_id' => 10, 'model_field_id' => 94, 'type' => 10, 'option_value' => 20, 'option_label' => '禁用'],
            ['model_id' => 11, 'model_field_id' => 97, 'type' => 10, 'option_value' => 'vuecmf', 'option_label' => 'vuecmf'],
            ['model_id' => 11, 'model_field_id' => 101, 'type' => 10, 'option_value' => 10, 'option_label' => '开启'],
            ['model_id' => 11, 'model_field_id' => 101, 'type' => 10, 'option_value' => 20, 'option_label' => '禁用'],
            ['model_id' => 12, 'model_field_id' => 107, 'type' => 10, 'option_value' => 10, 'option_label' => '开启'],
            ['model_id' => 12, 'model_field_id' => 107, 'type' => 10, 'option_value' => 20, 'option_label' => '禁用'],
            ['model_id' => 4, 'model_field_id' => 108, 'type' => 10, 'option_value' => 10, 'option_label' => '内置'],
            ['model_id' => 4, 'model_field_id' => 108, 'type' => 10, 'option_value' => 20, 'option_label' => '扩展'],
        ];
        $this->table('field_option')->insert($data)->save();

        $data = [
            ['model_id' => 1, 'model_field_id' => 2, 'relation_model_id' => 0, 'relation_field_id' => 0, 'relation_show_field_id' => ''],
            ['model_id' => 1, 'model_field_id' => 5, 'relation_model_id' => 2, 'relation_field_id' => 11, 'relation_show_field_id' => '12,13'],
            ['model_id' => 1, 'model_field_id' => 6, 'relation_model_id' => 3, 'relation_field_id' => 18, 'relation_show_field_id' => '19,20'],
            ['model_id' => 2, 'model_field_id' => 15, 'relation_model_id' => 1, 'relation_field_id' => 1, 'relation_show_field_id' => '2,3'],
            ['model_id' => 3, 'model_field_id' => 21, 'relation_model_id' => 1, 'relation_field_id' => 1, 'relation_show_field_id' => '2,3'],
            ['model_id' => 4, 'model_field_id' => 39, 'relation_model_id' => 1, 'relation_field_id' => 1, 'relation_show_field_id' => '2,3'],
            ['model_id' => 4, 'model_field_id' => 40, 'relation_model_id' => 3, 'relation_field_id' => 18, 'relation_show_field_id' => '19,20'],
            ['model_id' => 5, 'model_field_id' => 45, 'relation_model_id' => 1, 'relation_field_id' => 1, 'relation_show_field_id' => '2,3'],
            ['model_id' => 5, 'model_field_id' => 46, 'relation_model_id' => 3, 'relation_field_id' => 18, 'relation_show_field_id' => '19,20'],
            ['model_id' => 6, 'model_field_id' => 50, 'relation_model_id' => 1, 'relation_field_id' => 1, 'relation_show_field_id' => '2,3'],
            ['model_id' => 6, 'model_field_id' => 51, 'relation_model_id' => 3, 'relation_field_id' => 18, 'relation_show_field_id' => '19,20'],
            ['model_id' => 6, 'model_field_id' => 52, 'relation_model_id' => 1, 'relation_field_id' => 1, 'relation_show_field_id' => '2,3'],
            ['model_id' => 6, 'model_field_id' => 53, 'relation_model_id' => 3, 'relation_field_id' => 18, 'relation_show_field_id' => '19,20'],
            ['model_id' => 6, 'model_field_id' => 57, 'relation_model_id' => 3, 'relation_field_id' => 18, 'relation_show_field_id' => '19,20'],
            ['model_id' => 7, 'model_field_id' => 63, 'relation_model_id' => 1, 'relation_field_id' => 1, 'relation_show_field_id' => '2,3'],
            ['model_id' => 9, 'model_field_id' => 81, 'relation_model_id' => 1, 'relation_field_id' => 1, 'relation_show_field_id' => '2,3'],
            ['model_id' => 9, 'model_field_id' => 82, 'relation_model_id' => 3, 'relation_field_id' => 18, 'relation_show_field_id' => '19,20'],
            ['model_id' => 10, 'model_field_id' => 89, 'relation_model_id' => 1, 'relation_field_id' => 1, 'relation_show_field_id' => '2,3'],
            ['model_id' => 10, 'model_field_id' => 90, 'relation_model_id' => 9, 'relation_field_id' => 80, 'relation_show_field_id' => '81,82,83'],
            ['model_id' => 12, 'model_field_id' => 103, 'relation_model_id' => 1, 'relation_field_id' => 1, 'relation_show_field_id' => '2,3'],
            ['model_id' => 12, 'model_field_id' => 104, 'relation_model_id' => 3, 'relation_field_id' => 18, 'relation_show_field_id' => '19,20'],
            ['model_id' => 12, 'model_field_id' => 105, 'relation_model_id' => 3, 'relation_field_id' => 18, 'relation_show_field_id' => '19,20'],
            ['model_id' => 12, 'model_field_id' => 106, 'relation_model_id' => 2, 'relation_field_id' => 11, 'relation_show_field_id' => '12,13'],

        ];
        $this->table('model_relation')->insert($data)->save();

        $data = [
            ['id' => 1, 'label' => '模型管理列表', 'api_path' => '/vuecmf/model_config', 'model_id' => 1, 'action_type' => 'list'],
            ['id' => 2, 'label' => '保存模型', 'api_path' => '/vuecmf/model_config/save', 'model_id' => 1, 'action_type' => 'save'],
            ['id' => 3, 'label' => '删除模型', 'api_path' => '/vuecmf/model_config/delete', 'model_id' => 1, 'action_type' => 'delete'],
            ['id' => 4, 'label' => '批量保存模型', 'api_path' => '/vuecmf/model_config/saveAll', 'model_id' => 1, 'action_type' => 'save_all'],

            ['id' => 5, 'label' => '模型动作管理列表', 'api_path' => '/vuecmf/model_action', 'model_id' => 2, 'action_type' => 'list'],
            ['id' => 6, 'label' => '保存模型动作', 'api_path' => '/vuecmf/model_action/save', 'model_id' => 2, 'action_type' => 'save'],
            ['id' => 7, 'label' => '删除模型动作', 'api_path' => '/vuecmf/model_action/delete', 'model_id' => 2, 'action_type' => 'delete'],
            ['id' => 8, 'label' => '动作下拉列表', 'api_path' => '/vuecmf/model_action/dropdown', 'model_id' => 2, 'action_type' => 'dropdown'],
            ['id' => 9, 'label' => '批量保存模型动作', 'api_path' => '/vuecmf/model_action/saveAll', 'model_id' => 2, 'action_type' => 'save_all'],

            ['id' => 10, 'label' => '模型字段管理列表', 'api_path' => '/vuecmf/model_field', 'model_id' => 3, 'action_type' => 'list'],
            ['id' => 11, 'label' => '保存模型字段', 'api_path' => '/vuecmf/model_field/save', 'model_id' => 3, 'action_type' => 'save'],
            ['id' => 12, 'label' => '删除模型字段', 'api_path' => '/vuecmf/model_field/delete', 'model_id' => 3, 'action_type' => 'delete'],
            ['id' => 13, 'label' => '字段下拉列表', 'api_path' => '/vuecmf/model_field/dropdown', 'model_id' => 3, 'action_type' => 'dropdown'],
            ['id' => 14, 'label' => '批量保存模型字段', 'api_path' => '/vuecmf/model_field/saveAll', 'model_id' => 3, 'action_type' => 'save_all'],

            ['id' => 15, 'label' => '字段选项管理列表', 'api_path' => '/vuecmf/field_option', 'model_id' => 4, 'action_type' => 'list'],
            ['id' => 16, 'label' => '保存字段选项', 'api_path' => '/vuecmf/field_option/save', 'model_id' => 4, 'action_type' => 'save'],
            ['id' => 17, 'label' => '删除字段选项', 'api_path' => '/vuecmf/field_option/delete', 'model_id' => 4, 'action_type' => 'delete'],
            ['id' => 20, 'label' => '批量保存字段选项', 'api_path' => '/vuecmf/field_option/saveAll', 'model_id' => 4, 'action_type' => 'save_all'],

            ['id' => 21, 'label' => '模型索引管理列表', 'api_path' => '/vuecmf/model_index', 'model_id' => 5, 'action_type' => 'list'],
            ['id' => 22, 'label' => '保存模型索引', 'api_path' => '/vuecmf/model_index/save', 'model_id' => 5, 'action_type' => 'save'],
            ['id' => 23, 'label' => '删除模型索引', 'api_path' => '/vuecmf/model_index/delete', 'model_id' => 5, 'action_type' => 'delete'],
            ['id' => 26, 'label' => '批量保存模型索引', 'api_path' => '/vuecmf/model_index/save_all', 'model_id' => 5, 'action_type' => 'save_all'],

            ['id' => 27, 'label' => '模型关联管理列表', 'api_path' => '/vuecmf/model_relation', 'model_id' => 6, 'action_type' => 'list'],
            ['id' => 28, 'label' => '保存模型关联', 'api_path' => '/vuecmf/model_relation/save', 'model_id' => 6, 'action_type' => 'save'],
            ['id' => 29, 'label' => '删除模型关联', 'api_path' => '/vuecmf/model_relation/delete', 'model_id' => 6, 'action_type' => 'delete'],
            ['id' => 32, 'label' => '批量保存模型关联', 'api_path' => '/vuecmf/model_relation/saveAll', 'model_id' => 6, 'action_type' => 'save_all'],

            ['id' => 33, 'label' => '菜单管理列表', 'api_path' => '/vuecmf/menu', 'model_id' => 7, 'action_type' => 'list'],
            ['id' => 34, 'label' => '保存菜单', 'api_path' => '/vuecmf/menu/save', 'model_id' => 7, 'action_type' => 'save'],
            ['id' => 35, 'label' => '删除菜单', 'api_path' => '/vuecmf/menu/delete', 'model_id' => 7, 'action_type' => 'delete'],
            ['id' => 38, 'label' => '导航菜单', 'api_path' => '/vuecmf/menu/nav', 'model_id' => 7, 'action_type' => 'nav'],
            ['id' => 39, 'label' => '批量保存菜单', 'api_path' => '/vuecmf/menu/saveAll', 'model_id' => 7, 'action_type' => 'save_all'],

            ['id' => 40, 'label' => '管理员列表', 'api_path' => '/vuecmf/admin', 'model_id' => 8, 'action_type' => 'list'],
            ['id' => 41, 'label' => '保存管理员', 'api_path' => '/vuecmf/admin/save', 'model_id' => 8, 'action_type' => 'save'],
            ['id' => 42, 'label' => '删除管理员', 'api_path' => '/vuecmf/admin/delete', 'model_id' => 8, 'action_type' => 'delete'],
            ['id' => 43, 'label' => '管理员详情', 'api_path' => '/vuecmf/admin/detail', 'model_id' => 8, 'action_type' => 'detail'],
            ['id' => 45, 'label' => '获取动作列表', 'api_path' => '/vuecmf/model_action/getActionList', 'model_id' => 8, 'action_type' => 'action_list'],
            ['id' => 46, 'label' => '分配角色', 'api_path' => '/vuecmf/admin/addRole', 'model_id' => 8, 'action_type' => 'assign_role'],
            ['id' => 47, 'label' => '登录后台', 'api_path' => '/vuecmf/admin/login', 'model_id' => 8, 'action_type' => 'login'],
            ['id' => 48, 'label' => '退出系统', 'api_path' => '/vuecmf/admin/logout', 'model_id' => 8, 'action_type' => 'logout'],
            ['id' => 49, 'label' => '批量保存管理员', 'api_path' => '/vuecmf/admin/saveAll', 'model_id' => 8, 'action_type' => 'save_all'],

            ['id' => 50, 'label' => '模型表单管理列表', 'api_path' => '/vuecmf/model_form', 'model_id' => 9, 'action_type' => 'list'],
            ['id' => 51, 'label' => '保存模型表单', 'api_path' => '/vuecmf/model_form/save', 'model_id' => 9, 'action_type' => 'save'],
            ['id' => 52, 'label' => '删除模型表单', 'api_path' => '/vuecmf/model_form/delete', 'model_id' => 9, 'action_type' => 'delete'],
            ['id' => 53, 'label' => '表单下拉列表', 'api_path' => '/vuecmf/model_form/dropdown', 'model_id' => 9, 'action_type' => 'dropdown'],
            ['id' => 55, 'label' => '批量保存模型表单', 'api_path' => '/vuecmf/model_form/saveAll', 'model_id' => 9, 'action_type' => 'save_all'],

            ['id' => 56, 'label' => '模型表单验证管理列表', 'api_path' => '/vuecmf/model_form_rules', 'model_id' => 10, 'action_type' => 'list'],
            ['id' => 57, 'label' => '保存模型表单验证', 'api_path' => '/vuecmf/model_form_rules/save', 'model_id' => 10, 'action_type' => 'save'],
            ['id' => 58, 'label' => '删除模型表单验证', 'api_path' => '/vuecmf/model_form_rules/delete', 'model_id' => 10, 'action_type' => 'delete'],
            ['id' => 61, 'label' => '批量保存模型表单验证', 'api_path' => '/vuecmf/model_form_rules/saveAll', 'model_id' => 10, 'action_type' => 'save_all'],

            ['id' => 62, 'label' => '角色管理列表', 'api_path' => '/vuecmf/roles', 'model_id' => 11, 'action_type' => 'list'],
            ['id' => 63, 'label' => '保存角色', 'api_path' => '/vuecmf/roles/save', 'model_id' => 11, 'action_type' => 'save'],
            ['id' => 64, 'label' => '删除角色', 'api_path' => '/vuecmf/roles/delete', 'model_id' => 11, 'action_type' => 'delete'],
            ['id' => 66, 'label' => '批量保存角色', 'api_path' => '/vuecmf/roles/saveAll', 'model_id' => 11, 'action_type' => 'save_all'],
            ['id' => 67, 'label' => '获取动作列表', 'api_path' => '/vuecmf/model_action/getActionList', 'model_id' => 11, 'action_type' => 'action_list'],

            ['id' => 68, 'label' => '批量分配用户', 'api_path' => '/vuecmf/roles/addUsers', 'model_id' => 11, 'action_type' => 'assign_users'],
            ['id' => 69, 'label' => '批量删除用户', 'api_path' => '/vuecmf/roles/delUsers', 'model_id' => 11, 'action_type' => 'del_users'],
            ['id' => 70, 'label' => '设置角色权限', 'api_path' => '/vuecmf/roles/addPermission', 'model_id' => 11, 'action_type' => 'add_permission'],
            ['id' => 71, 'label' => '删除角色权限', 'api_path' => '/vuecmf/roles/delPermission', 'model_id' => 11, 'action_type' => 'del_permission'],
            ['id' => 72, 'label' => '获取角色下所有用户', 'api_path' => '/vuecmf/roles/getUsers', 'model_id' => 11, 'action_type' => 'get_users'],
            ['id' => 73, 'label' => '获取角色下所有权限', 'api_path' => '/vuecmf/roles/getPermission', 'model_id' => 11, 'action_type' => 'get_permission'],
            ['id' => 74, 'label' => '获取所有用户', 'api_path' => '/vuecmf/roles/getAllUsers', 'model_id' => 11, 'action_type' => 'get_all_users'],

            ['id' => 75, 'label' => '获取所有角色', 'api_path' => '/vuecmf/admin/getAllRoles', 'model_id' => 8, 'action_type' => 'get_all_roles'],
            ['id' => 76, 'label' => '获取用户的角色', 'api_path' => '/vuecmf/admin/getRoles', 'model_id' => 8, 'action_type' => 'get_roles'],
            ['id' => 77, 'label' => '设置用户权限', 'api_path' => '/vuecmf/admin/setUserPermission', 'model_id' => 8, 'action_type' => 'set_user_permission'],
            ['id' => 78, 'label' => '获取用户权限', 'api_path' => '/vuecmf/admin/getUserPermission', 'model_id' => 8, 'action_type' => 'get_user_permission'],

            ['id' => 79, 'label' => '模型联动设置列表', 'api_path' => '/vuecmf/model_form_linkage', 'model_id' => 12, 'action_type' => 'list'],
            ['id' => 80, 'label' => '保存模型联动设置', 'api_path' => '/vuecmf/model_form_linkage/save', 'model_id' => 12, 'action_type' => 'save'],
            ['id' => 81, 'label' => '删除模型联动设置', 'api_path' => '/vuecmf/model_form_linkage/delete', 'model_id' => 12, 'action_type' => 'delete'],
            ['id' => 82, 'label' => '批量保存模型联动设置', 'api_path' => '/vuecmf/model_form_linkage/saveAll', 'model_id' => 12, 'action_type' => 'save_all'],

            ['id' => 83, 'label' => '文件上传', 'api_path' => '/vuecmf/upload', 'model_id' => 13, 'action_type' => 'upload'],
        ];
        $this->table('model_action')->insert($data)->save();

        $data = [
            //admin表
            ['id' => 1, 'model_id' => 8, 'model_field_id' => 68, 'type' => 'text', 'default_value' => '', 'sort_num' => 1],
            ['id' => 2, 'model_id' => 8, 'model_field_id' => 69, 'type' => 'password', 'default_value' => '', 'sort_num' => 2],
            ['id' => 3, 'model_id' => 8, 'model_field_id' => 70, 'type' => 'text', 'default_value' => '', 'sort_num' => 3],
            ['id' => 4, 'model_id' => 8, 'model_field_id' => 71, 'type' => 'text', 'default_value' => '', 'sort_num' => 4],
            ['id' => 5, 'model_id' => 8, 'model_field_id' => 72, 'type' => 'radio', 'default_value' => '20', 'sort_num' => 5],
            //roles表
            ['id' => 6, 'model_id' => 11, 'model_field_id' => 96, 'type' => 'text', 'default_value' => '', 'sort_num' => 6],
            ['id' => 7, 'model_id' => 11, 'model_field_id' => 97, 'type' => 'select', 'default_value' => '', 'sort_num' => 7],
            ['id' => 8, 'model_id' => 11, 'model_field_id' => 98, 'type' => 'select', 'default_value' => '', 'sort_num' => 8],
            ['id' => 9, 'model_id' => 11, 'model_field_id' => 100, 'type' => 'textarea', 'default_value' => '', 'sort_num' => 9],
            ['id' => 10, 'model_id' => 11, 'model_field_id' => 101, 'type' => 'radio', 'default_value' => '10', 'sort_num' => 10],
            //menu表
            ['id' => 11, 'model_id' => 7, 'model_field_id' => 60, 'type' => 'text', 'default_value' => '', 'sort_num' => 11],
            ['id' => 12, 'model_id' => 7, 'model_field_id' => 61, 'type' => 'select', 'default_value' => '', 'sort_num' => 12],
            ['id' => 13, 'model_id' => 7, 'model_field_id' => 62, 'type' => 'select', 'default_value' => '', 'sort_num' => 13],
            ['id' => 14, 'model_id' => 7, 'model_field_id' => 63, 'type' => 'select', 'default_value' => '', 'sort_num' => 14],
            ['id' => 15, 'model_id' => 7, 'model_field_id' => 65, 'type' => 'text', 'default_value' => '', 'sort_num' => 15],
            ['id' => 16, 'model_id' => 7, 'model_field_id' => 66, 'type' => 'radio', 'default_value' => '10', 'sort_num' => 16],
            //model_config表
            ['id' => 17, 'model_id' => 1, 'model_field_id' => 2, 'type' => 'text', 'default_value' => '', 'sort_num' => 17],
            ['id' => 18, 'model_id' => 1, 'model_field_id' => 3, 'type' => 'text', 'default_value' => '', 'sort_num' => 18],
            ['id' => 19, 'model_id' => 1, 'model_field_id' => 4, 'type' => 'select', 'default_value' => 'template/content/List', 'sort_num' => 19],
            ['id' => 20, 'model_id' => 1, 'model_field_id' => 5, 'type' => 'select', 'default_value' => '', 'sort_num' => 20],
            ['id' => 21, 'model_id' => 1, 'model_field_id' => 6, 'type' => 'select_mul', 'default_value' => '', 'sort_num' => 21],
            ['id' => 23, 'model_id' => 1, 'model_field_id' => 8, 'type' => 'radio', 'default_value' => '20', 'sort_num' => 23],
            ['id' => 24, 'model_id' => 1, 'model_field_id' => 9, 'type' => 'textarea', 'default_value' => '', 'sort_num' => 24],
            ['id' => 25, 'model_id' => 1, 'model_field_id' => 10, 'type' => 'radio', 'default_value' => '10', 'sort_num' => 25],
            //model_field表
            ['id' => 26, 'model_id' => 3, 'model_field_id' => 19, 'type' => 'text', 'default_value' => '', 'sort_num' => 26],
            ['id' => 27, 'model_id' => 3, 'model_field_id' => 20, 'type' => 'text', 'default_value' => '', 'sort_num' => 27],
            ['id' => 28, 'model_id' => 3, 'model_field_id' => 21, 'type' => 'select', 'default_value' => '', 'sort_num' => 28],
            ['id' => 29, 'model_id' => 3, 'model_field_id' => 22, 'type' => 'select', 'default_value' => '', 'sort_num' => 29],
            ['id' => 30, 'model_id' => 3, 'model_field_id' => 23, 'type' => 'input_number', 'default_value' => '', 'sort_num' => 30],
            ['id' => 31, 'model_id' => 3, 'model_field_id' => 24, 'type' => 'input_number', 'default_value' => '0', 'sort_num' => 31],
            ['id' => 32, 'model_id' => 3, 'model_field_id' => 25, 'type' => 'radio', 'default_value' => '10', 'sort_num' => 32],
            ['id' => 33, 'model_id' => 3, 'model_field_id' => 27, 'type' => 'text', 'default_value' => '', 'sort_num' => 33],
            ['id' => 34, 'model_id' => 3, 'model_field_id' => 26, 'type' => 'textarea', 'default_value' => '', 'sort_num' => 34],
            ['id' => 35, 'model_id' => 3, 'model_field_id' => 28, 'type' => 'radio', 'default_value' => '20', 'sort_num' => 35],
            ['id' => 36, 'model_id' => 3, 'model_field_id' => 29, 'type' => 'radio', 'default_value' => '20', 'sort_num' => 36],
            ['id' => 37, 'model_id' => 3, 'model_field_id' => 30, 'type' => 'radio', 'default_value' => '10', 'sort_num' => 37],
            ['id' => 38, 'model_id' => 3, 'model_field_id' => 31, 'type' => 'radio', 'default_value' => '10', 'sort_num' => 38],
            ['id' => 39, 'model_id' => 3, 'model_field_id' => 32, 'type' => 'radio', 'default_value' => '20', 'sort_num' => 39],
            ['id' => 40, 'model_id' => 3, 'model_field_id' => 33, 'type' => 'input_number', 'default_value' => '150', 'sort_num' => 40],
            ['id' => 41, 'model_id' => 3, 'model_field_id' => 34, 'type' => 'radio', 'default_value' => '10', 'sort_num' => 41],
            ['id' => 42, 'model_id' => 3, 'model_field_id' => 36, 'type' => 'input_number', 'default_value' => '0', 'sort_num' => 42],
            ['id' => 43, 'model_id' => 3, 'model_field_id' => 37, 'type' => 'radio', 'default_value' => '10', 'sort_num' => 43],
            //field_option表
            ['id' => 44, 'model_id' => 4, 'model_field_id' => 39, 'type' => 'select', 'default_value' => '', 'sort_num' => 44],
            ['id' => 45, 'model_id' => 4, 'model_field_id' => 40, 'type' => 'select', 'default_value' => '', 'sort_num' => 45],
            ['id' => 46, 'model_id' => 4, 'model_field_id' => 41, 'type' => 'text', 'default_value' => '', 'sort_num' => 46],
            ['id' => 47, 'model_id' => 4, 'model_field_id' => 42, 'type' => 'text', 'default_value' => '', 'sort_num' => 47],
            ['id' => 48, 'model_id' => 4, 'model_field_id' => 43, 'type' => 'radio', 'default_value' => '10', 'sort_num' => 48],
            //model_index表
            ['id' => 49, 'model_id' => 5, 'model_field_id' => 45, 'type' => 'select', 'default_value' => '', 'sort_num' => 49],
            ['id' => 50, 'model_id' => 5, 'model_field_id' => 46, 'type' => 'select_mul', 'default_value' => '', 'sort_num' => 50],
            ['id' => 51, 'model_id' => 5, 'model_field_id' => 47, 'type' => 'select', 'default_value' => 'NORMAL', 'sort_num' => 51],
            ['id' => 52, 'model_id' => 5, 'model_field_id' => 48, 'type' => 'radio', 'default_value' => '10', 'sort_num' => 52],
            //model_relation表
            ['id' => 53, 'model_id' => 6, 'model_field_id' => 50, 'type' => 'select', 'default_value' => '', 'sort_num' => 53],
            ['id' => 54, 'model_id' => 6, 'model_field_id' => 51, 'type' => 'select', 'default_value' => '', 'sort_num' => 54],
            ['id' => 55, 'model_id' => 6, 'model_field_id' => 52, 'type' => 'select', 'default_value' => '', 'sort_num' => 55],
            ['id' => 56, 'model_id' => 6, 'model_field_id' => 53, 'type' => 'select', 'default_value' => '', 'sort_num' => 56],
            ['id' => 59, 'model_id' => 6, 'model_field_id' => 57, 'type' => 'select_mul', 'default_value' => '', 'sort_num' => 59],
            ['id' => 60, 'model_id' => 6, 'model_field_id' => 58, 'type' => 'radio', 'default_value' => '10', 'sort_num' => 60],
            //model_action表
            ['id' => 62, 'model_id' => 2, 'model_field_id' => 13, 'type' => 'text', 'default_value' => '', 'sort_num' => 62],
            ['id' => 63, 'model_id' => 2, 'model_field_id' => 14, 'type' => 'text', 'default_value' => '', 'sort_num' => 63],
            ['id' => 64, 'model_id' => 2, 'model_field_id' => 15, 'type' => 'select', 'default_value' => '', 'sort_num' => 64],
            ['id' => 65, 'model_id' => 2, 'model_field_id' => 16, 'type' => 'select', 'default_value' => '', 'sort_num' => 65],
            ['id' => 66, 'model_id' => 2, 'model_field_id' => 17, 'type' => 'radio', 'default_value' => '10', 'sort_num' => 66],
            //model_form表
            ['id' => 67, 'model_id' => 9, 'model_field_id' => 81, 'type' => 'select', 'default_value' => '', 'sort_num' => 67],
            ['id' => 68, 'model_id' => 9, 'model_field_id' => 82, 'type' => 'select', 'default_value' => '', 'sort_num' => 68],
            ['id' => 69, 'model_id' => 9, 'model_field_id' => 83, 'type' => 'select', 'default_value' => '', 'sort_num' => 69],
            ['id' => 70, 'model_id' => 9, 'model_field_id' => 84, 'type' => 'text', 'default_value' => '', 'sort_num' => 70],
            ['id' => 71, 'model_id' => 9, 'model_field_id' => 85, 'type' => 'radio', 'default_value' => '20', 'sort_num' => 71],
            ['id' => 72, 'model_id' => 9, 'model_field_id' => 86, 'type' => 'input_number', 'default_value' => '0', 'sort_num' => 72],
            ['id' => 73, 'model_id' => 9, 'model_field_id' => 87, 'type' => 'radio', 'default_value' => '10', 'sort_num' => 73],
            //model_form_rules表
            ['id' => 74, 'model_id' => 10, 'model_field_id' => 89, 'type' => 'select', 'default_value' => '', 'sort_num' => 74],
            ['id' => 75, 'model_id' => 10, 'model_field_id' => 90, 'type' => 'select', 'default_value' => '', 'sort_num' => 75],
            ['id' => 76, 'model_id' => 10, 'model_field_id' => 91, 'type' => 'select', 'default_value' => '', 'sort_num' => 76],
            ['id' => 77, 'model_id' => 10, 'model_field_id' => 92, 'type' => 'text', 'default_value' => '', 'sort_num' => 77],
            ['id' => 78, 'model_id' => 10, 'model_field_id' => 93, 'type' => 'text', 'default_value' => '', 'sort_num' => 78],
            ['id' => 79, 'model_id' => 10, 'model_field_id' => 94, 'type' => 'radio', 'default_value' => '10', 'sort_num' => 79],
            //model_form_linkage表
            ['id' => 80, 'model_id' => 12, 'model_field_id' => 103, 'type' => 'select', 'default_value' => '', 'sort_num' => 80],
            ['id' => 81, 'model_id' => 12, 'model_field_id' => 104, 'type' => 'select', 'default_value' => '', 'sort_num' => 81],
            ['id' => 82, 'model_id' => 12, 'model_field_id' => 105, 'type' => 'select', 'default_value' => '', 'sort_num' => 82],
            ['id' => 83, 'model_id' => 12, 'model_field_id' => 106, 'type' => 'select', 'default_value' => '', 'sort_num' => 83],
            ['id' => 84, 'model_id' => 12, 'model_field_id' => 107, 'type' => 'radio', 'default_value' => '10', 'sort_num' => 84],

        ];
        $this->table('model_form')->insert($data)->save();

        $data = [
            //admin表单校验规则
            ['model_id' => 8, 'model_form_id' => 1, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '用户名必填'],
            ['model_id' => 8, 'model_form_id' => 1, 'rule_type' => 'length', 'rule_value' => '4,32', 'error_tips' => '用户名长度为4到32个字符'],
            ['model_id' => 8, 'model_form_id' => 3, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '邮箱必填'],
            ['model_id' => 8, 'model_form_id' => 3, 'rule_type' => 'email', 'rule_value' => '', 'error_tips' => '邮箱输入有误'],
            ['model_id' => 8, 'model_form_id' => 4, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '手机必填'],
            ['model_id' => 8, 'model_form_id' => 4, 'rule_type' => 'mobile', 'rule_value' => '', 'error_tips' => '手机输入有误'],
            //roles表单校验规则
            ['model_id' => 11, 'model_form_id' => 6, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '角色名称必填'],
            //menu表单校验规则
            ['model_id' => 7, 'model_form_id' => 11, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '菜单标题必填'],
            //model_config表单校验规则
            ['model_id' => 1, 'model_form_id' => 17, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '表名必填'],
            ['model_id' => 1, 'model_form_id' => 18, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '模型标签必填'],
            ['model_id' => 1, 'model_form_id' => 19, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '请选择'],
            //model_field表单校验规则
            ['model_id' => 3, 'model_form_id' => 26, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '字段名称必填'],
            ['model_id' => 3, 'model_form_id' => 27, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '字段中文名必填'],
            ['model_id' => 3, 'model_form_id' => 28, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '请选择'],
            ['model_id' => 3, 'model_form_id' => 29, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '请选择'],
            ['model_id' => 3, 'model_form_id' => 30, 'rule_type' => 'number', 'rule_value' => '', 'error_tips' => '请输入数字'],
            //field_option表单校验规则
            ['model_id' => 4, 'model_form_id' => 44, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '请选择'],
            ['model_id' => 4, 'model_form_id' => 45, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '请选择'],
            ['model_id' => 4, 'model_form_id' => 46, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '选项值必填'],
            ['model_id' => 4, 'model_form_id' => 47, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '选项标签必填'],
            //model_index表单校验规则
            ['model_id' => 5, 'model_form_id' => 49, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '请选择'],
            ['model_id' => 5, 'model_form_id' => 50, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '请选择'],
            ['model_id' => 5, 'model_form_id' => 51, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '请选择'],
            //model_relation表单校验规则
            ['model_id' => 6, 'model_form_id' => 53, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '请选择'],
            ['model_id' => 6, 'model_form_id' => 54, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '请选择'],
            ['model_id' => 6, 'model_form_id' => 55, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '请选择'],
            ['model_id' => 6, 'model_form_id' => 56, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '请选择'],
            ['model_id' => 6, 'model_form_id' => 59, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '请选择'],
            //model_action表单校验规则
            ['model_id' => 2, 'model_form_id' => 62, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '动作标签必填'],
            ['model_id' => 2, 'model_form_id' => 63, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '后端请求地址必填'],
            ['model_id' => 2, 'model_form_id' => 64, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '请选择'],
            ['model_id' => 2, 'model_form_id' => 65, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '请选择'],
            //model_form表单校验规则
            ['model_id' => 9, 'model_form_id' => 67, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '请选择'],
            ['model_id' => 9, 'model_form_id' => 68, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '请选择'],
            ['model_id' => 9, 'model_form_id' => 69, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '请选择'],
            //model_form_rules表单校验规则
            ['model_id' => 10, 'model_form_id' => 74, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '请选择'],
            ['model_id' => 10, 'model_form_id' => 75, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '请选择'],
            ['model_id' => 10, 'model_form_id' => 76, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '请选择'],
            //model_form_linkage表单校验规则
            ['model_id' => 12, 'model_form_id' => 80, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '请选择'],
            ['model_id' => 12, 'model_form_id' => 81, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '请选择'],
            ['model_id' => 12, 'model_form_id' => 82, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '请选择'],
            ['model_id' => 12, 'model_form_id' => 83, 'rule_type' => 'require', 'rule_value' => '', 'error_tips' => '请选择'],
        ];
        $this->table('model_form_rules')->insert($data)->save();

        $data = [
            //password = 123456
            ['username' => 'vuecmf', 'password' => '$2y$10$aG.oLBIHALyWQj6lwHwag.ObD4mO3PU1GNntzOdKgpeOc96SHIVIy', 'email' => '2278667823@qq.com', 'mobile' => '18988888888', 'is_super' => 10],
        ];
        $this->table('admin')->insert($data)->save();

        $data = [
            ['id' => 1, 'title' => '系统管理', 'icon' => 'setting', 'pid' => 0, 'model_id' => 0, 'type' => 10, 'sort_num' => 999999, 'status' => 10],
            ['id' => 2, 'title' => '系统授权', 'icon' => 'lock', 'pid' => 1, 'model_id' => 0, 'type' => 10, 'sort_num' => 2, 'status' => 10],
            ['id' => 3, 'title' => '管理员', 'icon' => 'user', 'pid' => 2, 'model_id' => 8, 'type' => 10, 'sort_num' => 3, 'status' => 10],
            ['id' => 4, 'title' => '角色', 'icon' => 'document', 'pid' => 2, 'model_id' => 11, 'type' => 10, 'sort_num' => 4, 'status' => 10],
            ['id' => 5, 'title' => '模型配置', 'icon' => 'document-copy', 'pid' => 1, 'model_id' => 1, 'type' => 10, 'sort_num' => 5, 'status' => 10],
            ['id' => 6, 'title' => '菜单配置', 'icon' => 'notebook', 'pid' => 1, 'model_id' => 7, 'type' => 10, 'sort_num' => 6, 'status' => 10],
        ];
        $this->table('menu')->insert($data)->save();

        $data = [
            ['model_id' => 1, 'model_field_id' => 2, 'linkage_field_id' => 5, 'linkage_action_id' => 8, 'status' => 10],
            ['model_id' => 1, 'model_field_id' => 2, 'linkage_field_id' => 6, 'linkage_action_id' => 13, 'status' => 10],
            ['model_id' => 4, 'model_field_id' => 39, 'linkage_field_id' => 40, 'linkage_action_id' => 13, 'status' => 10],
            ['model_id' => 5, 'model_field_id' => 45, 'linkage_field_id' => 46, 'linkage_action_id' => 13, 'status' => 10],
            ['model_id' => 6, 'model_field_id' => 50, 'linkage_field_id' => 51, 'linkage_action_id' => 13, 'status' => 10],
            ['model_id' => 6, 'model_field_id' => 52, 'linkage_field_id' => 53, 'linkage_action_id' => 13, 'status' => 10],
            ['model_id' => 6, 'model_field_id' => 52, 'linkage_field_id' => 57, 'linkage_action_id' => 13, 'status' => 10],
            ['model_id' => 9, 'model_field_id' => 81, 'linkage_field_id' => 82, 'linkage_action_id' => 13, 'status' => 10],
            ['model_id' => 10, 'model_field_id' => 89, 'linkage_field_id' => 90, 'linkage_action_id' => 53, 'status' => 10],
            ['model_id' => 12, 'model_field_id' => 103, 'linkage_field_id' => 104, 'linkage_action_id' => 13, 'status' => 10],
            ['model_id' => 12, 'model_field_id' => 103, 'linkage_field_id' => 105, 'linkage_action_id' => 13, 'status' => 10],
            ['model_id' => 12, 'model_field_id' => 105, 'linkage_field_id' => 106, 'linkage_action_id' => 8, 'status' => 10],
        ];
        $this->table('model_form_linkage')->insert($data)->save();

    }

    public function down()
    {
        $this->table('model_config')->drop();
        $this->table('model_field')->drop();
        $this->table('field_option')->drop();
        $this->table('model_action')->drop();
        $this->table('model_relation')->drop();
        $this->table('model_index')->drop();
        $this->table('menu')->drop();
        $this->table('admin')->drop();
        $this->table('model_form')->drop();
        $this->table('model_form_rules')->drop();
        $this->table('roles')->drop();
        $this->table('model_form_linkage')->drop();

    }
}
