CREATE TABLE final
(
	id INT NOT NULL AUTO_INCREMENT,
	username varchar(255) NOT NULL,
	beer varchar (255) NOT NULL,
	brewery varchar (255) NOT NULL,
	style varchar (255) NOT NULL,
	grade int NOT NULL,
	notes text NOT NULL,
	share int NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE users
(
	id int NOT NULL AUTO_INCREMENT,
	username varchar(255) NOT NULL,
	password varchar (255) NOT NULL,
	PRIMARY KEY (id)
)


SELECT username, beer, brewery, style, grade, notes, share 
FROM final
WHERE share = 1;