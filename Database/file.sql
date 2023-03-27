BEGIN;
create table users(
    user_id int auto_increment primary key ,
    username varchar(30) unique,
    pass varchar(150),
    create_date timestamp,
    account_picture blob
);


create table categories(
    ctg_id int auto_increment primary key,
    ctg_value varchar(50) unique,
    ctg_name varchar(40) unique
);
ROLLBACK;