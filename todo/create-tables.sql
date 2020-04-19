CREATE TABLE todo (
username VARCHAR(40),
task_id INT AUTO_INCREMENT,
task_desc VARCHAR(100),
due_date DATE,
priority VARCHAR(10),
PRIMARY KEY(task_id));

CREATE TABLE favorites (
username VARCHAR(40),
fav_id INT AUTO_INCREMENT,
name VARCHAR(50),
link VARCHAR(100),
PRIMARY KEY(fav_id));

CREATE TABLE users (
username VARCHAR(40),
password VARCHAR(200),
PRIMARY KEY(username));