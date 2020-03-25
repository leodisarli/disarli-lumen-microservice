# create databases
CREATE DATABASE IF NOT EXISTS `back`;

# create root user and grant rights
GRANT ALL ON *.* TO 'root'@'%';
