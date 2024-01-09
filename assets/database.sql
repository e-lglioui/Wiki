create database wiki;

/*table users*/
CREATE TABLE users(
    id_user INT PRIMARY KEY AUTO_INCREMENT,
    nom varchar(225),
    email varchar(225),
    password varchar(225),
    id_role INT,
    FOREIGN KEY (id_role) REFERENCES rol (id)
)ENGINE=InnoDB;

/*table rol*/
CREATE table rol(
id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
 rol varchar(250),
)ENGINE=InnoDB;
/*table wiki*/

CREATE TABLE wiki(
    id_wiki INT PRIMARY KEY AUTO_INCREMENT,
    titre varchar(225),
    contenu varchar(225),
    datecreation date,
    id_categorie INT,
    id_users INT,
    FOREIGN KEY (id_categorie) REFERENCES categorie (id),
    FOREIGN KEY (id_users) REFERENCES users (id_user)
)ENGINE=InnoDB;

/*table categorie*/

CREATE TABLE categorie(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom varchar(225),
    discription varchar(225),
)ENGINE=InnoDB;

/*table tag*/

CREATE TABLE tag(
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre varchar(225),
)ENGINE=InnoDB;

/*table tagwiki*/
create table tagwiki(
id_wiki INT,
FOREIGN KEY (id_wiki) REFERENCES wiki (id_wiki),
id_tag INT,
FOREIGN KEY (id_tag) REFERENCES tag (id),
)ENGINE=InnoDB;