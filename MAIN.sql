CREATE DATABASE acordes;
USE acordes;

CREATE USER 'expo'@'localhost' IDENTIFIED BY '2015';
GRANT ALL PRIVILEGES ON `acordes`. * TO 'expo'@'localhost';
FLUSH PRIVILEGES;