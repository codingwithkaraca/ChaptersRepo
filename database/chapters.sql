create table chapters
(
    id            int          not null
        primary key,
    chapter_title varchar(255) null,
    author_name   varchar(255) null,
    book_name     varchar(255) null,
    edition       varchar(255) null,
    pub_date      int          null,
    imprint       varchar(255) null,
    pages         int          null,
    ebook_isbn    varchar(100) null,
    sdg           varchar(100) not null,
    abstract      text         null,
    url           varchar(255) null,
    cover_img     varchar(100) null,
    pdf           varchar(100) null
);

create table users
(
    Id       int auto_increment
        primary key,
    tckno    varchar(11)  not null,
    name     varchar(100) not null,
    surname  varchar(100) not null,
    email    varchar(255) not null,
    dep_id   int          not null,
    kvkk     tinyint(1)   not null,
    ll_ip    varchar(45)  null,
    ll_time  int          null,
    password varchar(255) not null,
    constraint email
        unique (email),
    constraint tckno
        unique (tckno)
);


