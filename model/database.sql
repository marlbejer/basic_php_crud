create database company;

use company;
create table  employees (
	id int(11) auto_increment primary key,
	fullname varchar(50) not null,
	position varchar(50) not null
);