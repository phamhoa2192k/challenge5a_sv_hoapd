create database challenge5;

use challenge5;

create table file(
	id int AUTO_INCREMENT primary key,
	filename varchar(255) not null,
	filepath varchar(255) not null
);

create table user (
	username varchar(255) not null primary key,
	password varchar(255) not null,
	fullname varchar(255),
	email varchar(255),
	phonenumber varchar(255),
	role varchar(50) not null,
	avatar int,
	foreign key (avatar) references file(id)
);

INSERT INTO `user` (`username`, `password`, `fullname`, `email`, `phonenumber`, `role`, `avatar`) VALUES ('teacher1', '123456a@A', 'Teacher 1', 'teacher@vsc.com', '0123456789', 'teacher', NULL);
INSERT INTO `user` (`username`, `password`, `fullname`, `email`, `phonenumber`, `role`, `avatar`) VALUES ('teacher2', '123456a@A', 'Teacher 2', 'teacher2@vcs.com', '0123456789', 'teacher', NULL);
INSERT INTO `user` (`username`, `password`, `fullname`, `email`, `phonenumber`, `role`, `avatar`) VALUES ('student1', '123456a@A', 'Student 1', 'student1@vcs.com', '0123456789', 'student', NULL), ('student2', '123456a@A', 'Student 2', 'student2@vcs.com', '0123456789', 'student', NULL);
create table message(
	id int AUTO_INCREMENT primary key,
	sender_username varchar(255) foreign key references user(username) not null,
	recipient_username varchar(255) foreign key references user(username) not null,
	content longtext
);
