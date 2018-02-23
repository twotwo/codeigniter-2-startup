# CodeIgniter v2.2.3 练手

## 安装

### [下载地址](https://github.com/bcit-ci/CodeIgniter/releases)

## 运行

### 配置
* conf/nginx.conf

### 访问
http://ci-dev.com/

## Tutorials
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