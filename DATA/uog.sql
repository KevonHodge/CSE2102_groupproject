
CD C:\wamp64\bin\mysql\mysql5.7.21\bin
mysq -u root -h 127.0.0.1 -p

show databases;

use uog;


CREATE TABLE IF NOT EXISTS `faculty` (
  `FID` int(2) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(30) NOT NULL,
  `TELEPHONENO.` varchar(15) NOT NULL,
 
`DEPARTMENT` varchar(45) NOT NULL,
  PRIMARY KEY (`FID`)
); 


CREATE TABLE IF NOT EXISTS `rooms` (
  `RID` int(7) NOT NULL AUTO_INCREMENT,
  `ROOMNO.` varchar(4) NOT NULL,
 `NUMBERofSEATS` int(3) NOT NULL,
 
 `ROOMDESCRIPTION` text NOT NULL,
  PRIMARY KEY (`RID`)
); 


CREATE TABLE IF NOT EXISTS `schedule` (
  `COURSE` varchar(30) NOT NULL,
  `SID` int(5) NOT NULL AUTO_INCREMENT,
  `TIME` datetime(6) NOT NULL,
 
 `DATE` datetime(6) NOT NULL,
  PRIMARY KEY (`SID`)
); 
