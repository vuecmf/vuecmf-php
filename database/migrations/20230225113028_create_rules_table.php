<?php

use think\migration\Migrator;
use Phinx\Db\Adapter\AdapterFactory;

class CreateRulesTable extends Migrator
{
    /**
     * Initialize method.
     *
     * @return void
     */
    protected function init()
    {
        $options = $this->getDbConfig();

        $adapter = AdapterFactory::instance()->getAdapter($options['adapter'], $options);

        if ($adapter->hasOption('table_prefix') || $adapter->hasOption('table_suffix')) {
            $adapter = AdapterFactory::instance()->getWrapper('prefix', $adapter);
        }

        $this->setAdapter( $adapter);
    }

    /**
     * 获取数据库配置
     * @return array
     */
    protected function getDbConfig(): array
    {
        $default = config('tauthz.database.connection') ?: config('database.default');

        $config = config("database.connections.{$default}");

        if (0 == $config['deploy']) {
            $dbConfig = [
                'adapter'      => $config['type'],
                'host'         => $config['hostname'],
                'name'         => $config['database'],
                'user'         => $config['username'],
                'pass'         => $config['password'],
                'port'         => $config['hostport'],
                'charset'      => $config['charset'],
                'table_prefix' => $config['prefix'],
            ];
        } else {
            $dbConfig = [
                'adapter'      => explode(',', $config['type'])[0],
                'host'         => explode(',', $config['hostname'])[0],
                'name'         => explode(',', $config['database'])[0],
                'user'         => explode(',', $config['username'])[0],
                'pass'         => explode(',', $config['password'])[0],
                'port'         => explode(',', $config['hostport'])[0],
                'charset'      => explode(',', $config['charset'])[0],
                'table_prefix' => explode(',', $config['prefix'])[0],
            ];
        }

        $table = config('database.migration_table', 'migrations');

        $dbConfig['default_migration_table'] = $dbConfig['table_prefix'] . $table;

        return $dbConfig;
    }

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
     */
    public function up()
    {
        $default = config('tauthz.default');
        $table = $this->table(config('tauthz.enforcers.'.$default.'.database.rules_name'), ['id' => true,  'comment'=>'系统--授权规则表']);
        $table->addColumn('ptype', 'string', ['length' => 4,'null' => false,'default' => '', 'comment'=>'类型：g=组或角色，p=策略'])
            ->addColumn('v0', 'string', ['length' => 64, 'null' => false, 'default' => '', 'comment' => '对应定义的sub(用户名或角色名)'])
            ->addColumn('v1', 'string', ['length' => 64, 'null' => false, 'default' => '', 'comment' => '对应定义的dom(角色或应用名)'])
            ->addColumn('v2', 'string', ['length' => 64, 'null' => false, 'default' => '', 'comment' => '对应定义的obj(应用名或控制器名)'])
            ->addColumn('v3', 'string', ['length' => 64, 'null' => false, 'default' => '', 'comment' => '对应定义的act(动作名称)'])
            ->addColumn('v4', 'string', ['length' => 64, 'null' => false, 'default' => '', 'comment' => '预留，暂用不到'])
            ->addColumn('v5', 'string', ['length' => 64, 'null' => false, 'default' => '', 'comment' => '预留，暂用不到'])
            ->addColumn('v6', 'string', ['length' => 64, 'null' => false, 'default' => '', 'comment' => '预留，暂用不到'])
            ->addColumn('v7', 'string', ['length' => 64, 'null' => false, 'default' => '', 'comment' => '预留，暂用不到'])
            ->addIndex(['ptype','v0','v1','v2','v3','v4','v5','v6','v7'], ['unique' => true])
            ->create();
    }

    public function down()
    {
        $default = config('tauthz.default');
        $table = $this->table(config('tauthz.enforcers.'.$default.'.database.rules_name'));
        $table->drop();
    }
}
