create table count (
    id int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    account varchar(100) not null,
    count int default 0 not null
);

insert into count (account, count) values ('hash', 0);
