#欢迎使用VueCMF

VueCMF内容管理快速开发框架v2(后端API)


## VueCMF是什么？
VueCMF是一款完全开源免费的内容管理快速开发框架。采用前后端分离模式搭建，2.0+版本前端使用vue3、Element Plus和TypeScript构建，后端API基于ThinkPHP6开发。可用于快速开发CMS、CRM、WMS、OMS、ERP等管理系统，开发简单、高效易用，极大减少系统的开发周期和研发成本！甚至不用写一行代码使用VueCMF就能设计出功能强大的后台管理系统。

VueCMF开发框架主要有以下功能：

 + 系统授权（管理员、角色、权限）
 + 模型配置（字段、索引、动作、表单）
 + 菜单配置


## 环境要求
* Apache/Nginx
* MySQL >= 5.7
* PHP >= 7.2.5


注意：**以下操作均在命令行中执行**

## 安装

创建新项目

~~~
composer create-project emei8/vuecmf myproject
~~~

若在已有基于thinkphp6的项目中安装, 则需执行下面
~~~
composer require emei8/framework

php think vuecmf:publish
~~~

## 初始化数据

修改.env文件中数据库连接配置（已设置则跳过）

然后执行迁移工具

```
php think migrate:run
```

## 更新框架
~~~
composer update emei8/framework
~~~


## 使用文档

+ [使用手册(http://www.vuecmf.com)](http://www.vuecmf.com/) 

