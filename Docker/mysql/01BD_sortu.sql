-- Ez da datu-basea sortu behar, Docker Compose-k sortzen du
-- CREATE DATABASE `daw` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `daw`;

-- Taulak sortzen ditugu
CREATE TABLE `daw`.`denda` (
`kodea` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`izena` VARCHAR( 100 ) NOT NULL ,
`tlf` VARCHAR( 13 ) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE `daw`.`produktu` (
`kodea` VARCHAR( 12 ) NOT NULL ,
`izena` VARCHAR( 200 ) NULL ,
`izen_laburra` VARCHAR( 50 ) NOT NULL ,
`deskribapena` TEXT NULL ,
`prezioa` DECIMAL( 10, 2 ) NOT NULL ,
`familia` VARCHAR( 6 ) NOT NULL ,
PRIMARY KEY ( `kodea` ) ,
INDEX ( `familia` ) ,
UNIQUE ( `izen_laburra` )
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE `daw`.`familia` (
`kodea` VARCHAR( 6 ) NOT NULL ,
`izena` VARCHAR( 200 ) NOT NULL ,
PRIMARY KEY ( `kodea` )
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE `daw`.`stock` (
`produktu` VARCHAR( 12 ) NOT NULL ,
`denda` INT NOT NULL ,
`kopurua` INT NOT NULL ,
PRIMARY KEY ( `produktu` , `denda` )
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_spanish_ci;

-- Gako atzerritarrak sortzen ditugu
ALTER TABLE `produktu`
ADD CONSTRAINT `produktu_ibfk_1`
FOREIGN KEY (`familia`) REFERENCES `familia` (`kodea`)
ON UPDATE CASCADE;

ALTER TABLE `stock`
ADD CONSTRAINT `stock_ibfk_2` 
FOREIGN KEY (`denda`) REFERENCES `denda` (`kodea`)
ON UPDATE CASCADE,
ADD CONSTRAINT `stock_ibfk_1` 
FOREIGN KEY (`produktu`) REFERENCES `produktu` (`kodea`)
ON UPDATE CASCADE;