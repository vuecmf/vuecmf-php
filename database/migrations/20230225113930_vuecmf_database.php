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
            ->addColumn('app_id', 'integer', ['length' => 10, 'null' => false, 'default' => 0, 'comment' => '所属应用ID'])
            ->addColumn('table_name', 'string', ['length' => 64, 'null' => false, 'default' => '', 'comment' => '模型对应的表名(不含表前缘)'])
            ->addColumn('label', 'string', ['length' => 64, 'null' => false, 'default' => '', 'comment' => '模型标签'])
            ->addColumn('component_tpl', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '组件模板'])
            ->addColumn('default_action_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '默认动作ID'])
            ->addColumn('search_field_id', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '搜索字段ID，多个用竖线分隔'])
            ->addColumn('type', 'integer', ['length' => 255, 'null' => false, 'default' => 20, 'comment' => '类型：10=内置，20=扩展'])
            ->addColumn('is_tree', 'integer', ['length' => 255, 'null' => false, 'default' => 20, 'comment' => '是否为目录树：10=是，20=否'])
            ->addColumn('remark', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '模型对应表的备注'])
            ->addColumn('status', 'integer', ['length' => 255, 'null' => false, 'default' => 10, 'comment' => '状态：10=开启，20=禁用'])
            ->addIndex(['app_id','table_name'], ['unique' => true])
            ->create();

        $this->table('model_field', ['id' => true,  'comment'=>'系统--模型字段管理表'])
            ->addColumn('field_name', 'string', ['length' => 64, 'null' => false, 'default' => '', 'comment' => '字段名称'])
            ->addColumn('label', 'string', ['length' => 64, 'null' => false, 'default' => '', 'comment' => '字段中文名称'])
            ->addColumn('model_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '所属模型ID'])
            ->addColumn('type', 'string', ['length' => 20, 'null' => false, 'default' => '', 'comment' => '字段类型'])
            ->addColumn('length', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '字段长度'])
            ->addColumn('decimal_length', 'integer', ['length' => 255, 'null' => false, 'default' => 0, 'comment' => '小数位数长度'])
            ->addColumn('is_null', 'integer', ['length' => 255, 'null' => false, 'default' => 10, 'comment' => '是否为空：10=是，20=否'])
            ->addColumn('note', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '字段备注说明'])
            ->addColumn('default_value', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '默认值'])
            ->addColumn('is_auto_increment', 'integer', ['length' => 255, 'null' => false, 'default' => 20, 'comment' => '是否自动递增：10=是，20=否'])
            ->addColumn('is_label', 'integer', ['length' => 255, 'null' => false, 'default' => 20, 'comment' => '是否为标题字段：10=是，20=否'])
            ->addColumn('is_signed', 'integer', ['length' => 255, 'null' => false, 'default' => 10, 'comment' => '是否可为负数：10=是，20=否'])
            ->addColumn('is_show', 'integer', ['length' => 255, 'null' => false, 'default' => 10, 'comment' => '默认列表中显示：10=显示，20=不显示'])
            ->addColumn('is_fixed', 'integer', ['length' => 255, 'null' => false, 'default' => 20, 'comment' => '默认列表中固定：10=固定，20=不固定'])
            ->addColumn('column_width', 'integer', ['length' => 11, 'null' => false, 'default' => 150, 'comment' => '默认列宽度'])
            ->addColumn('is_filter', 'integer', ['length' => 255, 'null' => false, 'default' => 10, 'comment' => '是否可筛选：10=是，20=否'])
            ->addColumn('sort_num', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '排序(小在前)'])
            ->addColumn('status', 'integer', ['length' => 255, 'null' => false, 'default' => 10, 'comment' => '状态：10=开启，20=禁用'])
            ->addIndex(['field_name','model_id'], ['unique' => true])
            ->create();

        $this->table('field_option', ['id' => true,  'comment'=>'系统--字段的选项列表'])
            ->addColumn('model_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '所属模型ID'])
            ->addColumn('model_field_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '模型字段ID'])
            ->addColumn('option_value', 'string', ['length' => 64, 'null' => false, 'default' => '', 'comment' => '选项值'])
            ->addColumn('option_label', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '选项标签'])
            ->addColumn('type', 'integer', ['length' => 255, 'null' => false, 'default' => 20, 'comment' => '类型：10=内置，20=扩展'])
            ->addColumn('status', 'integer', ['length' => 255, 'null' => false, 'default' => 10, 'comment' => '状态：10=开启，20=禁用'])
            ->addIndex(['model_field_id','option_value'], ['unique' => true])
            ->create();

        $this->table('model_action', ['id' => true,  'comment'=>'系统--模型动作表'])
            ->addColumn('label', 'string', ['length' => 64, 'null' => false, 'default' => '', 'comment' => '动作标签'])
            ->addColumn('api_path', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '后端请求地址'])
            ->addColumn('model_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '所属模型ID'])
            ->addColumn('action_type', 'string', ['length' => 32, 'null' => false, 'default' => '', 'comment' => '动作类型'])
            ->addColumn('status', 'integer', ['length' => 255, 'null' => false, 'default' => 10, 'comment' => '状态：10=开启，20=禁用'])
            ->addIndex(['action_type','model_id'], ['unique' => true])
            ->create();

        $this->table('model_relation', ['id' => true,  'comment'=>'系统--模型关联设置表'])
            ->addColumn('model_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '模型ID'])
            ->addColumn('model_field_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '模型字段ID'])
            ->addColumn('relation_model_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '关联模型ID'])
            ->addColumn('relation_field_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '关联模型字段ID'])
            ->addColumn('relation_show_field_id', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '关联模型显示字段ID,多个逗号分隔，全部用*'])
            ->addColumn('relation_filter', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '关联过滤条件'])
            ->addColumn('status', 'integer', ['length' => 255, 'null' => false, 'default' => 10, 'comment' => '状态：10=开启，20=禁用'])
            ->addIndex(['model_field_id','relation_field_id'], ['unique' => true])
            ->create();

        $this->table('model_index', ['id' => true,  'comment'=>'系统--模型索引设置表'])
            ->addColumn('model_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '模型ID'])
            ->addColumn('model_field_id', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '模型字段ID, 多个用逗号分隔'])
            ->addColumn('index_type', 'string', ['length' => 32, 'null' => false, 'default' => 'NORMAL', 'comment' => '索引类型： PRIMARY=主键，NORMAL=常规，UNIQUE=唯一，FULLTEXT=全文'])
            ->addColumn('status', 'integer', ['length' => 255, 'null' => false, 'default' => 10, 'comment' => '状态：10=开启，20=禁用'])
            ->create();

        $this->table('menu', ['id' => true,  'comment'=>'系统--菜单表'])
            ->addColumn('title', 'string', ['length' => 64, 'null' => false, 'default' => '', 'comment' => '菜单标题'])
            ->addColumn('icon', 'string', ['length' => 32, 'null' => false, 'default' => '', 'comment' => '菜单图标'])
            ->addColumn('pid', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '父级DI'])
            ->addColumn('id_path', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => 'ID路径,英文逗号分隔'])
            ->addColumn('path_name', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '菜单路径,英文逗号分隔'])
            ->addColumn('model_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '模型ID'])
            ->addColumn('app_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '应用ID'])
            ->addColumn('type', 'integer', ['length' => 255, 'null' => false, 'default' => 20, 'comment' => '类型：10=内置，20=扩展'])
            ->addColumn('sort_num', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '排序(小在前)'])
            ->addColumn('status', 'integer', ['length' => 255, 'null' => false, 'default' => 10, 'comment' => '状态：10=开启，20=禁用'])
            ->create();

        $this->table('admin', ['id' => true,  'comment'=>'系统--管理员表'])
            ->addColumn('username', 'string', ['length' => 32, 'null' => false, 'default' => '', 'comment' => '用户名'])
            ->addColumn('password', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '密码'])
            ->addColumn('email', 'string', ['length' => 64, 'null' => false, 'default' => '', 'comment' => '邮箱'])
            ->addColumn('mobile', 'string', ['length' => 32, 'null' => false, 'default' => '', 'comment' => '手机'])
            ->addColumn('is_super', 'integer', ['length' => 255, 'null' => false, 'default' => 20, 'comment' => '超级管理员：10=是，20=否'])
            ->addColumn('reg_time', 'timestamp', ['null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '注册时间'])
            ->addColumn('reg_ip', 'string', ['length' => 24, 'null' => false, 'default' => '', 'comment' => '注册IP'])
            ->addColumn('last_login_time', 'timestamp', ['null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '最后登录时间'])
            ->addColumn('last_login_ip', 'string', ['length' => 24, 'null' => false, 'default' => '', 'comment' => '最后登录IP'])
            ->addColumn('update_time', 'timestamp', ['null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '更新时间'])
            ->addColumn('token', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => 'api访问token'])
            ->addColumn('status', 'integer', ['length' => 255, 'null' => false, 'default' => 10, 'comment' => '状态：10=开启，20=禁用'])
            ->addIndex(['username'], ['unique' => true])
            ->addIndex(['email'], ['unique' => true])
            ->addIndex(['mobile'], ['unique' => true])
            ->create();

        $this->table('model_form', ['id' => true,  'comment'=>'系统--模型表单表'])
            ->addColumn('model_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '模型ID'])
            ->addColumn('model_field_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '模型字段ID'])
            ->addColumn('type', 'string', ['length' => 32, 'null' => false, 'default' => '', 'comment' => '控件类型'])
            ->addColumn('default_value', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '控件默认值'])
            ->addColumn('is_disabled', 'integer', ['length' => 255, 'null' => false, 'default' => 20, 'comment' => '表单中是否禁用： 10=是，20=否'])
            ->addColumn('sort_num', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '排序(小在前)'])
            ->addColumn('status', 'integer', ['length' => 255, 'null' => false, 'default' => 10, 'comment' => '状态：10=开启，20=禁用'])
            ->addIndex(['model_field_id'], ['unique' => true])
            ->create();

        $this->table('model_form_rules', ['id' => true,  'comment'=>'系统--模型表单验证设置表'])
            ->addColumn('model_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '模型ID'])
            ->addColumn('model_form_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '模型表单ID'])
            ->addColumn('rule_type', 'string', ['length' => 32, 'null' => false, 'default' => '', 'comment' => '表单验证类型'])
            ->addColumn('rule_value', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '表单验证规则'])
            ->addColumn('error_tips', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '表单验证不通过的错误提示信息'])
            ->addColumn('status', 'integer', ['length' => 255, 'null' => false, 'default' => 10, 'comment' => '状态：10=开启，20=禁用'])
            ->create();

        $this->table('roles', ['id' => true, 'comment'=>'系统--角色表'])
            ->addColumn('role_name', 'string', ['length' => 64, 'null' => false, 'default' => '', 'comment' => '角色名称'])
            ->addColumn('pid', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '父级DI'])
            ->addColumn('id_path', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => 'ID层级路径'])
            ->addColumn('remark', 'string', ['length' => 255, 'null' => false, 'default' => '', 'comment' => '角色的备注信息'])
            ->addColumn('status', 'integer', ['length' => 255, 'null' => false, 'default' => 10, 'comment' => '状态：10=开启，20=禁用'])
            ->addIndex(['role_name'], ['unique' => true])
            ->create();

        $this->table('model_form_linkage', ['id' => true,  'comment'=>'系统--模型表单联动设置表'])
            ->addColumn('model_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '模型ID'])
            ->addColumn('model_field_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '模型字段ID'])
            ->addColumn('linkage_field_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '联动表单的字段ID'])
            ->addColumn('linkage_action_id', 'integer', ['length' => 11, 'null' => false, 'default' => 0, 'comment' => '获取联动表单数据的动作ID'])
            ->addColumn('status', 'integer', ['length' => 255, 'null' => false, 'default' => 10, 'comment' => '状态：10=开启，20=禁用'])
            ->addIndex(['model_field_id','linkage_field_id'], ['unique' => true])
            ->create();


        $this->table('app_config', ['id' => true,  'comment'=>'系统--应用配置表'])
            ->addColumn('app_name','string', ['length' => 64, 'null' => false, 'default' => '', 'comment' => '应用名称'])
            ->addColumn('login_enable', 'integer', ['length' => 255, 'null' => false, 'default' => 10, 'comment' => '是否开启登录验证, 10=是，20=否'])
            ->addColumn('auth_enable', 'integer', ['length' => 255, 'null' => false, 'default' => 10, 'comment' => '是否开启权限验证, 10=是，20=否'])
            ->addColumn('exclusion_url', 'string', ['length' => 2000, 'null' => false, 'default' => '', 'comment' => '排除验证的URL,多个用英文逗号分隔'])
            ->addColumn('type', 'integer', ['length' => 255, 'null' => false, 'default' => 20, 'comment' => '类型：10=内置，20=扩展'])
            ->addColumn('status', 'integer', ['length' => 255, 'null' => false, 'default' => 10, 'comment' => '状态：10=开启，20=禁用'])
            ->addIndex(['app_name'], ['unique' => true])
            ->create();

        //写入初始数据
        //app_config 应用配置表
        $data = [
            ['id' => 1,'app_name' => 'vuecmf','login_enable' => 10,'auth_enable' => 10,'exclusion_url' => '/vuecmf/admin/login, /vuecmf/admin/logout, /vuecmf/model_action/get_api_map','type' => 10,'status' => 10,],
        ];
        $this->table('app_config')->insert($data)->save();

        //model_config 模型配置表
        $data = [
            ['id' => 1,'app_id' => 1,'table_name' => 'model_config','label' => '模型配置','component_tpl' => 'template/content/List','default_action_id' => 1,'search_field_id' => '3,4,5','type' => 10,'is_tree' => 20,'remark' => '系统--模型配置管理表','status' => 10,],
            ['id' => 2,'app_id' => 1,'table_name' => 'model_action','label' => '模型动作','component_tpl' => 'template/content/List','default_action_id' => 20,'search_field_id' => '21,22,24','type' => 10,'is_tree' => 20,'remark' => '系统--模型动作表','status' => 10,],
            ['id' => 3,'app_id' => 1,'table_name' => 'model_field','label' => '模型字段','component_tpl' => 'template/content/List','default_action_id' => 40,'search_field_id' => '41,42,44','type' => 10,'is_tree' => 20,'remark' => '系统--模型字段管理表','status' => 10,],
            ['id' => 4,'app_id' => 1,'table_name' => 'field_option','label' => '字段选项','component_tpl' => 'template/content/List','default_action_id' => 60,'search_field_id' => '64,65','type' => 10,'is_tree' => 20,'remark' => '系统--字段的选项列表','status' => 10,],
            ['id' => 5,'app_id' => 1,'table_name' => 'model_index','label' => '模型索引','component_tpl' => 'template/content/List','default_action_id' => 80,'search_field_id' => '83','type' => 10,'is_tree' => 20,'remark' => '系统--模型索引设置表','status' => 10,],
            ['id' => 6,'app_id' => 1,'table_name' => 'model_relation','label' => '模型关联','component_tpl' => 'template/content/List','default_action_id' => 100,'search_field_id' => '102,104','type' => 10,'is_tree' => 20,'remark' => '系统--模型关联设置表','status' => 10,],
            ['id' => 7,'app_id' => 1,'table_name' => 'menu','label' => '菜单','component_tpl' => 'template/content/List','default_action_id' => 120,'search_field_id' => '121,122,126','type' => 10,'is_tree' => 10,'remark' => '系统--菜单表','status' => 10,],
            ['id' => 8,'app_id' => 1,'table_name' => 'admin','label' => '管理员','component_tpl' => 'template/content/List','default_action_id' => 140,'search_field_id' => '141,143,144','type' => 10,'is_tree' => 20,'remark' => '系统--管理员表','status' => 10,],
            ['id' => 9,'app_id' => 1,'table_name' => 'model_form','label' => '模型表单','component_tpl' => 'template/content/List','default_action_id' => 180,'search_field_id' => '163,164','type' => 10,'is_tree' => 20,'remark' => '系统--模型表单设置表','status' => 10,],
            ['id' => 10,'app_id' => 1,'table_name' => 'model_form_rules','label' => '模型表单验证','component_tpl' => 'template/content/List','default_action_id' => 200,'search_field_id' => '183,184,185','type' => 10,'is_tree' => 20,'remark' => '系统--模型表单验证设置表','status' => 10,],
            ['id' => 11,'app_id' => 1,'table_name' => 'roles','label' => '角色','component_tpl' => 'template/content/List','default_action_id' => 220,'search_field_id' => '201','type' => 10,'is_tree' => 10,'remark' => '系统--角色表','status' => 10,],
            ['id' => 12,'app_id' => 1,'table_name' => 'model_form_linkage','label' => '模型表单联动','component_tpl' => 'template/content/List','default_action_id' => 260,'search_field_id' => '221,222,223','type' => 10,'is_tree' => 20,'remark' => '系统--模型表单联动设置表','status' => 10,],
            ['id' => 13,'app_id' => 1,'table_name' => 'upload_file','label' => '文件上传','component_tpl' => '','default_action_id' => 0,'search_field_id' => '','type' => 10,'is_tree' => 20,'remark' => '系统--文件上传','status' => 10,],
            ['id' => 14,'app_id' => 1,'table_name' => 'app_config','label' => '应用配置','component_tpl' => 'template/content/List','default_action_id' => 300,'search_field_id' => '241,244','type' => 10,'is_tree' => 20,'remark' => '系统--应用配置表','status' => 10,],
        ];
        $this->table('model_config')->insert($data)->save();

        //model_field 字段表
        $data = [
            ['id' => 1,'field_name' => 'id','label' => 'ID','model_id' => 1,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '自增ID','default_value' => '0','is_auto_increment' => 10,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 20,'sort_num' => 1,'status' => 10,],
            ['id' => 2,'field_name' => 'app_id','label' => '所属应用','model_id' => 1,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '所属应用ID','default_value' => '0','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 2,'status' => 10,],
            ['id' => 3,'field_name' => 'table_name','label' => '表名','model_id' => 1,'type' => 'varchar','length' => 64,'decimal_length' => 0,'is_null' => 20,'note' => '模型对应的表名(不含表前缘)','default_value' => '','is_auto_increment' => 20,'is_label' => 10,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 3,'status' => 10,],
            ['id' => 4,'field_name' => 'label','label' => '模型标签','model_id' => 1,'type' => 'varchar','length' => 64,'decimal_length' => 0,'is_null' => 20,'note' => '模型标签','default_value' => '','is_auto_increment' => 20,'is_label' => 10,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 4,'status' => 10,],
            ['id' => 5,'field_name' => 'component_tpl','label' => '组件模板','model_id' => 1,'type' => 'varchar','length' => 255,'decimal_length' => 0,'is_null' => 20,'note' => '组件模板','default_value' => '','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 5,'status' => 10,],
            ['id' => 6,'field_name' => 'default_action_id','label' => '默认动作','model_id' => 1,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '默认动作ID','default_value' => '0','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 6,'status' => 10,],
            ['id' => 7,'field_name' => 'search_field_id','label' => '搜索字段','model_id' => 1,'type' => 'varchar','length' => 255,'decimal_length' => 0,'is_null' => 20,'note' => '搜索字段ID，多个用逗号分隔','default_value' => '','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 300,'is_filter' => 20,'sort_num' => 7,'status' => 10,],
            ['id' => 8,'field_name' => 'type','label' => '类型','model_id' => 1,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '类型：10=内置，20=扩展','default_value' => '20','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 8,'status' => 10,],
            ['id' => 9,'field_name' => 'is_tree','label' => '目录树','model_id' => 1,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '是否为目录树：10=是，20=否','default_value' => '20','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 9,'status' => 10,],
            ['id' => 10,'field_name' => 'remark','label' => '表备注','model_id' => 1,'type' => 'varchar','length' => 255,'decimal_length' => 0,'is_null' => 20,'note' => '模型对应表的备注','default_value' => '','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 10,'status' => 10,],
            ['id' => 11,'field_name' => 'status','label' => '状态','model_id' => 1,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '状态：10=开启，20=禁用','default_value' => '10','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 11,'status' => 10,],
            ['id' => 20,'field_name' => 'id','label' => 'ID','model_id' => 2,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '自增ID','default_value' => '0','is_auto_increment' => 10,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 20,'sort_num' => 12,'status' => 10,],
            ['id' => 21,'field_name' => 'label','label' => '动作标签','model_id' => 2,'type' => 'varchar','length' => 64,'decimal_length' => 0,'is_null' => 20,'note' => '动作标签','default_value' => '','is_auto_increment' => 20,'is_label' => 10,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 13,'status' => 10,],
            ['id' => 22,'field_name' => 'api_path','label' => '后端请求地址','model_id' => 2,'type' => 'varchar','length' => 255,'decimal_length' => 0,'is_null' => 20,'note' => '后端请求地址','default_value' => '','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 14,'status' => 10,],
            ['id' => 23,'field_name' => 'model_id','label' => '所属模型','model_id' => 2,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '所属模型ID','default_value' => '0','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 20,'sort_num' => 15,'status' => 10,],
            ['id' => 24,'field_name' => 'action_type','label' => '动作类型','model_id' => 2,'type' => 'varchar','length' => 32,'decimal_length' => 0,'is_null' => 20,'note' => '动作类型','default_value' => '','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 16,'status' => 10,],
            ['id' => 25,'field_name' => 'status','label' => '状态','model_id' => 2,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '状态：10=开启，20=禁用','default_value' => '10','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 17,'status' => 10,],
            ['id' => 40,'field_name' => 'id','label' => 'ID','model_id' => 3,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '自增ID','default_value' => '0','is_auto_increment' => 10,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 20,'sort_num' => 18,'status' => 10,],
            ['id' => 41,'field_name' => 'field_name','label' => '字段名称','model_id' => 3,'type' => 'varchar','length' => 64,'decimal_length' => 0,'is_null' => 20,'note' => '表的字段名称','default_value' => '','is_auto_increment' => 20,'is_label' => 10,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 19,'status' => 10,],
            ['id' => 42,'field_name' => 'label','label' => '字段中文名','model_id' => 3,'type' => 'varchar','length' => 64,'decimal_length' => 0,'is_null' => 20,'note' => '表的字段中文名称','default_value' => '','is_auto_increment' => 20,'is_label' => 10,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 20,'status' => 10,],
            ['id' => 43,'field_name' => 'model_id','label' => '所属模型','model_id' => 3,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '所属模型ID','default_value' => '0','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 20,'sort_num' => 21,'status' => 10,],
            ['id' => 44,'field_name' => 'type','label' => '字段类型','model_id' => 3,'type' => 'varchar','length' => 20,'decimal_length' => 0,'is_null' => 20,'note' => '表的字段类型','default_value' => '','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 22,'status' => 10,],
            ['id' => 45,'field_name' => 'length','label' => '字段长度','model_id' => 3,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '表的字段长度','default_value' => '0','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 23,'status' => 10,],
            ['id' => 46,'field_name' => 'decimal_length','label' => '小数位数','model_id' => 3,'type' => 'smallint','length' => 2,'decimal_length' => 0,'is_null' => 20,'note' => '表的字段为decimal类型时的小数位数','default_value' => '0','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 24,'status' => 10,],
            ['id' => 47,'field_name' => 'is_null','label' => '是否为空','model_id' => 3,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '是否为空：10=是，20=否','default_value' => '10','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 25,'status' => 10,],
            ['id' => 48,'field_name' => 'note','label' => '字段备注','model_id' => 3,'type' => 'varchar','length' => 255,'decimal_length' => 0,'is_null' => 20,'note' => '表的字段备注说明','default_value' => '','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 26,'status' => 10,],
            ['id' => 49,'field_name' => 'default_value','label' => '默认值','model_id' => 3,'type' => 'varchar','length' => 255,'decimal_length' => 0,'is_null' => 20,'note' => '数据默认值','default_value' => '','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 27,'status' => 10,],
            ['id' => 50,'field_name' => 'is_auto_increment','label' => '自动递增','model_id' => 3,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '是否自动递增：10=是，20=否','default_value' => '20','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 28,'status' => 10,],
            ['id' => 51,'field_name' => 'is_label','label' => '标题字段','model_id' => 3,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '是否为标题字段：10=是，20=否','default_value' => '20','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 29,'status' => 10,],
            ['id' => 52,'field_name' => 'is_signed','label' => '可为负数','model_id' => 3,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '是否可为负数：10=是，20=否','default_value' => '10','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 30,'status' => 10,],
            ['id' => 53,'field_name' => 'is_show','label' => '列表可显','model_id' => 3,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '默认列表中显示：10=显示，20=不显示','default_value' => '10','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 31,'status' => 10,],
            ['id' => 54,'field_name' => 'is_fixed','label' => '固定列','model_id' => 3,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '默认列表中固定：10=固定，20=不固定','default_value' => '20','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 32,'status' => 10,],
            ['id' => 55,'field_name' => 'column_width','label' => '列宽度','model_id' => 3,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '列表中默认显示宽度：0表示不限','default_value' => '150','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 33,'status' => 10,],
            ['id' => 56,'field_name' => 'is_filter','label' => '可筛选','model_id' => 3,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '列表中是否可为筛选条件：10=是，20=否','default_value' => '10','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 34,'status' => 10,],
            ['id' => 57,'field_name' => 'sort_num','label' => '排序','model_id' => 3,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '表单/列表中字段的排列顺序(小在前)','default_value' => '0','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 36,'status' => 10,],
            ['id' => 58,'field_name' => 'status','label' => '状态','model_id' => 3,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '状态：10=开启，20=禁用','default_value' => '10','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 37,'status' => 10,],
            ['id' => 60,'field_name' => 'id','label' => 'ID','model_id' => 4,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '自增ID','default_value' => '0','is_auto_increment' => 10,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 20,'sort_num' => 37,'status' => 10,],
            ['id' => 61,'field_name' => 'type','label' => '类型','model_id' => 4,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '类型：10=内置，20=扩展','default_value' => '20','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 38,'status' => 10,],
            ['id' => 62,'field_name' => 'model_id','label' => '所属模型','model_id' => 4,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '所属模型ID','default_value' => '0','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 20,'sort_num' => 39,'status' => 10,],
            ['id' => 63,'field_name' => 'model_field_id','label' => '模型字段','model_id' => 4,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '模型字段ID','default_value' => '0','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 20,'sort_num' => 40,'status' => 10,],
            ['id' => 64,'field_name' => 'option_value','label' => '选项值','model_id' => 4,'type' => 'varchar','length' => 64,'decimal_length' => 0,'is_null' => 20,'note' => '选项值','default_value' => '','is_auto_increment' => 20,'is_label' => 10,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 41,'status' => 10,],
            ['id' => 65,'field_name' => 'option_label','label' => '选项标签','model_id' => 4,'type' => 'varchar','length' => 255,'decimal_length' => 0,'is_null' => 20,'note' => '选项标签','default_value' => '','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 42,'status' => 10,],
            ['id' => 66,'field_name' => 'status','label' => '状态','model_id' => 4,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '状态：10=开启，20=禁用','default_value' => '10','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 43,'status' => 10,],
            ['id' => 80,'field_name' => 'id','label' => 'ID','model_id' => 5,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '自增ID','default_value' => '0','is_auto_increment' => 10,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 20,'sort_num' => 44,'status' => 10,],
            ['id' => 81,'field_name' => 'model_id','label' => '所属模型','model_id' => 5,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '所属模型ID','default_value' => '0','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 20,'sort_num' => 45,'status' => 10,],
            ['id' => 82,'field_name' => 'model_field_id','label' => '模型字段','model_id' => 5,'type' => 'varchar','length' => 100,'decimal_length' => 0,'is_null' => 20,'note' => '模型字段ID','default_value' => '','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 46,'status' => 10,],
            ['id' => 83,'field_name' => 'index_type','label' => '索引类型','model_id' => 5,'type' => 'varchar','length' => 32,'decimal_length' => 0,'is_null' => 20,'note' => '索引类型： PRIMARY=主键，NORMAL=常规，UNIQUE=唯一，FULLTEXT=全文','default_value' => 'NORMAL','is_auto_increment' => 20,'is_label' => 10,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 47,'status' => 10,],
            ['id' => 84,'field_name' => 'status','label' => '状态','model_id' => 5,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '状态：10=开启，20=禁用','default_value' => '10','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 48,'status' => 10,],
            ['id' => 100,'field_name' => 'id','label' => 'ID','model_id' => 6,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '自增ID','default_value' => '0','is_auto_increment' => 10,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 20,'sort_num' => 49,'status' => 10,],
            ['id' => 101,'field_name' => 'model_id','label' => '所属模型','model_id' => 6,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '所属模型ID','default_value' => '0','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 20,'sort_num' => 50,'status' => 10,],
            ['id' => 102,'field_name' => 'model_field_id','label' => '模型字段','model_id' => 6,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '模型字段ID','default_value' => '0','is_auto_increment' => 20,'is_label' => 10,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 20,'sort_num' => 51,'status' => 10,],
            ['id' => 103,'field_name' => 'relation_model_id','label' => '关联模型','model_id' => 6,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '关联模型ID','default_value' => '0','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 52,'status' => 10,],
            ['id' => 104,'field_name' => 'relation_field_id','label' => '关联模型字段','model_id' => 6,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '关联模型字段ID','default_value' => '0','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 53,'status' => 10,],
            ['id' => 105,'field_name' => 'relation_show_field_id','label' => '显示字段','model_id' => 6,'type' => 'varchar','length' => 255,'decimal_length' => 0,'is_null' => 20,'note' => '关联模型显示字段ID,多个逗号分隔，全部用*','default_value' => '','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 54,'status' => 10,],
            ['id' => 106,'field_name' => 'relation_filter','label' => '关联过滤条件','model_id' => 6,'type' => 'varchar','length' => 255,'decimal_length' => 0,'is_null' => 20,'note' => '关联过滤条件','default_value' => '','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 55,'status' => 10,],
            ['id' => 107,'field_name' => 'status','label' => '状态','model_id' => 6,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '状态：10=开启，20=禁用','default_value' => '10','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 56,'status' => 10,],
            ['id' => 120,'field_name' => 'id','label' => 'ID','model_id' => 7,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '自增ID','default_value' => '0','is_auto_increment' => 10,'is_label' => 20,'is_signed' => 20,'is_show' => 20,'is_fixed' => 20,'column_width' => 150,'is_filter' => 20,'sort_num' => 56,'status' => 10,],
            ['id' => 121,'field_name' => 'title','label' => '菜单标题','model_id' => 7,'type' => 'varchar','length' => 64,'decimal_length' => 0,'is_null' => 20,'note' => '菜单标题','default_value' => '','is_auto_increment' => 20,'is_label' => 10,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 57,'status' => 10,],
            ['id' => 122,'field_name' => 'icon','label' => '菜单图标','model_id' => 7,'type' => 'varchar','length' => 32,'decimal_length' => 0,'is_null' => 20,'note' => '菜单图标','default_value' => '','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 58,'status' => 10,],
            ['id' => 123,'field_name' => 'pid','label' => '父级','model_id' => 7,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '父级ID','default_value' => '0','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 20,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 59,'status' => 10,],
            ['id' => 124,'field_name' => 'app_id','label' => '应用','model_id' => 7,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '应用ID','default_value' => '0','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 60,'status' => 10,],
            ['id' => 125,'field_name' => 'id_path','label' => 'ID路径','model_id' => 7,'type' => 'varchar','length' => 255,'decimal_length' => 0,'is_null' => 20,'note' => 'ID路径,英文逗号分隔','default_value' => '','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 20,'sort_num' => 61,'status' => 10,],
            ['id' => 126,'field_name' => 'path_name','label' => '菜单路径','model_id' => 7,'type' => 'varchar','length' => 255,'decimal_length' => 0,'is_null' => 20,'note' => '菜单路径,英文逗号分隔','default_value' => '','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 20,'sort_num' => 62,'status' => 10,],
            ['id' => 127,'field_name' => 'model_id','label' => '模型','model_id' => 7,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '模型ID','default_value' => '0','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 63,'status' => 10,],
            ['id' => 128,'field_name' => 'type','label' => '类型','model_id' => 7,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '类型：10=内置，20=扩展','default_value' => '20','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 64,'status' => 10,],
            ['id' => 129,'field_name' => 'sort_num','label' => '排序','model_id' => 7,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '菜单的排列顺序(小在前)','default_value' => '0','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 65,'status' => 10,],
            ['id' => 130,'field_name' => 'status','label' => '状态','model_id' => 7,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '状态：10=开启，20=禁用','default_value' => '10','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 66,'status' => 10,],
            ['id' => 140,'field_name' => 'id','label' => 'ID','model_id' => 8,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '自增ID','default_value' => '0','is_auto_increment' => 10,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 20,'sort_num' => 67,'status' => 10,],
            ['id' => 141,'field_name' => 'username','label' => '用户名','model_id' => 8,'type' => 'varchar','length' => 32,'decimal_length' => 0,'is_null' => 20,'note' => '用户名','default_value' => '','is_auto_increment' => 20,'is_label' => 10,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 68,'status' => 10,],
            ['id' => 142,'field_name' => 'password','label' => '密码','model_id' => 8,'type' => 'varchar','length' => 255,'decimal_length' => 0,'is_null' => 20,'note' => '密码','default_value' => '','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 20,'is_fixed' => 20,'column_width' => 150,'is_filter' => 20,'sort_num' => 69,'status' => 10,],
            ['id' => 143,'field_name' => 'email','label' => '邮箱','model_id' => 8,'type' => 'varchar','length' => 64,'decimal_length' => 0,'is_null' => 20,'note' => '邮箱','default_value' => '','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 70,'status' => 10,],
            ['id' => 144,'field_name' => 'mobile','label' => '手机','model_id' => 8,'type' => 'varchar','length' => 32,'decimal_length' => 0,'is_null' => 20,'note' => '手机','default_value' => '','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 71,'status' => 10,],
            ['id' => 145,'field_name' => 'is_super','label' => '超级管理员','model_id' => 8,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '超级管理员：10=是，20=否','default_value' => '20','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 72,'status' => 10,],
            ['id' => 146,'field_name' => 'reg_time','label' => '注册时间','model_id' => 8,'type' => 'timestamp','length' => 0,'decimal_length' => 0,'is_null' => 20,'note' => '注册时间','default_value' => 'CURRENT_TIMESTAMP','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 73,'status' => 10,],
            ['id' => 147,'field_name' => 'reg_ip','label' => '注册IP','model_id' => 8,'type' => 'varchar','length' => 24,'decimal_length' => 0,'is_null' => 20,'note' => '注册IP','default_value' => '','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 20,'sort_num' => 74,'status' => 10,],
            ['id' => 148,'field_name' => 'last_login_time','label' => '最后登录时间','model_id' => 8,'type' => 'timestamp','length' => 0,'decimal_length' => 0,'is_null' => 20,'note' => '最后登录时间','default_value' => 'CURRENT_TIMESTAMP','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 75,'status' => 10,],
            ['id' => 149,'field_name' => 'last_login_ip','label' => '最后登录IP','model_id' => 8,'type' => 'varchar','length' => 24,'decimal_length' => 0,'is_null' => 20,'note' => '最后登录IP','default_value' => '','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 20,'sort_num' => 76,'status' => 10,],
            ['id' => 150,'field_name' => 'update_time','label' => '更新时间','model_id' => 8,'type' => 'timestamp','length' => 0,'decimal_length' => 0,'is_null' => 20,'note' => '更新时间','default_value' => 'CURRENT_TIMESTAMP','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 77,'status' => 10,],
            ['id' => 151,'field_name' => 'token','label' => '访问token','model_id' => 8,'type' => 'varchar','length' => 255,'decimal_length' => 0,'is_null' => 20,'note' => 'api访问token','default_value' => '','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 78,'status' => 10,],
            ['id' => 152,'field_name' => 'status','label' => '状态','model_id' => 8,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '状态：10=开启，20=禁用','default_value' => '10','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 79,'status' => 10,],
            ['id' => 160,'field_name' => 'id','label' => 'ID','model_id' => 9,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '自增ID','default_value' => '0','is_auto_increment' => 10,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 20,'sort_num' => 80,'status' => 10,],
            ['id' => 161,'field_name' => 'model_id','label' => '所属模型','model_id' => 9,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '所属模型ID','default_value' => '0','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 20,'sort_num' => 81,'status' => 10,],
            ['id' => 162,'field_name' => 'model_field_id','label' => '模型字段','model_id' => 9,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '模型字段ID','default_value' => '0','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 82,'status' => 10,],
            ['id' => 163,'field_name' => 'type','label' => '控件类型','model_id' => 9,'type' => 'varchar','length' => 32,'decimal_length' => 0,'is_null' => 20,'note' => '表单控件类型','default_value' => '','is_auto_increment' => 20,'is_label' => 10,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 83,'status' => 10,],
            ['id' => 164,'field_name' => 'default_value','label' => '控件默认值','model_id' => 9,'type' => 'varchar','length' => 255,'decimal_length' => 0,'is_null' => 20,'note' => '表单控件默认值','default_value' => '','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 84,'status' => 10,],
            ['id' => 165,'field_name' => 'is_disabled','label' => '是否禁用','model_id' => 9,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '添加/编辑表单中是否禁用： 10=是，20=否','default_value' => '20','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 85,'status' => 10,],
            ['id' => 166,'field_name' => 'sort_num','label' => '排序','model_id' => 9,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '菜单的排列顺序(小在前)','default_value' => '0','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 86,'status' => 10,],
            ['id' => 167,'field_name' => 'status','label' => '状态','model_id' => 9,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '状态：10=开启，20=禁用','default_value' => '10','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 87,'status' => 10,],
            ['id' => 180,'field_name' => 'id','label' => 'ID','model_id' => 10,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '自增ID','default_value' => '0','is_auto_increment' => 10,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 20,'sort_num' => 88,'status' => 10,],
            ['id' => 181,'field_name' => 'model_id','label' => '所属模型','model_id' => 10,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '所属模型ID','default_value' => '0','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 20,'sort_num' => 89,'status' => 10,],
            ['id' => 182,'field_name' => 'model_form_id','label' => '模型表单','model_id' => 10,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '模型表单ID','default_value' => '0','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 20,'sort_num' => 90,'status' => 10,],
            ['id' => 183,'field_name' => 'rule_type','label' => '验证类型','model_id' => 10,'type' => 'varchar','length' => 32,'decimal_length' => 0,'is_null' => 20,'note' => '表单验证类型','default_value' => '','is_auto_increment' => 20,'is_label' => 10,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 91,'status' => 10,],
            ['id' => 184,'field_name' => 'rule_value','label' => '验证规则','model_id' => 10,'type' => 'varchar','length' => 255,'decimal_length' => 0,'is_null' => 20,'note' => '表单验证规则','default_value' => '','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 92,'status' => 10,],
            ['id' => 185,'field_name' => 'error_tips','label' => '错误提示','model_id' => 10,'type' => 'varchar','length' => 255,'decimal_length' => 0,'is_null' => 20,'note' => '表单验证不通过的错误提示信息','default_value' => '','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 93,'status' => 10,],
            ['id' => 186,'field_name' => 'status','label' => '状态','model_id' => 10,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '状态：10=开启，20=禁用','default_value' => '10','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 94,'status' => 10,],
            ['id' => 200,'field_name' => 'id','label' => 'ID','model_id' => 11,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '自增ID','default_value' => '0','is_auto_increment' => 10,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 20,'sort_num' => 95,'status' => 10,],
            ['id' => 201,'field_name' => 'role_name','label' => '角色名称','model_id' => 11,'type' => 'varchar','length' => 64,'decimal_length' => 0,'is_null' => 20,'note' => '用户的角色名称','default_value' => '','is_auto_increment' => 20,'is_label' => 10,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 96,'status' => 10,],
            ['id' => 203,'field_name' => 'pid','label' => '父级','model_id' => 11,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '父级ID','default_value' => '0','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 98,'status' => 10,],
            ['id' => 204,'field_name' => 'id_path','label' => '层级路径','model_id' => 11,'type' => 'varchar','length' => 255,'decimal_length' => 0,'is_null' => 20,'note' => '角色ID层级路径','default_value' => '','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 99,'status' => 10,],
            ['id' => 205,'field_name' => 'remark','label' => '备注','model_id' => 11,'type' => 'varchar','length' => 255,'decimal_length' => 0,'is_null' => 20,'note' => '角色的备注信息','default_value' => '','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 100,'status' => 10,],
            ['id' => 206,'field_name' => 'status','label' => '状态','model_id' => 11,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '状态：10=开启，20=禁用','default_value' => '10','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 101,'status' => 10,],
            ['id' => 220,'field_name' => 'id','label' => 'ID','model_id' => 12,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '自增ID','default_value' => '0','is_auto_increment' => 10,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 20,'sort_num' => 102,'status' => 10,],
            ['id' => 221,'field_name' => 'model_id','label' => '所属模型','model_id' => 12,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '所属模型ID','default_value' => '0','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 20,'sort_num' => 103,'status' => 10,],
            ['id' => 222,'field_name' => 'model_field_id','label' => '模型字段','model_id' => 12,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '模型字段ID','default_value' => '0','is_auto_increment' => 20,'is_label' => 10,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 20,'sort_num' => 104,'status' => 10,],
            ['id' => 223,'field_name' => 'linkage_field_id','label' => '联动字段','model_id' => 12,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '联动表单的字段ID','default_value' => '0','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 105,'status' => 10,],
            ['id' => 224,'field_name' => 'linkage_action_id','label' => '联动动作','model_id' => 12,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '获取联动表单数据的动作ID','default_value' => '0','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 106,'status' => 10,],
            ['id' => 225,'field_name' => 'status','label' => '状态','model_id' => 12,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '状态：10=开启，20=禁用','default_value' => '10','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 107,'status' => 10,],
            ['id' => 240,'field_name' => 'id','label' => 'ID','model_id' => 14,'type' => 'int','length' => 11,'decimal_length' => 0,'is_null' => 20,'note' => '自增ID','default_value' => '0','is_auto_increment' => 10,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 20,'sort_num' => 109,'status' => 10,],
            ['id' => 241,'field_name' => 'app_name','label' => '应用名称','model_id' => 14,'type' => 'varchar','length' => 64,'decimal_length' => 0,'is_null' => 20,'note' => '应用名称','default_value' => '','is_auto_increment' => 20,'is_label' => 10,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 110,'status' => 10,],
            ['id' => 242,'field_name' => 'login_enable','label' => '登录验证','model_id' => 14,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '是否开启登录验证, 10=是，20=否','default_value' => '10','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 111,'status' => 10,],
            ['id' => 243,'field_name' => 'auth_enable','label' => '权限验证','model_id' => 14,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '是否开启权限验证, 10=是，20=否','default_value' => '10','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 112,'status' => 10,],
            ['id' => 244,'field_name' => 'exclusion_url','label' => '排除验证URL','model_id' => 14,'type' => 'varchar','length' => 2000,'decimal_length' => 0,'is_null' => 20,'note' => '排除验证的URL，多个用英文逗号分隔','default_value' => '','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 113,'status' => 10,],
            ['id' => 245,'field_name' => 'type','label' => '类型','model_id' => 14,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '类型：10=内置，20=扩展','default_value' => '20','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 150,'is_filter' => 10,'sort_num' => 114,'status' => 10,],
            ['id' => 246,'field_name' => 'status','label' => '状态','model_id' => 14,'type' => 'smallint','length' => 4,'decimal_length' => 0,'is_null' => 20,'note' => '状态：10=开启，20=禁用','default_value' => '10','is_auto_increment' => 20,'is_label' => 20,'is_signed' => 20,'is_show' => 10,'is_fixed' => 20,'column_width' => 100,'is_filter' => 10,'sort_num' => 115,'status' => 10,],
        ];
        $this->table('model_field')->insert($data)->save();

        //model_index索引表
        $data = [
            ['model_id' => 1,'model_field_id' => '3','index_type' => 'UNIQUE',],
            ['model_id' => 2,'model_field_id' => '23,24','index_type' => 'UNIQUE',],
            ['model_id' => 3,'model_field_id' => '41,43','index_type' => 'UNIQUE',],
            ['model_id' => 4,'model_field_id' => '63,64','index_type' => 'UNIQUE',],
            ['model_id' => 6,'model_field_id' => '102,104','index_type' => 'UNIQUE',],
            ['model_id' => 8,'model_field_id' => '141','index_type' => 'UNIQUE',],
            ['model_id' => 8,'model_field_id' => '143','index_type' => 'UNIQUE',],
            ['model_id' => 8,'model_field_id' => '144','index_type' => 'UNIQUE',],
            ['model_id' => 9,'model_field_id' => '162','index_type' => 'UNIQUE',],
            ['model_id' => 11,'model_field_id' => '201','index_type' => 'UNIQUE',],
            ['model_id' => 12,'model_field_id' => '222,223','index_type' => 'UNIQUE',],
            ['model_id' => 14,'model_field_id' => '241','index_type' => 'UNIQUE',],
        ];
        $this->table('model_index')->insert($data)->save();

        //field_option 字段选项表
        $data = [
            ['model_id' => 1,'model_field_id' => 5,'type' => 10,'option_value' => 'template/content/List','option_label' => '列表组件',],
            ['model_id' => 1,'model_field_id' => 8,'type' => 10,'option_value' => '10','option_label' => '内置',],
            ['model_id' => 1,'model_field_id' => 8,'type' => 10,'option_value' => '20','option_label' => '扩展',],
            ['model_id' => 1,'model_field_id' => 9,'type' => 10,'option_value' => '10','option_label' => '是',],
            ['model_id' => 1,'model_field_id' => 9,'type' => 10,'option_value' => '20','option_label' => '否',],
            ['model_id' => 1,'model_field_id' => 11,'type' => 10,'option_value' => '10','option_label' => '开启',],
            ['model_id' => 1,'model_field_id' => 11,'type' => 10,'option_value' => '20','option_label' => '禁用',],
            ['model_id' => 2,'model_field_id' => 24,'type' => 10,'option_value' => 'action_list','option_label' => '获取动作列表',],
            ['model_id' => 2,'model_field_id' => 24,'type' => 10,'option_value' => 'list','option_label' => '列表',],
            ['model_id' => 2,'model_field_id' => 24,'type' => 10,'option_value' => 'detail','option_label' => '详情',],
            ['model_id' => 2,'model_field_id' => 24,'type' => 10,'option_value' => 'save','option_label' => '保存',],
            ['model_id' => 2,'model_field_id' => 24,'type' => 10,'option_value' => 'save_all','option_label' => '批量保存',],
            ['model_id' => 2,'model_field_id' => 24,'type' => 10,'option_value' => 'delete','option_label' => '删除',],
            ['model_id' => 2,'model_field_id' => 24,'type' => 10,'option_value' => 'delete_batch','option_label' => '批量删除',],
            ['model_id' => 2,'model_field_id' => 24,'type' => 10,'option_value' => 'dropdown','option_label' => '下拉列表',],
            ['model_id' => 2,'model_field_id' => 24,'type' => 10,'option_value' => 'add_permission','option_label' => '设置角色权限',],
            ['model_id' => 2,'model_field_id' => 24,'type' => 10,'option_value' => 'assign_role','option_label' => '分配角色',],
            ['model_id' => 2,'model_field_id' => 24,'type' => 10,'option_value' => 'assign_users','option_label' => '批量分配用户',],
            ['model_id' => 2,'model_field_id' => 24,'type' => 10,'option_value' => 'del_permission','option_label' => '删除角色权限',],
            ['model_id' => 2,'model_field_id' => 24,'type' => 10,'option_value' => 'del_users','option_label' => '批量删除用户',],
            ['model_id' => 2,'model_field_id' => 24,'type' => 10,'option_value' => 'get_all_roles','option_label' => '获取所有角色',],
            ['model_id' => 2,'model_field_id' => 24,'type' => 10,'option_value' => 'get_all_users','option_label' => '获取所有用户',],
            ['model_id' => 2,'model_field_id' => 24,'type' => 10,'option_value' => 'get_permission','option_label' => '获取角色下所有权限',],
            ['model_id' => 2,'model_field_id' => 24,'type' => 10,'option_value' => 'get_roles','option_label' => '获取用户的角色',],
            ['model_id' => 2,'model_field_id' => 24,'type' => 10,'option_value' => 'get_users','option_label' => '获取角色下所有用户',],
            ['model_id' => 2,'model_field_id' => 24,'type' => 10,'option_value' => 'get_user_permission','option_label' => '获取用户权限',],
            ['model_id' => 2,'model_field_id' => 24,'type' => 10,'option_value' => 'set_user_permission','option_label' => '设置用户权限',],
            ['model_id' => 2,'model_field_id' => 24,'type' => 10,'option_value' => 'login','option_label' => '登录后台',],
            ['model_id' => 2,'model_field_id' => 24,'type' => 10,'option_value' => 'logout','option_label' => '退出系统',],
            ['model_id' => 2,'model_field_id' => 24,'type' => 10,'option_value' => 'nav','option_label' => '导航菜单',],
            ['model_id' => 2,'model_field_id' => 24,'type' => 10,'option_value' => 'upload','option_label' => '上传文件',],
            ['model_id' => 2,'model_field_id' => 25,'type' => 10,'option_value' => '10','option_label' => '开启',],
            ['model_id' => 2,'model_field_id' => 25,'type' => 10,'option_value' => '20','option_label' => '禁用',],
            ['model_id' => 3,'model_field_id' => 44,'type' => 10,'option_value' => 'char','option_label' => '固定长度字符串',],
            ['model_id' => 3,'model_field_id' => 44,'type' => 10,'option_value' => 'varchar','option_label' => '可变长度字符串',],
            ['model_id' => 3,'model_field_id' => 44,'type' => 10,'option_value' => 'text','option_label' => '多行文本',],
            ['model_id' => 3,'model_field_id' => 44,'type' => 10,'option_value' => 'mediumtext','option_label' => '中型多行文本',],
            ['model_id' => 3,'model_field_id' => 44,'type' => 10,'option_value' => 'longtext','option_label' => '大型多行文本',],
            ['model_id' => 3,'model_field_id' => 44,'type' => 10,'option_value' => 'tinyint','option_label' => '小型数值',],
            ['model_id' => 3,'model_field_id' => 44,'type' => 10,'option_value' => 'smallint','option_label' => '中型数值',],
            ['model_id' => 3,'model_field_id' => 44,'type' => 10,'option_value' => 'int','option_label' => '大型数值',],
            ['model_id' => 3,'model_field_id' => 44,'type' => 10,'option_value' => 'bigint','option_label' => '越大型数值',],
            ['model_id' => 3,'model_field_id' => 44,'type' => 10,'option_value' => 'float','option_label' => '单精度浮点型',],
            ['model_id' => 3,'model_field_id' => 44,'type' => 10,'option_value' => 'double','option_label' => '双精度浮点型',],
            ['model_id' => 3,'model_field_id' => 44,'type' => 10,'option_value' => 'decimal','option_label' => '金额型',],
            ['model_id' => 3,'model_field_id' => 44,'type' => 10,'option_value' => 'date','option_label' => '日期',],
            ['model_id' => 3,'model_field_id' => 44,'type' => 10,'option_value' => 'datetime','option_label' => '日期时间',],
            ['model_id' => 3,'model_field_id' => 44,'type' => 10,'option_value' => 'timestamp','option_label' => '日期时间',],
            ['model_id' => 3,'model_field_id' => 47,'type' => 10,'option_value' => '10','option_label' => '是',],
            ['model_id' => 3,'model_field_id' => 47,'type' => 10,'option_value' => '20','option_label' => '否',],
            ['model_id' => 3,'model_field_id' => 50,'type' => 10,'option_value' => '10','option_label' => '是',],
            ['model_id' => 3,'model_field_id' => 50,'type' => 10,'option_value' => '20','option_label' => '否',],
            ['model_id' => 3,'model_field_id' => 51,'type' => 10,'option_value' => '10','option_label' => '是',],
            ['model_id' => 3,'model_field_id' => 51,'type' => 10,'option_value' => '20','option_label' => '否',],
            ['model_id' => 3,'model_field_id' => 52,'type' => 10,'option_value' => '10','option_label' => '是',],
            ['model_id' => 3,'model_field_id' => 52,'type' => 10,'option_value' => '20','option_label' => '否',],
            ['model_id' => 3,'model_field_id' => 53,'type' => 10,'option_value' => '10','option_label' => '显示',],
            ['model_id' => 3,'model_field_id' => 53,'type' => 10,'option_value' => '20','option_label' => '不显示',],
            ['model_id' => 3,'model_field_id' => 54,'type' => 10,'option_value' => '10','option_label' => '固定',],
            ['model_id' => 3,'model_field_id' => 54,'type' => 10,'option_value' => '20','option_label' => '不固定',],
            ['model_id' => 3,'model_field_id' => 56,'type' => 10,'option_value' => '10','option_label' => '是',],
            ['model_id' => 3,'model_field_id' => 56,'type' => 10,'option_value' => '20','option_label' => '否',],
            ['model_id' => 3,'model_field_id' => 58,'type' => 10,'option_value' => '10','option_label' => '开启',],
            ['model_id' => 3,'model_field_id' => 58,'type' => 10,'option_value' => '20','option_label' => '禁用',],
            ['model_id' => 4,'model_field_id' => 61,'type' => 10,'option_value' => '10','option_label' => '内置',],
            ['model_id' => 4,'model_field_id' => 61,'type' => 10,'option_value' => '20','option_label' => '扩展',],
            ['model_id' => 4,'model_field_id' => 66,'type' => 10,'option_value' => '10','option_label' => '开启',],
            ['model_id' => 4,'model_field_id' => 66,'type' => 10,'option_value' => '20','option_label' => '禁用',],
            ['model_id' => 5,'model_field_id' => 83,'type' => 10,'option_value' => 'NORMAL','option_label' => '常规',],
            ['model_id' => 5,'model_field_id' => 83,'type' => 10,'option_value' => 'UNIQUE','option_label' => '唯一',],
            ['model_id' => 5,'model_field_id' => 83,'type' => 10,'option_value' => 'FULLTEXT','option_label' => '全文',],
            ['model_id' => 5,'model_field_id' => 84,'type' => 10,'option_value' => '10','option_label' => '开启',],
            ['model_id' => 5,'model_field_id' => 84,'type' => 10,'option_value' => '20','option_label' => '禁用',],
            ['model_id' => 6,'model_field_id' => 107,'type' => 10,'option_value' => '10','option_label' => '开启',],
            ['model_id' => 6,'model_field_id' => 107,'type' => 10,'option_value' => '20','option_label' => '禁用',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'map-location','option_label' => '定位',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'coordinate','option_label' => '坐标',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'alarm-clock','option_label' => '闹钟',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'clock','option_label' => '时钟',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'calendar','option_label' => '日历',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'apple','option_label' => '苹果',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'pear','option_label' => '梨子',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'orange','option_label' => '桔子',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'cherry','option_label' => '樱桃',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'grape','option_label' => '葡萄',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'watermelon','option_label' => '西瓜',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'burger','option_label' => '汉堡包',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'dessert','option_label' => '甜点',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'fries','option_label' => '薯条',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'ice-cream','option_label' => '冰淇淋',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'milk-tea','option_label' => '奶茶',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'lollipop','option_label' => '棒棒糖',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'sugar','option_label' => '糖果',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'food','option_label' => '食物',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'fork-spoon','option_label' => '叉勺',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'coffee-cup','option_label' => '咖啡杯',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'goblet','option_label' => '高脚杯',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'mug','option_label' => '杯子',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'bowl','option_label' => '碗',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'arrow-left','option_label' => '左箭头',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'arrow-right','option_label' => '右箭头',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'avatar','option_label' => '头像',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'user','option_label' => '用户',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'male','option_label' => '男',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'female','option_label' => '女',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'bell','option_label' => '铃',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'basketball','option_label' => '篮球',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'bicycle','option_label' => '自行车',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'ship','option_label' => '船',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'van','option_label' => '货车',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'box','option_label' => '箱子',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'briefcase','option_label' => '公文包',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'suitcase','option_label' => '手提箱',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'brush','option_label' => '刷子',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'camera','option_label' => '相机',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'video-camera','option_label' => '摄像机',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'cellphone','option_label' => '手机',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'phone','option_label' => '电话',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'headset','option_label' => '耳机',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'watch','option_label' => '手表',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'cpu','option_label' => 'CPU',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'microphone','option_label' => '麦克风',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'monitor','option_label' => '显示器',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'mouse','option_label' => '鼠标',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'printer','option_label' => '打印机',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'picture','option_label' => '图片',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'film','option_label' => '电影',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'video-play','option_label' => '播放',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'video-pause','option_label' => '暂停',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'chat-dot-round','option_label' => '聊天',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'circle-check','option_label' => '打钩',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'circle-close','option_label' => '打叉',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'circle-plus','option_label' => '圆形加号',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'umbrella','option_label' => '雨伞',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'mostly-cloudy','option_label' => '云朵',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'wind-power','option_label' => '风力',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'lightning','option_label' => '闪电',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'sunny','option_label' => '太阳',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'moon','option_label' => '月亮',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'star','option_label' => '星星',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'money','option_label' => '钞票',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'coin','option_label' => '硬币',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'credit-card','option_label' => '信用卡',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'wallet','option_label' => '钱包',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'discount','option_label' => '折扣',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'goods','option_label' => '购物袋',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'shopping-cart','option_label' => '购物车',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'price-tag','option_label' => '价格标签',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'collection-tag','option_label' => '收藏标签',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'compass','option_label' => '指南针',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'connection','option_label' => '连接',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'link','option_label' => '超链接',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'scissor','option_label' => '剪切',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'copy-document','option_label' => '复制',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'delete','option_label' => '删除',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'rank','option_label' => '移动',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'crop','option_label' => '裁切',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'edit','option_label' => '编辑',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'filter','option_label' => '过滤',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'upload','option_label' => '上传',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'download','option_label' => '下载',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'finished','option_label' => '完成',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'document','option_label' => '文档',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'folder','option_label' => '文件夹',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'data-analysis','option_label' => '数据分析',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'histogram','option_label' => '直方图',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'trend-charts','option_label' => '折线图',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'pie-chart','option_label' => '饼图',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'flag','option_label' => '旗帜',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'full-screen','option_label' => '全屏',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'grid','option_label' => '网格',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'guide','option_label' => '路标',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'help','option_label' => '帮助',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'view','option_label' => '展示',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'hide','option_label' => '隐藏',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'list','option_label' => '列表',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'house','option_label' => '房子',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'office-building','option_label' => '办公楼',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'school','option_label' => '学校',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'shop','option_label' => '商店',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'key','option_label' => '钥匙',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'lock','option_label' => '锁',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'management','option_label' => '管理',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'magnet','option_label' => '磁铁',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'medal','option_label' => '奖章',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'menu','option_label' => '菜单',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'message-box','option_label' => '消息盒子',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'message','option_label' => '信封',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'postcard','option_label' => '明信片',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'notebook','option_label' => '笔记本',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'info-filled','option_label' => '信息',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'warning-filled','option_label' => '警告',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'notification','option_label' => '通知',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'question-filled','option_label' => '问号',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'odometer','option_label' => '里程计',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'more','option_label' => '更多',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'operation','option_label' => '操作',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'opportunity','option_label' => '机会',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'paperclip','option_label' => '回形针',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'present','option_label' => '当前',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'reading','option_label' => '阅读',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'search','option_label' => '放大镜',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'zoom-in','option_label' => '放大镜+',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'zoom-out','option_label' => '放大镜-',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'setting','option_label' => '齿轮',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'share','option_label' => '分享',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'sort','option_label' => '排序',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'stamp','option_label' => '图章',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'switch-button','option_label' => '开关',],
            ['model_id' => 7,'model_field_id' => 122,'type' => 10,'option_value' => 'takeaway-box','option_label' => '任务',],
            ['model_id' => 7,'model_field_id' => 128,'type' => 10,'option_value' => '10','option_label' => '内置',],
            ['model_id' => 7,'model_field_id' => 128,'type' => 10,'option_value' => '20','option_label' => '扩展',],
            ['model_id' => 7,'model_field_id' => 130,'type' => 10,'option_value' => '10','option_label' => '开启',],
            ['model_id' => 7,'model_field_id' => 130,'type' => 10,'option_value' => '20','option_label' => '禁用',],
            ['model_id' => 8,'model_field_id' => 145,'type' => 10,'option_value' => '10','option_label' => '是',],
            ['model_id' => 8,'model_field_id' => 145,'type' => 10,'option_value' => '20','option_label' => '否',],
            ['model_id' => 8,'model_field_id' => 152,'type' => 10,'option_value' => '10','option_label' => '开启',],
            ['model_id' => 8,'model_field_id' => 152,'type' => 10,'option_value' => '20','option_label' => '禁用',],
            ['model_id' => 9,'model_field_id' => 163,'type' => 10,'option_value' => 'text','option_label' => '文本输入框',],
            ['model_id' => 9,'model_field_id' => 163,'type' => 10,'option_value' => 'textarea','option_label' => '多行文本输入框',],
            ['model_id' => 9,'model_field_id' => 163,'type' => 10,'option_value' => 'radio','option_label' => '单选框',],
            ['model_id' => 9,'model_field_id' => 163,'type' => 10,'option_value' => 'password','option_label' => '密码框',],
            ['model_id' => 9,'model_field_id' => 163,'type' => 10,'option_value' => 'checkbox','option_label' => '多选框',],
            ['model_id' => 9,'model_field_id' => 163,'type' => 10,'option_value' => 'input_number','option_label' => '计数器',],
            ['model_id' => 9,'model_field_id' => 163,'type' => 10,'option_value' => 'select','option_label' => '单选下拉框',],
            ['model_id' => 9,'model_field_id' => 163,'type' => 10,'option_value' => 'select_mul','option_label' => '多选下拉框',],
            ['model_id' => 9,'model_field_id' => 163,'type' => 10,'option_value' => 'switch','option_label' => '开关',],
            ['model_id' => 9,'model_field_id' => 163,'type' => 10,'option_value' => 'date','option_label' => '日期日历',],
            ['model_id' => 9,'model_field_id' => 163,'type' => 10,'option_value' => 'datetime','option_label' => '日期时间日历',],
            ['model_id' => 9,'model_field_id' => 163,'type' => 10,'option_value' => 'upload_image','option_label' => '图片上传',],
            ['model_id' => 9,'model_field_id' => 163,'type' => 10,'option_value' => 'upload_file','option_label' => '文件上传',],
            ['model_id' => 9,'model_field_id' => 163,'type' => 10,'option_value' => 'editor','option_label' => '编辑器',],
            ['model_id' => 9,'model_field_id' => 163,'type' => 10,'option_value' => 'hidden','option_label' => '隐藏域',],
            ['model_id' => 9,'model_field_id' => 165,'type' => 10,'option_value' => '10','option_label' => '是',],
            ['model_id' => 9,'model_field_id' => 165,'type' => 10,'option_value' => '20','option_label' => '否',],
            ['model_id' => 9,'model_field_id' => 167,'type' => 10,'option_value' => '10','option_label' => '开启',],
            ['model_id' => 9,'model_field_id' => 167,'type' => 10,'option_value' => '20','option_label' => '禁用',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'require','option_label' => '必填',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'number','option_label' => '纯数字(不包负数和小数点)',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'integer','option_label' => '整数',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'float','option_label' => '浮点数',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'boolean','option_label' => '布尔值',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'email','option_label' => '邮箱',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'array','option_label' => '数组',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'accepted','option_label' => '是否为(yes,on,或是1)',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'date','option_label' => '日期',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'alpha','option_label' => '纯字母',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'alphaNum','option_label' => '字母和数字',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'alphaDash','option_label' => '字母和数字，下划线_及破折号-',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'chs','option_label' => '纯汉字',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'chsAlpha','option_label' => '汉字、字母',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'chsAlphaNum','option_label' => '汉字、字母和数字',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'chsDash','option_label' => '汉字、字母、数字和下划线_及破折号-',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'cntrl','option_label' => '换行、缩进、空格',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'graph','option_label' => '可打印字符(空格除外)',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'print','option_label' => '可打印字符(包括空格)',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'lower','option_label' => '小写字符',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'upper','option_label' => '大写字符',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'space','option_label' => '空白字符(包括缩进，垂直制表符，换行符，回车和换页字符)',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'xdigit','option_label' => '十六进制字符串',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'activeUrl','option_label' => '域名或者IP',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'url','option_label' => 'URL地址',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'ip','option_label' => 'IP地址',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'dateFormat','option_label' => '指定格式的日期',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'mobile','option_label' => '手机号码',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'idCard','option_label' => '身份证号码',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'macAddr','option_label' => 'MAC地址',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'zip','option_label' => '邮政编码',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'in','option_label' => '在某个范围',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'notIn','option_label' => '不在某个范围',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'between','option_label' => '在某个区间',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'notBetween','option_label' => '不在某个范围',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'length','option_label' => '长度是否在某个范围',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'max','option_label' => '最大长度',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'min','option_label' => '最小长度',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'after','option_label' => '在某个日期之后',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'before','option_label' => '在某个日期之前',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'expire','option_label' => '在某个有效日期之内',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'allowIp','option_label' => 'IP是否在某个范围(多个IP用逗号分隔)',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'denyIp','option_label' => 'IP是否禁止(多个IP用逗号分隔)',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'confirm','option_label' => '和另外一个字段的值一致',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'different','option_label' => '和另外一个字段的值不一致',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => '=','option_label' => '等于某个值',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => '>=','option_label' => '大于等于某个值',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => '>','option_label' => '大于某个值',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => '<=','option_label' => '小于等于某个值',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => '<','option_label' => '小于某个值',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'filter','option_label' => '支持使用filter_var进行验证',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'regex','option_label' => '正则验证',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'file','option_label' => '文件',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'image','option_label' => '图像文件',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'fileExt','option_label' => '上传文件后缀',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'fileMime','option_label' => '上传文件类型',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'fileSize','option_label' => '上传文件大小',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'token','option_label' => '表单令牌',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'unique','option_label' => '请求的字段值是否为唯一',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'requireIf','option_label' => '某个字段的值等于某个值的时候必须',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'requireWith','option_label' => '某个字段有值的时候必须',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'requireWithout','option_label' => '某个字段没有值的时候必须',],
            ['model_id' => 10,'model_field_id' => 183,'type' => 10,'option_value' => 'requireCallback','option_label' => '某个callable为真的时候字段必须',],
            ['model_id' => 10,'model_field_id' => 186,'type' => 10,'option_value' => '10','option_label' => '开启',],
            ['model_id' => 10,'model_field_id' => 186,'type' => 10,'option_value' => '20','option_label' => '禁用',],
            ['model_id' => 11,'model_field_id' => 206,'type' => 10,'option_value' => '10','option_label' => '开启',],
            ['model_id' => 11,'model_field_id' => 206,'type' => 10,'option_value' => '20','option_label' => '禁用',],
            ['model_id' => 12,'model_field_id' => 225,'type' => 10,'option_value' => '10','option_label' => '开启',],
            ['model_id' => 12,'model_field_id' => 225,'type' => 10,'option_value' => '20','option_label' => '禁用',],
            ['model_id' => 14,'model_field_id' => 242,'type' => 10,'option_value' => '10','option_label' => '是',],
            ['model_id' => 14,'model_field_id' => 242,'type' => 10,'option_value' => '20','option_label' => '否',],
            ['model_id' => 14,'model_field_id' => 243,'type' => 10,'option_value' => '10','option_label' => '是',],
            ['model_id' => 14,'model_field_id' => 243,'type' => 10,'option_value' => '20','option_label' => '否',],
            ['model_id' => 14,'model_field_id' => 245,'type' => 10,'option_value' => '10','option_label' => '内置',],
            ['model_id' => 14,'model_field_id' => 245,'type' => 10,'option_value' => '20','option_label' => '扩展',],
            ['model_id' => 14,'model_field_id' => 246,'type' => 10,'option_value' => '10','option_label' => '开启',],
            ['model_id' => 14,'model_field_id' => 246,'type' => 10,'option_value' => '20','option_label' => '禁用',],
        ];
        $this->table('field_option')->insert($data)->save();

        //model_relation 模型关联表
        $data = [
            ['model_id' => 1,'model_field_id' => 2,'relation_model_id' => 14,'relation_field_id' => 240,'relation_show_field_id' => '241','relation_filter' => '',],
            ['model_id' => 1,'model_field_id' => 6,'relation_model_id' => 2,'relation_field_id' => 20,'relation_show_field_id' => '21','relation_filter' => '',],
            ['model_id' => 1,'model_field_id' => 7,'relation_model_id' => 3,'relation_field_id' => 40,'relation_show_field_id' => '41,42','relation_filter' => '',],
            ['model_id' => 2,'model_field_id' => 23,'relation_model_id' => 1,'relation_field_id' => 1,'relation_show_field_id' => '3,4','relation_filter' => '',],
            ['model_id' => 3,'model_field_id' => 43,'relation_model_id' => 1,'relation_field_id' => 1,'relation_show_field_id' => '3,4','relation_filter' => '',],
            ['model_id' => 4,'model_field_id' => 62,'relation_model_id' => 1,'relation_field_id' => 1,'relation_show_field_id' => '3,4','relation_filter' => '',],
            ['model_id' => 4,'model_field_id' => 63,'relation_model_id' => 3,'relation_field_id' => 40,'relation_show_field_id' => '41,42','relation_filter' => '',],
            ['model_id' => 5,'model_field_id' => 81,'relation_model_id' => 1,'relation_field_id' => 1,'relation_show_field_id' => '3,4','relation_filter' => '',],
            ['model_id' => 5,'model_field_id' => 82,'relation_model_id' => 3,'relation_field_id' => 40,'relation_show_field_id' => '41,42','relation_filter' => '',],
            ['model_id' => 6,'model_field_id' => 101,'relation_model_id' => 1,'relation_field_id' => 1,'relation_show_field_id' => '3,4','relation_filter' => '',],
            ['model_id' => 6,'model_field_id' => 102,'relation_model_id' => 3,'relation_field_id' => 40,'relation_show_field_id' => '41,42','relation_filter' => '',],
            ['model_id' => 6,'model_field_id' => 103,'relation_model_id' => 1,'relation_field_id' => 1,'relation_show_field_id' => '3,4','relation_filter' => '',],
            ['model_id' => 6,'model_field_id' => 104,'relation_model_id' => 3,'relation_field_id' => 40,'relation_show_field_id' => '41,42','relation_filter' => '',],
            ['model_id' => 6,'model_field_id' => 105,'relation_model_id' => 3,'relation_field_id' => 40,'relation_show_field_id' => '41,42','relation_filter' => '',],
            ['model_id' => 7,'model_field_id' => 127,'relation_model_id' => 1,'relation_field_id' => 1,'relation_show_field_id' => '3,4','relation_filter' => '',],
            ['model_id' => 7,'model_field_id' => 124,'relation_model_id' => 14,'relation_field_id' => 240,'relation_show_field_id' => '241','relation_filter' => '',],
            ['model_id' => 9,'model_field_id' => 161,'relation_model_id' => 1,'relation_field_id' => 1,'relation_show_field_id' => '3,4','relation_filter' => '',],
            ['model_id' => 9,'model_field_id' => 162,'relation_model_id' => 3,'relation_field_id' => 40,'relation_show_field_id' => '41,42','relation_filter' => '',],
            ['model_id' => 10,'model_field_id' => 181,'relation_model_id' => 1,'relation_field_id' => 1,'relation_show_field_id' => '3,4','relation_filter' => '',],
            ['model_id' => 10,'model_field_id' => 182,'relation_model_id' => 9,'relation_field_id' => 160,'relation_show_field_id' => '161,162,163','relation_filter' => '',],
            ['model_id' => 12,'model_field_id' => 221,'relation_model_id' => 1,'relation_field_id' => 1,'relation_show_field_id' => '3,4','relation_filter' => '',],
            ['model_id' => 12,'model_field_id' => 222,'relation_model_id' => 3,'relation_field_id' => 40,'relation_show_field_id' => '41,42','relation_filter' => '',],
            ['model_id' => 12,'model_field_id' => 223,'relation_model_id' => 3,'relation_field_id' => 40,'relation_show_field_id' => '41,42','relation_filter' => '',],
            ['model_id' => 12,'model_field_id' => 224,'relation_model_id' => 2,'relation_field_id' => 20,'relation_show_field_id' => '21','relation_filter' => '',],
        ];
        $this->table('model_relation')->insert($data)->save();

        //model_action 模型动作表
        $data = [
            ['id' => 1,'label' => '模型管理列表','api_path' => '/vuecmf/model_config','model_id' => 1,'action_type' => 'list','status' => 10,],
            ['id' => 2,'label' => '保存模型','api_path' => '/vuecmf/model_config/save','model_id' => 1,'action_type' => 'save','status' => 10,],
            ['id' => 3,'label' => '删除模型','api_path' => '/vuecmf/model_config/delete','model_id' => 1,'action_type' => 'delete','status' => 10,],
            ['id' => 4,'label' => '批量保存模型','api_path' => '/vuecmf/model_config/save_all','model_id' => 1,'action_type' => 'save_all','status' => 10,],
            ['id' => 5,'label' => '批量删除模型','api_path' => '/vuecmf/model_config/delete_batch','model_id' => 1,'action_type' => 'delete_batch','status' => 10,],
            ['id' => 6,'label' => '模型下拉列表','api_path' => '/vuecmf/model_config/dropdown','model_id' => 1,'action_type' => 'dropdown','status' => 10,],
            ['id' => 20,'label' => '模型动作管理列表','api_path' => '/vuecmf/model_action','model_id' => 2,'action_type' => 'list','status' => 10,],
            ['id' => 21,'label' => '保存模型动作','api_path' => '/vuecmf/model_action/save','model_id' => 2,'action_type' => 'save','status' => 10,],
            ['id' => 22,'label' => '删除模型动作','api_path' => '/vuecmf/model_action/delete','model_id' => 2,'action_type' => 'delete','status' => 10,],
            ['id' => 23,'label' => '动作下拉列表','api_path' => '/vuecmf/model_action/dropdown','model_id' => 2,'action_type' => 'dropdown','status' => 10,],
            ['id' => 24,'label' => '批量保存模型动作','api_path' => '/vuecmf/model_action/save_all','model_id' => 2,'action_type' => 'save_all','status' => 10,],
            ['id' => 25,'label' => '批量删除模型动作','api_path' => '/vuecmf/model_action/delete_batch','model_id' => 2,'action_type' => 'delete_batch','status' => 10,],
            ['id' => 40,'label' => '模型字段管理列表','api_path' => '/vuecmf/model_field','model_id' => 3,'action_type' => 'list','status' => 10,],
            ['id' => 41,'label' => '保存模型字段','api_path' => '/vuecmf/model_field/save','model_id' => 3,'action_type' => 'save','status' => 10,],
            ['id' => 42,'label' => '删除模型字段','api_path' => '/vuecmf/model_field/delete','model_id' => 3,'action_type' => 'delete','status' => 10,],
            ['id' => 43,'label' => '字段下拉列表','api_path' => '/vuecmf/model_field/dropdown','model_id' => 3,'action_type' => 'dropdown','status' => 10,],
            ['id' => 44,'label' => '批量保存模型字段','api_path' => '/vuecmf/model_field/save_all','model_id' => 3,'action_type' => 'save_all','status' => 10,],
            ['id' => 45,'label' => '批量删除模型字段','api_path' => '/vuecmf/model_field/delete_batch','model_id' => 3,'action_type' => 'delete_batch','status' => 10,],
            ['id' => 60,'label' => '字段选项管理列表','api_path' => '/vuecmf/field_option','model_id' => 4,'action_type' => 'list','status' => 10,],
            ['id' => 61,'label' => '保存字段选项','api_path' => '/vuecmf/field_option/save','model_id' => 4,'action_type' => 'save','status' => 10,],
            ['id' => 62,'label' => '删除字段选项','api_path' => '/vuecmf/field_option/delete','model_id' => 4,'action_type' => 'delete','status' => 10,],
            ['id' => 63,'label' => '批量保存字段选项','api_path' => '/vuecmf/field_option/save_all','model_id' => 4,'action_type' => 'save_all','status' => 10,],
            ['id' => 64,'label' => '批量删除字段选项','api_path' => '/vuecmf/field_option/delete_batch','model_id' => 4,'action_type' => 'delete_batch','status' => 10,],
            ['id' => 65,'label' => '字段选项下拉列表','api_path' => '/vuecmf/field_option/dropdown','model_id' => 4,'action_type' => 'dropdown','status' => 10,],
            ['id' => 80,'label' => '模型索引管理列表','api_path' => '/vuecmf/model_index','model_id' => 5,'action_type' => 'list','status' => 10,],
            ['id' => 81,'label' => '保存模型索引','api_path' => '/vuecmf/model_index/save','model_id' => 5,'action_type' => 'save','status' => 10,],
            ['id' => 82,'label' => '删除模型索引','api_path' => '/vuecmf/model_index/delete','model_id' => 5,'action_type' => 'delete','status' => 10,],
            ['id' => 83,'label' => '批量保存模型索引','api_path' => '/vuecmf/model_index/save_all','model_id' => 5,'action_type' => 'save_all','status' => 10,],
            ['id' => 84,'label' => '批量删除模型索引','api_path' => '/vuecmf/model_index/delete_batch','model_id' => 5,'action_type' => 'delete_batch','status' => 10,],
            ['id' => 100,'label' => '模型关联管理列表','api_path' => '/vuecmf/model_relation','model_id' => 6,'action_type' => 'list','status' => 10,],
            ['id' => 101,'label' => '保存模型关联','api_path' => '/vuecmf/model_relation/save','model_id' => 6,'action_type' => 'save','status' => 10,],
            ['id' => 102,'label' => '删除模型关联','api_path' => '/vuecmf/model_relation/delete','model_id' => 6,'action_type' => 'delete','status' => 10,],
            ['id' => 103,'label' => '批量保存模型关联','api_path' => '/vuecmf/model_relation/save_all','model_id' => 6,'action_type' => 'save_all','status' => 10,],
            ['id' => 104,'label' => '批量删除模型关联','api_path' => '/vuecmf/model_relation/delete_batch','model_id' => 6,'action_type' => 'delete_batch','status' => 10,],
            ['id' => 120,'label' => '菜单管理列表','api_path' => '/vuecmf/menu','model_id' => 7,'action_type' => 'list','status' => 10,],
            ['id' => 121,'label' => '保存菜单','api_path' => '/vuecmf/menu/save','model_id' => 7,'action_type' => 'save','status' => 10,],
            ['id' => 122,'label' => '删除菜单','api_path' => '/vuecmf/menu/delete','model_id' => 7,'action_type' => 'delete','status' => 10,],
            ['id' => 123,'label' => '导航菜单','api_path' => '/vuecmf/menu/nav','model_id' => 7,'action_type' => 'nav','status' => 10,],
            ['id' => 124,'label' => '批量保存菜单','api_path' => '/vuecmf/menu/save_all','model_id' => 7,'action_type' => 'save_all','status' => 10,],
            ['id' => 125,'label' => '批量删除菜单','api_path' => '/vuecmf/menu/delete_batch','model_id' => 7,'action_type' => 'delete_batch','status' => 10,],
            ['id' => 140,'label' => '管理员列表','api_path' => '/vuecmf/admin','model_id' => 8,'action_type' => 'list','status' => 10,],
            ['id' => 141,'label' => '保存管理员','api_path' => '/vuecmf/admin/save','model_id' => 8,'action_type' => 'save','status' => 10,],
            ['id' => 142,'label' => '删除管理员','api_path' => '/vuecmf/admin/delete','model_id' => 8,'action_type' => 'delete','status' => 10,],
            ['id' => 143,'label' => '管理员详情','api_path' => '/vuecmf/admin/detail','model_id' => 8,'action_type' => 'detail','status' => 10,],
            ['id' => 144,'label' => '获取动作列表','api_path' => '/vuecmf/model_action/get_action_list','model_id' => 8,'action_type' => 'action_list','status' => 10,],
            ['id' => 145,'label' => '分配角色','api_path' => '/vuecmf/admin/add_role','model_id' => 8,'action_type' => 'assign_role','status' => 10,],
            ['id' => 146,'label' => '登录后台','api_path' => '/vuecmf/admin/login','model_id' => 8,'action_type' => 'login','status' => 10,],
            ['id' => 147,'label' => '退出系统','api_path' => '/vuecmf/admin/logout','model_id' => 8,'action_type' => 'logout','status' => 10,],
            ['id' => 148,'label' => '批量保存管理员','api_path' => '/vuecmf/admin/save_all','model_id' => 8,'action_type' => 'save_all','status' => 10,],
            ['id' => 149,'label' => '批量删除管理员','api_path' => '/vuecmf/admin/delete_batch','model_id' => 8,'action_type' => 'delete_batch','status' => 10,],
            ['id' => 150,'label' => '获取所有角色','api_path' => '/vuecmf/admin/get_all_roles','model_id' => 8,'action_type' => 'get_all_roles','status' => 10,],
            ['id' => 151,'label' => '获取用户的角色','api_path' => '/vuecmf/admin/get_roles','model_id' => 8,'action_type' => 'get_roles','status' => 10,],
            ['id' => 152,'label' => '设置用户权限','api_path' => '/vuecmf/admin/set_user_permission','model_id' => 8,'action_type' => 'set_user_permission','status' => 10,],
            ['id' => 153,'label' => '获取用户权限','api_path' => '/vuecmf/admin/get_user_permission','model_id' => 8,'action_type' => 'get_user_permission','status' => 10,],
            ['id' => 180,'label' => '模型表单管理列表','api_path' => '/vuecmf/model_form','model_id' => 9,'action_type' => 'list','status' => 10,],
            ['id' => 181,'label' => '保存模型表单','api_path' => '/vuecmf/model_form/save','model_id' => 9,'action_type' => 'save','status' => 10,],
            ['id' => 182,'label' => '删除模型表单','api_path' => '/vuecmf/model_form/delete','model_id' => 9,'action_type' => 'delete','status' => 10,],
            ['id' => 183,'label' => '表单下拉列表','api_path' => '/vuecmf/model_form/dropdown','model_id' => 9,'action_type' => 'dropdown','status' => 10,],
            ['id' => 184,'label' => '批量保存模型表单','api_path' => '/vuecmf/model_form/save_all','model_id' => 9,'action_type' => 'save_all','status' => 10,],
            ['id' => 185,'label' => '批量删除模型表单','api_path' => '/vuecmf/model_form/delete_batch','model_id' => 9,'action_type' => 'delete_batch','status' => 10,],
            ['id' => 200,'label' => '模型表单验证管理列表','api_path' => '/vuecmf/model_form_rules','model_id' => 10,'action_type' => 'list','status' => 10,],
            ['id' => 201,'label' => '保存模型表单验证','api_path' => '/vuecmf/model_form_rules/save','model_id' => 10,'action_type' => 'save','status' => 10,],
            ['id' => 202,'label' => '删除模型表单验证','api_path' => '/vuecmf/model_form_rules/delete','model_id' => 10,'action_type' => 'delete','status' => 10,],
            ['id' => 203,'label' => '批量保存模型表单验证','api_path' => '/vuecmf/model_form_rules/save_all','model_id' => 10,'action_type' => 'save_all','status' => 10,],
            ['id' => 204,'label' => '批量删除模型表单验证','api_path' => '/vuecmf/model_form_rules/delete_batch','model_id' => 10,'action_type' => 'delete_batch','status' => 10,],
            ['id' => 220,'label' => '角色管理列表','api_path' => '/vuecmf/roles','model_id' => 11,'action_type' => 'list','status' => 10,],
            ['id' => 221,'label' => '保存角色','api_path' => '/vuecmf/roles/save','model_id' => 11,'action_type' => 'save','status' => 10,],
            ['id' => 222,'label' => '删除角色','api_path' => '/vuecmf/roles/delete','model_id' => 11,'action_type' => 'delete','status' => 10,],
            ['id' => 223,'label' => '批量保存角色','api_path' => '/vuecmf/roles/save_all','model_id' => 11,'action_type' => 'save_all','status' => 10,],
            ['id' => 224,'label' => '获取动作列表','api_path' => '/vuecmf/model_action/get_action_list','model_id' => 11,'action_type' => 'action_list','status' => 10,],
            ['id' => 225,'label' => '批量删除角色','api_path' => '/vuecmf/roles/delete_batch','model_id' => 11,'action_type' => 'delete_batch','status' => 10,],
            ['id' => 226,'label' => '批量分配用户','api_path' => '/vuecmf/roles/add_users','model_id' => 11,'action_type' => 'assign_users','status' => 10,],
            ['id' => 227,'label' => '批量删除用户','api_path' => '/vuecmf/roles/del_users','model_id' => 11,'action_type' => 'del_users','status' => 10,],
            ['id' => 228,'label' => '设置角色权限','api_path' => '/vuecmf/roles/add_permission','model_id' => 11,'action_type' => 'add_permission','status' => 10,],
            ['id' => 229,'label' => '删除角色权限','api_path' => '/vuecmf/roles/del_permission','model_id' => 11,'action_type' => 'del_permission','status' => 10,],
            ['id' => 230,'label' => '获取角色下所有用户','api_path' => '/vuecmf/roles/get_users','model_id' => 11,'action_type' => 'get_users','status' => 10,],
            ['id' => 231,'label' => '获取角色下所有权限','api_path' => '/vuecmf/roles/get_permission','model_id' => 11,'action_type' => 'get_permission','status' => 10,],
            ['id' => 232,'label' => '获取所有用户','api_path' => '/vuecmf/roles/get_all_users','model_id' => 11,'action_type' => 'get_all_users','status' => 10,],
            ['id' => 260,'label' => '模型联动设置列表','api_path' => '/vuecmf/model_form_linkage','model_id' => 12,'action_type' => 'list','status' => 10,],
            ['id' => 261,'label' => '保存模型联动设置','api_path' => '/vuecmf/model_form_linkage/save','model_id' => 12,'action_type' => 'save','status' => 10,],
            ['id' => 262,'label' => '删除模型联动设置','api_path' => '/vuecmf/model_form_linkage/delete','model_id' => 12,'action_type' => 'delete','status' => 10,],
            ['id' => 263,'label' => '批量保存模型联动设置','api_path' => '/vuecmf/model_form_linkage/save_all','model_id' => 12,'action_type' => 'save_all','status' => 10,],
            ['id' => 264,'label' => '批量删除模型联动设置','api_path' => '/vuecmf/model_form_linkage/delete_batch','model_id' => 12,'action_type' => 'delete_batch','status' => 10,],
            ['id' => 280,'label' => '文件上传','api_path' => '/vuecmf/upload','model_id' => 13,'action_type' => 'upload','status' => 10,],
            ['id' => 300,'label' => '应用管理列表','api_path' => '/vuecmf/app_config','model_id' => 14,'action_type' => 'list','status' => 10,],
            ['id' => 301,'label' => '保存应用','api_path' => '/vuecmf/app_config/save','model_id' => 14,'action_type' => 'save','status' => 10,],
            ['id' => 302,'label' => '删除应用','api_path' => '/vuecmf/app_config/delete','model_id' => 14,'action_type' => 'delete','status' => 10,],
            ['id' => 303,'label' => '应用下拉列表','api_path' => '/vuecmf/app_config/dropdown','model_id' => 14,'action_type' => 'dropdown','status' => 10,],
            ['id' => 304,'label' => '批量保存应用','api_path' => '/vuecmf/app_config/save_all','model_id' => 14,'action_type' => 'save_all','status' => 10,],
            ['id' => 305,'label' => '批量删除应用','api_path' => '/vuecmf/app_config/delete_batch','model_id' => 14,'action_type' => 'delete_batch','status' => 10,],
        ];
        $this->table('model_action')->insert($data)->save();

        //model_form 模型表单表
        $data = [
            ['id' => 1,'model_id' => 1,'model_field_id' => 2,'type' => 'select','default_value' => '','is_disabled' => 20,'sort_num' => 1,'status' => 10,],
            ['id' => 2,'model_id' => 1,'model_field_id' => 3,'type' => 'text','default_value' => '','is_disabled' => 20,'sort_num' => 2,'status' => 10,],
            ['id' => 3,'model_id' => 1,'model_field_id' => 4,'type' => 'text','default_value' => '','is_disabled' => 20,'sort_num' => 3,'status' => 10,],
            ['id' => 4,'model_id' => 1,'model_field_id' => 5,'type' => 'select','default_value' => 'template/content/List','is_disabled' => 20,'sort_num' => 4,'status' => 10,],
            ['id' => 5,'model_id' => 1,'model_field_id' => 6,'type' => 'select','default_value' => '','is_disabled' => 20,'sort_num' => 5,'status' => 10,],
            ['id' => 6,'model_id' => 1,'model_field_id' => 7,'type' => 'select_mul','default_value' => '','is_disabled' => 20,'sort_num' => 6,'status' => 10,],
            ['id' => 7,'model_id' => 1,'model_field_id' => 9,'type' => 'radio','default_value' => '20','is_disabled' => 20,'sort_num' => 7,'status' => 10,],
            ['id' => 8,'model_id' => 1,'model_field_id' => 10,'type' => 'textarea','default_value' => '','is_disabled' => 20,'sort_num' => 8,'status' => 10,],
            ['id' => 9,'model_id' => 1,'model_field_id' => 11,'type' => 'radio','default_value' => '10','is_disabled' => 20,'sort_num' => 9,'status' => 10,],
            ['id' => 20,'model_id' => 2,'model_field_id' => 23,'type' => 'select','default_value' => '','is_disabled' => 10,'sort_num' => 20,'status' => 10,],
            ['id' => 21,'model_id' => 2,'model_field_id' => 21,'type' => 'text','default_value' => '','is_disabled' => 20,'sort_num' => 21,'status' => 10,],
            ['id' => 22,'model_id' => 2,'model_field_id' => 22,'type' => 'text','default_value' => '','is_disabled' => 20,'sort_num' => 22,'status' => 10,],
            ['id' => 23,'model_id' => 2,'model_field_id' => 24,'type' => 'select','default_value' => '','is_disabled' => 20,'sort_num' => 23,'status' => 10,],
            ['id' => 24,'model_id' => 2,'model_field_id' => 25,'type' => 'radio','default_value' => '10','is_disabled' => 20,'sort_num' => 24,'status' => 10,],
            ['id' => 40,'model_id' => 3,'model_field_id' => 41,'type' => 'text','default_value' => '','is_disabled' => 20,'sort_num' => 40,'status' => 10,],
            ['id' => 41,'model_id' => 3,'model_field_id' => 42,'type' => 'text','default_value' => '','is_disabled' => 20,'sort_num' => 41,'status' => 10,],
            ['id' => 42,'model_id' => 3,'model_field_id' => 43,'type' => 'select','default_value' => '','is_disabled' => 10,'sort_num' => 42,'status' => 10,],
            ['id' => 43,'model_id' => 3,'model_field_id' => 44,'type' => 'select','default_value' => '','is_disabled' => 20,'sort_num' => 43,'status' => 10,],
            ['id' => 44,'model_id' => 3,'model_field_id' => 45,'type' => 'input_number','default_value' => '','is_disabled' => 20,'sort_num' => 44,'status' => 10,],
            ['id' => 45,'model_id' => 3,'model_field_id' => 46,'type' => 'input_number','default_value' => '0','is_disabled' => 20,'sort_num' => 45,'status' => 10,],
            ['id' => 46,'model_id' => 3,'model_field_id' => 47,'type' => 'radio','default_value' => '10','is_disabled' => 20,'sort_num' => 46,'status' => 10,],
            ['id' => 47,'model_id' => 3,'model_field_id' => 49,'type' => 'text','default_value' => '','is_disabled' => 20,'sort_num' => 47,'status' => 10,],
            ['id' => 48,'model_id' => 3,'model_field_id' => 48,'type' => 'textarea','default_value' => '','is_disabled' => 20,'sort_num' => 48,'status' => 10,],
            ['id' => 49,'model_id' => 3,'model_field_id' => 50,'type' => 'radio','default_value' => '20','is_disabled' => 20,'sort_num' => 49,'status' => 10,],
            ['id' => 50,'model_id' => 3,'model_field_id' => 51,'type' => 'radio','default_value' => '20','is_disabled' => 20,'sort_num' => 50,'status' => 10,],
            ['id' => 51,'model_id' => 3,'model_field_id' => 52,'type' => 'radio','default_value' => '10','is_disabled' => 20,'sort_num' => 51,'status' => 10,],
            ['id' => 52,'model_id' => 3,'model_field_id' => 53,'type' => 'radio','default_value' => '10','is_disabled' => 20,'sort_num' => 52,'status' => 10,],
            ['id' => 53,'model_id' => 3,'model_field_id' => 54,'type' => 'radio','default_value' => '20','is_disabled' => 20,'sort_num' => 53,'status' => 10,],
            ['id' => 54,'model_id' => 3,'model_field_id' => 55,'type' => 'input_number','default_value' => '150','is_disabled' => 20,'sort_num' => 54,'status' => 10,],
            ['id' => 55,'model_id' => 3,'model_field_id' => 56,'type' => 'radio','default_value' => '10','is_disabled' => 20,'sort_num' => 55,'status' => 10,],
            ['id' => 56,'model_id' => 3,'model_field_id' => 57,'type' => 'input_number','default_value' => '0','is_disabled' => 20,'sort_num' => 56,'status' => 10,],
            ['id' => 57,'model_id' => 3,'model_field_id' => 58,'type' => 'radio','default_value' => '10','is_disabled' => 20,'sort_num' => 57,'status' => 10,],
            ['id' => 80,'model_id' => 4,'model_field_id' => 62,'type' => 'select','default_value' => '','is_disabled' => 10,'sort_num' => 80,'status' => 10,],
            ['id' => 81,'model_id' => 4,'model_field_id' => 63,'type' => 'select','default_value' => '','is_disabled' => 10,'sort_num' => 81,'status' => 10,],
            ['id' => 82,'model_id' => 4,'model_field_id' => 64,'type' => 'text','default_value' => '','is_disabled' => 20,'sort_num' => 82,'status' => 10,],
            ['id' => 83,'model_id' => 4,'model_field_id' => 65,'type' => 'text','default_value' => '','is_disabled' => 20,'sort_num' => 83,'status' => 10,],
            ['id' => 84,'model_id' => 4,'model_field_id' => 66,'type' => 'radio','default_value' => '10','is_disabled' => 20,'sort_num' => 84,'status' => 10,],
            ['id' => 100,'model_id' => 5,'model_field_id' => 81,'type' => 'select','default_value' => '','is_disabled' => 10,'sort_num' => 100,'status' => 10,],
            ['id' => 101,'model_id' => 5,'model_field_id' => 82,'type' => 'select_mul','default_value' => '','is_disabled' => 20,'sort_num' => 101,'status' => 10,],
            ['id' => 102,'model_id' => 5,'model_field_id' => 83,'type' => 'select','default_value' => 'NORMAL','is_disabled' => 20,'sort_num' => 102,'status' => 10,],
            ['id' => 103,'model_id' => 5,'model_field_id' => 84,'type' => 'radio','default_value' => '10','is_disabled' => 20,'sort_num' => 103,'status' => 10,],
            ['id' => 120,'model_id' => 6,'model_field_id' => 101,'type' => 'select','default_value' => '','is_disabled' => 10,'sort_num' => 120,'status' => 10,],
            ['id' => 121,'model_id' => 6,'model_field_id' => 102,'type' => 'select','default_value' => '','is_disabled' => 10,'sort_num' => 121,'status' => 10,],
            ['id' => 122,'model_id' => 6,'model_field_id' => 103,'type' => 'select','default_value' => '','is_disabled' => 20,'sort_num' => 122,'status' => 10,],
            ['id' => 123,'model_id' => 6,'model_field_id' => 104,'type' => 'select','default_value' => '','is_disabled' => 20,'sort_num' => 123,'status' => 10,],
            ['id' => 124,'model_id' => 6,'model_field_id' => 105,'type' => 'select_mul','default_value' => '','is_disabled' => 20,'sort_num' => 124,'status' => 10,],
            ['id' => 125,'model_id' => 6,'model_field_id' => 106,'type' => 'text','default_value' => '','is_disabled' => 20,'sort_num' => 125,'status' => 10,],
            ['id' => 126,'model_id' => 6,'model_field_id' => 107,'type' => 'radio','default_value' => '10','is_disabled' => 20,'sort_num' => 126,'status' => 10,],
            ['id' => 140,'model_id' => 7,'model_field_id' => 121,'type' => 'text','default_value' => '','is_disabled' => 20,'sort_num' => 140,'status' => 10,],
            ['id' => 141,'model_id' => 7,'model_field_id' => 122,'type' => 'select','default_value' => '','is_disabled' => 20,'sort_num' => 141,'status' => 10,],
            ['id' => 142,'model_id' => 7,'model_field_id' => 123,'type' => 'select','default_value' => '','is_disabled' => 20,'sort_num' => 142,'status' => 10,],
            ['id' => 143,'model_id' => 7,'model_field_id' => 124,'type' => 'select','default_value' => '','is_disabled' => 20,'sort_num' => 143,'status' => 10,],
            ['id' => 144,'model_id' => 7,'model_field_id' => 127,'type' => 'select','default_value' => '','is_disabled' => 20,'sort_num' => 144,'status' => 10,],
            ['id' => 145,'model_id' => 7,'model_field_id' => 129,'type' => 'input_number','default_value' => '0','is_disabled' => 20,'sort_num' => 145,'status' => 10,],
            ['id' => 146,'model_id' => 7,'model_field_id' => 130,'type' => 'radio','default_value' => '10','is_disabled' => 20,'sort_num' => 146,'status' => 10,],
            ['id' => 160,'model_id' => 8,'model_field_id' => 141,'type' => 'text','default_value' => '','is_disabled' => 20,'sort_num' => 160,'status' => 10,],
            ['id' => 161,'model_id' => 8,'model_field_id' => 142,'type' => 'password','default_value' => '','is_disabled' => 20,'sort_num' => 161,'status' => 10,],
            ['id' => 162,'model_id' => 8,'model_field_id' => 143,'type' => 'text','default_value' => '','is_disabled' => 20,'sort_num' => 162,'status' => 10,],
            ['id' => 163,'model_id' => 8,'model_field_id' => 144,'type' => 'text','default_value' => '','is_disabled' => 20,'sort_num' => 163,'status' => 10,],
            ['id' => 164,'model_id' => 8,'model_field_id' => 145,'type' => 'radio','default_value' => '20','is_disabled' => 20,'sort_num' => 164,'status' => 10,],
            ['id' => 180,'model_id' => 9,'model_field_id' => 161,'type' => 'select','default_value' => '','is_disabled' => 10,'sort_num' => 180,'status' => 10,],
            ['id' => 181,'model_id' => 9,'model_field_id' => 162,'type' => 'select','default_value' => '','is_disabled' => 20,'sort_num' => 181,'status' => 10,],
            ['id' => 182,'model_id' => 9,'model_field_id' => 163,'type' => 'select','default_value' => '','is_disabled' => 20,'sort_num' => 182,'status' => 10,],
            ['id' => 183,'model_id' => 9,'model_field_id' => 164,'type' => 'text','default_value' => '','is_disabled' => 20,'sort_num' => 183,'status' => 10,],
            ['id' => 184,'model_id' => 9,'model_field_id' => 165,'type' => 'radio','default_value' => '20','is_disabled' => 20,'sort_num' => 184,'status' => 10,],
            ['id' => 185,'model_id' => 9,'model_field_id' => 166,'type' => 'input_number','default_value' => '0','is_disabled' => 20,'sort_num' => 185,'status' => 10,],
            ['id' => 186,'model_id' => 9,'model_field_id' => 167,'type' => 'radio','default_value' => '10','is_disabled' => 20,'sort_num' => 186,'status' => 10,],
            ['id' => 200,'model_id' => 10,'model_field_id' => 181,'type' => 'select','default_value' => '','is_disabled' => 10,'sort_num' => 200,'status' => 10,],
            ['id' => 201,'model_id' => 10,'model_field_id' => 182,'type' => 'select','default_value' => '','is_disabled' => 10,'sort_num' => 201,'status' => 10,],
            ['id' => 202,'model_id' => 10,'model_field_id' => 183,'type' => 'select','default_value' => '','is_disabled' => 20,'sort_num' => 202,'status' => 10,],
            ['id' => 203,'model_id' => 10,'model_field_id' => 184,'type' => 'text','default_value' => '','is_disabled' => 20,'sort_num' => 203,'status' => 10,],
            ['id' => 204,'model_id' => 10,'model_field_id' => 185,'type' => 'text','default_value' => '','is_disabled' => 20,'sort_num' => 204,'status' => 10,],
            ['id' => 205,'model_id' => 10,'model_field_id' => 186,'type' => 'radio','default_value' => '10','is_disabled' => 20,'sort_num' => 205,'status' => 10,],
            ['id' => 220,'model_id' => 11,'model_field_id' => 201,'type' => 'text','default_value' => '','is_disabled' => 20,'sort_num' => 220,'status' => 10,],
            ['id' => 221,'model_id' => 11,'model_field_id' => 203,'type' => 'select','default_value' => '','is_disabled' => 20,'sort_num' => 221,'status' => 10,],
            ['id' => 222,'model_id' => 11,'model_field_id' => 205,'type' => 'textarea','default_value' => '','is_disabled' => 20,'sort_num' => 222,'status' => 10,],
            ['id' => 223,'model_id' => 11,'model_field_id' => 206,'type' => 'radio','default_value' => '10','is_disabled' => 20,'sort_num' => 223,'status' => 10,],
            ['id' => 240,'model_id' => 12,'model_field_id' => 221,'type' => 'select','default_value' => '','is_disabled' => 10,'sort_num' => 240,'status' => 10,],
            ['id' => 241,'model_id' => 12,'model_field_id' => 222,'type' => 'select','default_value' => '','is_disabled' => 10,'sort_num' => 241,'status' => 10,],
            ['id' => 242,'model_id' => 12,'model_field_id' => 223,'type' => 'select','default_value' => '','is_disabled' => 20,'sort_num' => 242,'status' => 10,],
            ['id' => 243,'model_id' => 12,'model_field_id' => 224,'type' => 'select','default_value' => '','is_disabled' => 20,'sort_num' => 243,'status' => 10,],
            ['id' => 244,'model_id' => 12,'model_field_id' => 225,'type' => 'radio','default_value' => '10','is_disabled' => 20,'sort_num' => 244,'status' => 10,],
            ['id' => 260,'model_id' => 14,'model_field_id' => 241,'type' => 'text','default_value' => '','is_disabled' => 20,'sort_num' => 260,'status' => 10,],
            ['id' => 261,'model_id' => 14,'model_field_id' => 242,'type' => 'radio','default_value' => '10','is_disabled' => 20,'sort_num' => 261,'status' => 10,],
            ['id' => 262,'model_id' => 14,'model_field_id' => 243,'type' => 'radio','default_value' => '10','is_disabled' => 20,'sort_num' => 262,'status' => 10,],
            ['id' => 263,'model_id' => 14,'model_field_id' => 244,'type' => 'textarea','default_value' => '','is_disabled' => 20,'sort_num' => 263,'status' => 10,],
            ['id' => 264,'model_id' => 14,'model_field_id' => 245,'type' => 'radio','default_value' => '20','is_disabled' => 20,'sort_num' => 264,'status' => 10,],
        ];
        $this->table('model_form')->insert($data)->save();

        //model_form_rules 表单验证规则表
        $data = [
            ['model_id' => 1,'model_form_id' => 1,'rule_type' => 'require','rule_value' => '','error_tips' => '请选择',],
            ['model_id' => 1,'model_form_id' => 2,'rule_type' => 'require','rule_value' => '','error_tips' => '表名必填',],
            ['model_id' => 1,'model_form_id' => 3,'rule_type' => 'require','rule_value' => '','error_tips' => '模型标签必填',],
            ['model_id' => 1,'model_form_id' => 4,'rule_type' => 'require','rule_value' => '','error_tips' => '请选择',],
            ['model_id' => 2,'model_form_id' => 20,'rule_type' => 'require','rule_value' => '','error_tips' => '请选择',],
            ['model_id' => 2,'model_form_id' => 21,'rule_type' => 'require','rule_value' => '','error_tips' => '动作标签必填',],
            ['model_id' => 2,'model_form_id' => 22,'rule_type' => 'require','rule_value' => '','error_tips' => '后端请求地址必填',],
            ['model_id' => 2,'model_form_id' => 23,'rule_type' => 'require','rule_value' => '','error_tips' => '请选择',],
            ['model_id' => 2,'model_form_id' => 24,'rule_type' => 'require','rule_value' => '','error_tips' => '请选择',],
            ['model_id' => 3,'model_form_id' => 40,'rule_type' => 'require','rule_value' => '','error_tips' => '字段名称必填',],
            ['model_id' => 3,'model_form_id' => 41,'rule_type' => 'require','rule_value' => '','error_tips' => '字段中文名必填',],
            ['model_id' => 3,'model_form_id' => 42,'rule_type' => 'require','rule_value' => '','error_tips' => '请选择',],
            ['model_id' => 3,'model_form_id' => 43,'rule_type' => 'require','rule_value' => '','error_tips' => '请选择',],
            ['model_id' => 3,'model_form_id' => 44,'rule_type' => 'number','rule_value' => '','error_tips' => '请输入数字',],
            ['model_id' => 4,'model_form_id' => 80,'rule_type' => 'require','rule_value' => '','error_tips' => '请选择',],
            ['model_id' => 4,'model_form_id' => 81,'rule_type' => 'require','rule_value' => '','error_tips' => '请选择',],
            ['model_id' => 4,'model_form_id' => 82,'rule_type' => 'require','rule_value' => '','error_tips' => '选项值必填',],
            ['model_id' => 4,'model_form_id' => 83,'rule_type' => 'require','rule_value' => '','error_tips' => '选项标签必填',],
            ['model_id' => 5,'model_form_id' => 100,'rule_type' => 'require','rule_value' => '','error_tips' => '请选择',],
            ['model_id' => 5,'model_form_id' => 101,'rule_type' => 'require','rule_value' => '','error_tips' => '请选择',],
            ['model_id' => 5,'model_form_id' => 102,'rule_type' => 'require','rule_value' => '','error_tips' => '请选择',],
            ['model_id' => 6,'model_form_id' => 120,'rule_type' => 'require','rule_value' => '','error_tips' => '请选择',],
            ['model_id' => 6,'model_form_id' => 121,'rule_type' => 'require','rule_value' => '','error_tips' => '请选择',],
            ['model_id' => 6,'model_form_id' => 122,'rule_type' => 'require','rule_value' => '','error_tips' => '请选择',],
            ['model_id' => 6,'model_form_id' => 123,'rule_type' => 'require','rule_value' => '','error_tips' => '请选择',],
            ['model_id' => 6,'model_form_id' => 124,'rule_type' => 'require','rule_value' => '','error_tips' => '请选择',],
            ['model_id' => 7,'model_form_id' => 140,'rule_type' => 'require','rule_value' => '','error_tips' => '菜单标题必填',],
            ['model_id' => 8,'model_form_id' => 160,'rule_type' => 'require','rule_value' => '','error_tips' => '用户名必填',],
            ['model_id' => 8,'model_form_id' => 160,'rule_type' => 'length','rule_value' => '4,32','error_tips' => '用户名长度为4到32个字符',],
            ['model_id' => 8,'model_form_id' => 162,'rule_type' => 'require','rule_value' => '','error_tips' => '邮箱必填',],
            ['model_id' => 8,'model_form_id' => 162,'rule_type' => 'email','rule_value' => '','error_tips' => '邮箱输入有误',],
            ['model_id' => 8,'model_form_id' => 163,'rule_type' => 'require','rule_value' => '','error_tips' => '手机必填',],
            ['model_id' => 8,'model_form_id' => 163,'rule_type' => 'mobile','rule_value' => '','error_tips' => '手机输入有误',],
            ['model_id' => 9,'model_form_id' => 180,'rule_type' => 'require','rule_value' => '','error_tips' => '请选择',],
            ['model_id' => 9,'model_form_id' => 181,'rule_type' => 'require','rule_value' => '','error_tips' => '请选择',],
            ['model_id' => 9,'model_form_id' => 182,'rule_type' => 'require','rule_value' => '','error_tips' => '请选择',],
            ['model_id' => 10,'model_form_id' => 200,'rule_type' => 'require','rule_value' => '','error_tips' => '请选择',],
            ['model_id' => 10,'model_form_id' => 201,'rule_type' => 'require','rule_value' => '','error_tips' => '请选择',],
            ['model_id' => 10,'model_form_id' => 202,'rule_type' => 'require','rule_value' => '','error_tips' => '请选择',],
            ['model_id' => 11,'model_form_id' => 220,'rule_type' => 'require','rule_value' => '','error_tips' => '角色名称必填',],
            ['model_id' => 12,'model_form_id' => 240,'rule_type' => 'require','rule_value' => '','error_tips' => '请选择',],
            ['model_id' => 12,'model_form_id' => 241,'rule_type' => 'require','rule_value' => '','error_tips' => '请选择',],
            ['model_id' => 12,'model_form_id' => 242,'rule_type' => 'require','rule_value' => '','error_tips' => '请选择',],
            ['model_id' => 12,'model_form_id' => 243,'rule_type' => 'require','rule_value' => '','error_tips' => '请选择',],
            ['model_id' => 14,'model_form_id' => 260,'rule_type' => 'require','rule_value' => '','error_tips' => '应用名称必填',],
        ];
        $this->table('model_form_rules')->insert($data)->save();

        //admin 管理员表:  password = 123456
        $data = [
            ['username' => 'vuecmf','password' => '$2a$10$/OGrqqU4vJomU475crwBM.wi3380HsDY3RWnq1OyZaM7RRQvzZMeG','email' => '2278667823@qq.com','mobile' => '18988888888','is_super' => 10,],
        ];
        $this->table('admin')->insert($data)->save();

        //menu 菜单管理表
        $data = [
            ['id' => 1,'title' => '系统管理','icon' => 'setting','pid' => 0,'id_path' => '','path_name' => '','model_id' => 0,'app_id' => 1,'type' => 10,'sort_num' => 999999,'status' => 10,],
            ['id' => 2,'title' => '系统授权','icon' => 'lock','pid' => 1,'id_path' => 'm1','path_name' => '系统管理,系统授权','model_id' => 0,'app_id' => 1,'type' => 10,'sort_num' => 2,'status' => 10,],
            ['id' => 3,'title' => '管理员','icon' => 'user','pid' => 2,'id_path' => 'm1,m2','path_name' => '系统管理,系统授权,管理员','model_id' => 8,'app_id' => 1,'type' => 10,'sort_num' => 3,'status' => 10,],
            ['id' => 4,'title' => '角色','icon' => 'document','pid' => 2,'id_path' => 'm1,m2','path_name' => '系统管理,系统授权,角色','model_id' => 11,'app_id' => 1,'type' => 10,'sort_num' => 4,'status' => 10,],
            ['id' => 5,'title' => '应用管理','icon' => 'folder','pid' => 1,'id_path' => 'm1','path_name' => '系统管理,应用管理','model_id' => 14,'app_id' => 1,'type' => 10,'sort_num' => 5,'status' => 10,],
            ['id' => 6,'title' => '模型配置','icon' => 'document-copy','pid' => 1,'id_path' => 'm1','path_name' => '系统管理,模型配置','model_id' => 1,'app_id' => 1,'type' => 10,'sort_num' => 6,'status' => 10,],
            ['id' => 7,'title' => '菜单配置','icon' => 'notebook','pid' => 1,'id_path' => 'm1','path_name' => '系统管理,菜单配置','model_id' => 7,'app_id' => 1,'type' => 10,'sort_num' => 7,'status' => 10,],
        ];
        $this->table('menu')->insert($data)->save();

        //model_form_linkage 表单联动表
        $data = [
            ['model_id' => 1,'model_field_id' => 3,'linkage_field_id' => 6,'linkage_action_id' => 23,],
            ['model_id' => 1,'model_field_id' => 3,'linkage_field_id' => 7,'linkage_action_id' => 43,],
            ['model_id' => 5,'model_field_id' => 81,'linkage_field_id' => 82,'linkage_action_id' => 43,],
            ['model_id' => 6,'model_field_id' => 103,'linkage_field_id' => 104,'linkage_action_id' => 43,],
            ['model_id' => 6,'model_field_id' => 103,'linkage_field_id' => 105,'linkage_action_id' => 43,],
            ['model_id' => 7,'model_field_id' => 124,'linkage_field_id' => 127,'linkage_action_id' => 6,],
            ['model_id' => 9,'model_field_id' => 161,'linkage_field_id' => 162,'linkage_action_id' => 43,],
            ['model_id' => 9,'model_field_id' => 163,'linkage_field_id' => 164,'linkage_action_id' => 65,],
            ['model_id' => 12,'model_field_id' => 223,'linkage_field_id' => 224,'linkage_action_id' => 23,],
        ];
        $this->table('model_form_linkage')->insert($data)->save();

    }

    public function down()
    {
        $this->table('app_config')->drop();
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
