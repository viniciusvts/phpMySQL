CREATE DATABASE loja1;
USE loja1;
CREATE TABLE produto (
    id MEDIUMINT NOT NULL AUTO_INCREMENT,
    nome varchar(255) NOT NULL,
    valor FLOAT(10,2) NOT NULL,
    PRIMARY KEY (id)
);