CREATE TABLE news
(
id int NOT NULL AUTO_INCREMENT,
put_up DATETIME,
take_down DATETIME,
subject char(140),
information text,
PRIMARY KEY(id)
);
