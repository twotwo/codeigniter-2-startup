# CodeIgniter v2.2.3 练手

## 1. 安装

### [下载地址](https://github.com/bcit-ci/CodeIgniter/releases)

## 2. 运行

### 2.1 配置Nginx
 * 配置文件: conf/nginx.conf
 * 访问地址: http://ci-dev.com/

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

### 2.4 [错误处理](http://codeigniter.org.cn/user_guide/general/errors.html)
 * 

## 3. 代码上手教程
http://ci-dev.com/news/latest/10

### [加载静态内容](http://codeigniter.org.cn/user_guide/tutorial/static_pages.html)

路由配置： application/config/routes.php

访问：

http://ci-dev.com/index.php/[controller-class]/[controller-method]/[arguments]

http://ci-dev.com/pages/view/home
http://ci-dev.com/pages/view/about

### [读取新闻条目](http://codeigniter.org.cn/user_guide/tutorial/news_section.html)
* 初始化数据库: source conf/mysql_init.sql
* 数据库配置: dbdriver要设置成mysqli
* 显示数据: http://ci-dev.com/news

### [创建新闻条目](http://codeigniter.org.cn/user_guide/tutorial/create_news_items.html)

http://ci-dev.com/index.php/news/create

### [以 CLI 方式运行](http://codeigniter.org.cn/user_guide/general/cli.html)
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

## 4. 通用主题
### [移除 URL 中的 index.php](http://codeigniter.org.cn/user_guide/general/urls.html)
* [Removing /index.php on Nginx](https://laracasts.com/discuss/channels/general-discussion/remving-indexphp-completely)
* [Nginx的try_files指令使用实例](https://www.hi-linux.com/posts/53878.html)


```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

### [控制器](http://codeigniter.org.cn/user_guide/general/controllers.html)
* 继承 CI_Controller
* 通过 URI 分段向方法传递参数：[controller-class]/[controller-method]/[arguments]

### [保留名称](http://codeigniter.org.cn/user_guide/general/reserved_names.html)
* 控制器名称
* 函数
* 变量
* 常量

### [视图](http://codeigniter.org.cn/user_guide/general/views.html)
* 视图其实就是一个 Web 页面，或者页面的一部分
* 视图必须通过 控制器 来加载
* 使用循环

### [URI 路由](http://codeigniter.org.cn/user_guide/general/routing.html)
* 设置路由规则: `application/config/routes.php`
* 通配符: `$route['product/(:num)'] = 'catalog/product_lookup_by_id/$1';`
* 正则表达式
* 回调函数
* 使用 HTTP 动词

### [模型](http://codeigniter.org.cn/user_guide/general/models.html) 
模型是专门用来和数据库打交道的 PHP 类

* 加载模型: `$this->load->model('model_name');`
* 自动加载: `application/config/autoload.php`
* 连接数据库: `$config['dbdriver'] = 'mysqli';`
* 

### [辅助函数](http://codeigniter.org.cn/user_guide/general/helpers.html) 
* 加载辅助函数 `$this->load->helper('name');`
* 扩展辅助函数 `application/helpers/MY_array_helper.php` 在原有辅助函数中增加几个方法

### [CI类库](http://codeigniter.org.cn/user_guide/general/libraries.html) 
* 加载类库 `$this->load->library('class_name');`
* 加载多个类库 `$this->load->library(array('email', 'table'));`
* 创建自有类库 //以后再说

### [公共函数](http://codeigniter.org.cn/user_guide/general/common_functions.html) 
CI中定义了一些全局的函数，可以直接使用

## 5. 类库、数据库及辅助函数
### [Libraries](http://codeigniter.org.cn/user_guide/libraries/index.html)

### [Database](http://codeigniter.org.cn/user_guide/database/index.html)

### [Helpers](http://codeigniter.org.cn/user_guide/helpers/index.html)