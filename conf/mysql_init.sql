-- 新闻表
CREATE TABLE news (
    id int(11) NOT NULL AUTO_INCREMENT,
    title varchar(128) NOT NULL COMMENT '新闻标题',
    slug varchar(128) NOT NULL COMMENT '固定链接地址',
    text text NOT NULL COMMENT '正文',
    PRIMARY KEY (id),
    KEY slug (slug)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
insert into news(title, slug, text) values('今日头条', 'slug', 'TrueDepth系统引领智能手机设计风潮，"刘海"今年将全面流行');
-- db操作测试表
CREATE TABLE ci_db_test (
    id int(11) NOT NULL AUTO_INCREMENT,
    title varchar(128) NOT NULL COMMENT '抬头',
    name varchar(128) NOT NULL COMMENT '姓名',
    registerDate datetime NOT NULL DEFAULT NOW() COMMENT '注册时间',
    PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;