CREATE DATABASE IF NOT EXISTS regerstration; 

USE regerstration;

CREATE TABLE users (
    id int(11) AUTO_INCREMENT,
    username varchar(100),
    email datatype,
    admin int(11),
    password varchar(100),
); 