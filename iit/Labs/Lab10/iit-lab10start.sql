-- create the tables for our movies

CREATE TABLE `movies` (
 `movieid` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `title` varchar(100) NOT NULL,
 `year` char(4) DEFAULT NULL,
 PRIMARY KEY (`movieid`)
);


-- insert data into the tables

INSERT INTO movies VALUES
  (1, "Elizabeth", "1998"),
  (2, "Elling", "2001"),
  (3, "Oh Brother Where Art Thou?", "2000"),
  (4, "The Lord of the Rings: The Fellowship of the Ring", "2001"),
  (5, "Up in the Air", "2009");


CREATE TABLE `actors` (
 `actorid` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `first_names` varchar(100) NOT NULL,
 `last_name` varchar(100) NOT NULL,
 `dob` varchar(10) NOT NULL,
 PRIMARY KEY (`actorid`)
);

INSERT INTO actors VALUES
  (1, "Aj", "Pai", "2003-07-31"),
  (2, "John", "Jackson", "2003-03-31"),
  (3, "Jack", "Johnson", "2003-06-31"),
  (4, "Danny", "Dev", "2003-07-23"),
  (5, "Paul", "Walker", "2003-07-11");

CREATE TABLE `relationship` (
 `record` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `actorid` int(10) unsigned NOT NULL,
 `movieid` int(10) unsigned NOT NULL,
 PRIMARY KEY (`record`)
);

INSERT INTO relationship VALUES
  (1, 1, 1),
  (2, 1, 2),
  (3, 3, 1),
  (4, 2, 6),
  (5, 5, 1);
