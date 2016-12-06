create database hogehoge;

grant all on signin_php.* to dbuser@localhost identified by 'hogehogehoge';

use signin_php;

create table users (
  id int not null auto_increment primary key,
  name varchar(255) NOT NULL,
  email varchar(255) unique,
  password varchar(255),
  lawyer boolean default 0,
  condition_flag boolean,
  created datetime,
  modified datetime
);

desc users;
select * from users;

drop database hogehoge;