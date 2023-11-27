CREATE TABLE user if not exists (
	id INT PRIMARY KEY AUTO_INCREMENT,
	firstName VARCHAR(50),
	lastName VARCHAR(50),
	email VARCHAR(50),
	password VARCHAR(50),
	confirmPassword VARCHAR(50)

);

CREATE TABLE produit if not exists (
	id INT PRIMARY KEY AUTO_INCREMENT,
	nom VARCHAR(50),
	description VARCHAR(50),
	id_category INT,
	FOREIGN KEY (id_category) REFERENCES category(id)
);

CREATE TABLE category if not exists(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nom VARCHAR(50),
);



CREATE TABLE blog if not exists (
	id INT PRIMARY KEY AUTO_INCREMENT,
	nom VARCHAR(50),
	description VARCHAR(50),
	id_user INT,
	FOREIGN KEY (id_user) REFERENCES user(id)	
);


