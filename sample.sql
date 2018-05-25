CREATE DATABASE users;

create table counter (
    id int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    account varchar(100) UNIQUE not null,
    count int default 0 not null
);

INSERT INTO count (account, count) VALUES ('hash', 0);

CREATE TABLE `users` (
  `id` int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `account` varchar(100) UNIQUE NOT NULL,
  `password` varchar(100) NOT NULL
);

INSERT INTO users (account, password) VALUES ('admin', 123456);
