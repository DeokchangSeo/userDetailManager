drop table if exists employer;

create table employer (
    id int not null auto_increment,
    name varchar(80) not null,
    industry varchar(80), 
    description text not null,
    PRIMARY KEY (id)   
) engine=innodb;

drop table if exists job;

create table job (
    id int not null auto_increment,
    employer int references employer(id),
    title varchar(80) not null,
    description text not null,
    location varchar(80) not null,
    salary int not null,
    epoch timestamp not null,
    duedate timestamp not null,
    PRIMARY KEY (id)
) engine=innodb;

drop table if exists employee;

create table employee (
	id int not null auto_increment,
	employer int references employer(id),
	username varchar(30) not null,
	password varchar(30) not null,
	email varchar(80) not null,
	firstname varchar(30) not null,
	lastname varchar(30) not null,
	category varchar(30),
	phoneno int not null,
	imagedata blob default "",
	imagename varchar(40) default "",
	imagetype varchar(40) default "",
	imagesize varchar(40) default "",
	PRIMARY KEY (username),
	UNIQUE KEY (id),
	KEY (password)
) engine=innodb;

drop table if exists application;

create table application (
    id int not null auto_increment,
    applicant int references employee(id),
	firstname varchar(30) not null,
	lastname varchar(30) not null,
	letter text not null,
	jobID int references job(id),
    epoch timestamp not null,
    PRIMARY KEY (id)
) engine=innodb;

insert into employer (id, name, description, industry)
values 
(1, 'Myer', 'Australia\'s largest department store chain','retail'),
(2, 'David Jones', 'Australia\'s most pretentious department store chain', 'retail');

insert into job (employer, title, location, description, salary, epoch, duedate)
values 
(1, 'CEO', 'Brisbane', 'Chief Elephant Orderer', 100000, '2012-05-23 17:11:02', '2012-07-15 12:30:00'),
(1, 'Sales assistant', 'Brisbane', 'Sales assistant in Menswear', 50000, '2012-05-23 17:29:42', '2012-08-15 12:30:00'),
(1, 'CIO', 'Sydney', 'He who makes the computer sytems work', 200000, '2012-05-23 17:47:05', '2012-09-15 12:30:00'),
(2, 'Night Guard', 'Brisbane', 'Protect properties', 90000, '2012-05-23 17:52:30', '2012-10-15 12:30:00'),
(2, 'Accountant', 'Melbourne', 'Does the books', 75000, '2012-05-23 17:59:30', '2012-11-15 12:30:00');

insert into employee (employer, username, password, email, firstname, lastname, category, phoneno, imagedata, imagename, imagetype, imagesize)
values 
(0, 'Chris', 'Ch/4uT7Lqgqis','deokchang.seo@griffithuni.edu.au', 'Deokchang', 'Seo', 'admin', '0123456789', '', '', '', '');

insert into application (applicant, jobID, firstname, lastname, letter, epoch)
values
('1', '1', 'Deokchang', 'Seo', 'I wanna work.', '2012-04-23 11:50:00');