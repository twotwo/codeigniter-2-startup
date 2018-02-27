# CodeIgniter v2.2.3 练手
[参考](http://wiki.li3huo.com/CodeIgniter)

## 1. 安装

### [下载地址](https://github.com/bcit-ci/CodeIgniter/releases)

## 2. 运行

### 2.1 配置Nginx
 * 配置文件: conf/nginx.conf
 * 访问地址: http://ci-dev.com/

#### [移除 URL 中的 index.php](http://codeigniter.org.cn/user_guide/general/urls.html)
* [Removing /index.php on Nginx](https://laracasts.com/discuss/channels/general-discussion/remving-indexphp-completely)
* [Nginx的try_files指令使用实例](https://www.hi-linux.com/posts/53878.html)


```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

### 2.2 [配置多环境](http://codeigniter.org.cn/user_guide/general/environments.html) 开发环境/生产环境
当系统运行在开发环境或生产环境中时能有不同的行为

ENVIRONMENT 常量

 * 处理逻辑 `index.php` line 21, v2版本需要改写成`define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');`
 * 设置 `conf/nginx.conf` line 27

对默认框架行为的影响

 * 错误报告
 * [配置文件](http://codeigniter.org.cn/user_guide/libraries/config.html)
  - 特定环境的配置文件，新建或复制一个配置文件到 application/config/{ENVIRONMENT}/{FILENAME}.php

### 2.3 [性能分析](http://codeigniter.org.cn/user_guide/general/profiling.html)
 * `controllers/Pages.php` line 11, 启用分析器

### 2.4 [日志](http://codeigniter.org.cn/user_guide/general/errors.html)
 * 日志目录 `application/logs`
 * `application/config/config.php` line 185 $config['log_threshold']
 * log_message($level, $message) $level (string) -- Log level: 'error', 'debug' or 'info'
 * `controllers/Pages.php` line 25

## 3. 代码上手教程
http://ci-dev.com/news/

### 3.1 [加载静态内容](http://codeigniter.org.cn/user_guide/tutorial/static_pages.html)

路由配置： application/config/routes.php

访问：

http://ci-dev.com/index.php/[controller-class]/[controller-method]/[arguments]

http://ci-dev.com/pages/view/home
http://ci-dev.com/pages/view/about

### 3.2 [读取新闻条目](http://codeigniter.org.cn/user_guide/tutorial/news_section.html)
 * 初始化数据库: source conf/mysql_init.sql
 * 数据库配置: dbdriver要设置成mysqli
 * 显示数据: http://ci-dev.com/news

### 3.3 [创建新闻条目](http://codeigniter.org.cn/user_guide/tutorial/create_news_items.html)

http://ci-dev.com/index.php/news/create

以下内容是我认为一个上手一个框架必须包含的功能

### 3.4 [以 CLI 方式运行](http://codeigniter.org.cn/user_guide/general/cli.html)
为在命令行下运行单元测试做准备

```bash
➜  codeigniter-2-startup git:(master) ✗ php index.php news
<html>
    <head>
        <title>CodeIgniter 2 Tutorial</title>
    </head>
    <body>

        <h1>News archive</h1><h2>News archive</h2>
...
```

### 3.5 [单元测试](http://codeigniter.org.cn/user_guide/libraries/unit_testing.html)
CodeIgniter 的单元测试类非常简单，由一个测试方法和两个显示结果的方法组成。 它没打算成为一个完整的测试套件，只是提供一个简单的机制来测试你的代码是否 生成了正确的数据类型和结果。

在 `application/controllers/News.php` 中引入单元测试

在链接中直接调用：http://ci-dev.com/news/test

#### 定制测试报告命令行输出cli_report()
 * [codeigniter-cli_unit_test](https://github.com/ashiina/codeigniter-cli_unit_test)
 * [扩展原生类库](http://codeigniter.org.cn/user_guide/general/creating_libraries.html)
 * `application/libraries/MY_Unit_test.php`

```bash
➜  codeigniter-2-startup git:(master) ✗ php index.php news test
[Test results] : /opt/local/ide/git_storage/github/codeigniter-2-startup/application/controllers/news.php
Test Name                                                    	 Test Datatype        	 Expected Datatype    	 Result 	 Notes                
get news                                                     	 Array                	 Array                	 Passed
```

## 4. 通用主题

### 4.1 [保留名称](http://codeigniter.org.cn/user_guide/general/reserved_names.html)
 * 控制器名称
 * 函数
 * 变量
 * 常量

### 4.2 [控制器](http://codeigniter.org.cn/user_guide/general/controllers.html)
 * 继承 CI_Controller
 * 通过 URI 分段向方法传递参数：[controller-class]/[controller-method]/[arguments]

### 4.3 [视图](http://codeigniter.org.cn/user_guide/general/views.html)
 * 视图其实就是一个 Web 页面，或者页面的一部分
 * 视图必须通过 控制器 来加载
 * 使用循环

### 4.4 [URI 路由](http://codeigniter.org.cn/user_guide/general/routing.html)
 * 设置路由规则: `application/config/routes.php`
 * 通配符: `$route['product/(:num)'] = 'catalog/product_lookup_by_id/$1';`
 * 正则表达式
 * 回调函数
 * 使用 HTTP 动词

### 4.5 [模型](http://codeigniter.org.cn/user_guide/general/models.html) 
模型是专门用来和数据库打交道的 PHP 类

 * 加载模型: `$this->load->model('model_name');`
 * 自动加载: `application/config/autoload.php`
 * 连接数据库: `$config['dbdriver'] = 'mysqli';`
 * 

### 4.6 [辅助函数](http://codeigniter.org.cn/user_guide/general/helpers.html) 
 * 加载辅助函数 `$this->load->helper('name');`
 * 扩展辅助函数 `application/helpers/MY_array_helper.php` 在原有辅助函数中增加几个方法

### 4.7 [CI类库](http://codeigniter.org.cn/user_guide/general/libraries.html) 
 * 加载类库 `$this->load->library('class_name');`
 * 加载多个类库 `$this->load->library(array('email', 'table'));`
 * 创建自有类库 //以后再说

### 4.8 [公共函数](http://codeigniter.org.cn/user_guide/general/common_functions.html) 
CI中定义了一些全局的函数，可以直接使用

## 5. 数据库、类库及辅助函数
### 5.1 Database
 * [数据库参考](http://codeigniter.org.cn/user_guide/database/index.html)
 * [数据库类用户指南](http://codeigniter.org.cn/userguide2/database/index.html)

#### 5.1.1 [数据库快速入门](http://codeigniter.org.cn/user_guide/database/examples.html)
 * [配置数据库](http://codeigniter.org.cn/user_guide/database/configuration.html) `application/config/database.php`
 * [连接数据库](http://codeigniter.org.cn/user_guide/database/connecting.html) `application/models/New_model.php` line 5, $this->load->database();
 * 多结果标准查询（数组形式）`application/controllers/News.php` line 51 `foreach ($data['news'] as $row)`
 * SQL标准插入 `application/controllers/News.php` _test_db_insert()
 * 运行单元测试 `php index.php news test`

#### 5.1.2 [基于访问页面的数据库查询缓存](http://codeigniter.org.cn/user_guide/database/caching.html)
数据库缓存类允许你把数据库查询结果保存在文本文件中以减少数据库访问

启用缓存需要三步

 1. 在服务器上创建一个可写的目录以便保存缓存文件；
 2. 通过文件 application/config/database.php 中的 cachedir 参数设置其目录路径；
 3. 通过将文件 application/config/database.php 中的 cache_on 参数设置为 TRUE， 也可以用下面的方法手动配置

缓存文件不会过期，那么你的应用程序中应该有删除缓存的机制 `$this->db->cache_delete()`

### 5.2 [Libraries](http://codeigniter.org.cn/user_guide/libraries/index.html)

#### 5.2.1 缓存
使用[MP_Cache](https://github.com/bcit-ci/CodeIgniter/wiki/MP-Cache:-Simple-flexible-Caching-of-parts-of-code)

 * 在Controller中加载: `$this->load->library('MP_cache');`
 * 在Model中使用



### 5.3 [Helpers](http://codeigniter.org.cn/user_guide/helpers/index.html)