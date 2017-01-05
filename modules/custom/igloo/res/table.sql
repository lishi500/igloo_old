create table stream_setting(
	id int(16) not null primary key auto_increment,
    URL varchar(128) not null,
    title varchar(256),
    description text,
    start_time timestamp,
    category varchar(64)
);
