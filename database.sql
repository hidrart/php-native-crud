create database mahasiswa_db;
use mahasiswa_db;
 
CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL auto_increment,
  `first_name` varchar(255),
  `last_name` varchar(255),
  `email` varchar(255),
  `gender` varchar(255),
  PRIMARY KEY  (`id`)
);