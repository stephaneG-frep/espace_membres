CREATE DATABASE menbres;

CREATE TABLE table_menbres(
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password TEXT NOT NULL,
    role INT(10) NOT NULL,
    token VARCHAR(20) NOT NULL,
    validation INT(1) NOT NULL
);

CREATE TABLE recup_password(
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    token VARCHAR(20) NOT NULL
);

CREATE TABLE article(
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    titre varchar(255) NOT NULL,
    contenu TEXT NOT NULL,
    date_creation DATETIME NOT NULL
);

CREATE TABLE admin(
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    role INT(10) NOT NULL,
    libelle VARCHAR(255) NOT NULL
);
