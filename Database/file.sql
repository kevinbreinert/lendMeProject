BEGIN;
create table users(
    user_id int auto_increment primary key ,
    username varchar(30) unique,
    pass varchar(150),
    create_date timestamp,
    plz int,
    ort varchar(20),
    stadtteil varchar(30),
    account_picture blob
);

create table categories(
    ctg_id int auto_increment primary key,
    ctg_value varchar(50) unique,
    ctg_name varchar(40) unique
);

create table available(
    av_id int auto_increment primary key,
    av_message varchar(40) unique ,
    av_color varchar(20),
    av_background varchar(40)
);

create table items(
    fk_user_id int,
    item_name varchar(20),
    fk_ctg_id int,
    fk_av_id int,
    item_picture blob,
    create_date timestamp,
    begin_date date null,
    end_date date null,
    primary key (fk_user_id, item_name),
    foreign key (fk_user_id) references users(user_id),
    foreign key (fk_ctg_id) references categories(ctg_id),
    foreign key (fk_av_id) references available(av_id)
);

ROLLBACK;