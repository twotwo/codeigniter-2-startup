CREATE TABLE news (
    id int(11) NOT NULL AUTO_INCREMENT,
    title varchar(128) NOT NULL,
    slug varchar(128) NOT NULL,
    text text NOT NULL,
    PRIMARY KEY (id),
    KEY slug (slug)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
insert into news(title, slug, text) values('今日头条', 'slug', 'TrueDepth系统引领智能手机设计风潮，"刘海"今年将全面流行');