create table class
(
	class_id int auto_increment
		primary key,
	class_name varchar(20) null
)
;

create table users
(
	user_id int auto_increment
		primary key,
	username varchar(50) not null,
	password varchar(255) not null,
	role varchar(20) not null,
	created datetime null,
	modified datetime null,
	email varchar(50) null,
	user_school varchar(20) not null,
	user_year_level int not null,
	user_first_name varchar(20) not null,
	user_surname varchar(20) not null

)
;

create table user_class
(
	user_id int not null,
	class_id int not null,
	primary key (user_id, class_id),
	constraint user_class_users_id_fk
		foreign key (user_id) references users (id),
	constraint user_class_class_class_id_fk
		foreign key (class_id) references class (class_id)
)
;

create index user_class_class_class_id_fk
	on user_class (class_id)
;

create table viewsrecorded
(
  data datetime not null,
  page_views int default 1

)
;



create table editterms
(
  terms_id int not null auto_increment,
  content varchar

)
;



