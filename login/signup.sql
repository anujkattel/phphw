use anujphp;
create table signup(
    id int primary key auto_increment,
    name varchar(100) not null,
    email varchar(100) not null,
    phone varchar(100) not null,
    password varchar(100) not null,
    created_at timestamp default current_timestamp
);