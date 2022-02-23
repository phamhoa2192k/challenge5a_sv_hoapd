create database challenge5;

use challenge5;

create table user (
	username varchar(255) not null primary key,
	password varchar(255) not null,
	fullname varchar(255),
	email varchar(255),
	phonenumber varchar(255),
	role varchar(50) not null,
	avatar int foreign key references file(id)
);

create table message(
	id int AUTO_INCREMENT primary key,
	sender_username varchar(255) foreign key references user(username) not null,
	recipient_username varchar(255) foreign key references user(username) not null,
	content longtext
);

create table homework(
	title varchar,
	attachment longtext,

)

create table file(
	id int AUTO_INCREMENT primary key,
	filename varchar(255) not null,
	filepath varchar(255) not null,
)