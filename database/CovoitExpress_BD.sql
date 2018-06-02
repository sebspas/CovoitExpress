-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema covoitexpress
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema covoitexpress
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `covoitexpress` DEFAULT CHARACTER SET utf8 ;
USE `covoitexpress` ;

-- -----------------------------------------------------
-- Table `covoitexpress`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `covoitexpress`.`user` (
  `iduser` INT NOT NULL AUTO_INCREMENT,
  `pseudo` VARCHAR(255) NULL,
  `password` VARCHAR(255) NULL,
  `mail` VARCHAR(255) NULL,
  `phone` VARCHAR(60) NULL,
  `city` VARCHAR(255) NULL,
  `money` FLOAT NULL DEFAULT 0,
  `img` VARCHAR(255) NULL DEFAULT 'avatar.png',
  PRIMARY KEY (`iduser`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `covoitexpress`.`vehicle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `covoitexpress`.`vehicle` (
  `idvehicle` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,
  `img` VARCHAR(255) NULL,
  `capacity` INT NULL,
  PRIMARY KEY (`idvehicle`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `covoitexpress`.`travel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `covoitexpress`.`travel` (
  `idtravel` INT NOT NULL AUTO_INCREMENT,
  `startcity` VARCHAR(255) NULL,
  `endcity` VARCHAR(255) NULL,
  `starttime` INT NULL,
  `endtime` INT NULL,
  `price` FLOAT NULL DEFAULT 0,
  `places` INT NULL,
  `idowner` INT NOT NULL,
  `idvehicle` INT NOT NULL,
  PRIMARY KEY (`idtravel`),
  INDEX `fk_travel_user_idx` (`idowner` ASC),
  INDEX `fk_travel_vehicle1_idx` (`idvehicle` ASC),
  CONSTRAINT `fk_travel_user`
    FOREIGN KEY (`idowner`)
    REFERENCES `covoitexpress`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_travel_vehicle1`
    FOREIGN KEY (`idvehicle`)
    REFERENCES `covoitexpress`.`vehicle` (`idvehicle`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `covoitexpress`.`passengers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `covoitexpress`.`passengers` (
  `idtravel` INT NOT NULL,
  `iduser` INT NOT NULL,
  `nbplaces` INT NULL DEFAULT 1,
  PRIMARY KEY (`idtravel`, `iduser`),
  INDEX `fk_travel_has_user_user1_idx` (`iduser` ASC),
  INDEX `fk_travel_has_user_travel1_idx` (`idtravel` ASC),
  CONSTRAINT `fk_travel_has_user_travel1`
    FOREIGN KEY (`idtravel`)
    REFERENCES `covoitexpress`.`travel` (`idtravel`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_travel_has_user_user1`
    FOREIGN KEY (`iduser`)
    REFERENCES `covoitexpress`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `covoitexpress`.`preference`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `covoitexpress`.`preference` (
  `idpreferences` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(60) NULL,
  `img` VARCHAR(255) NULL DEFAULT 'null',
  PRIMARY KEY (`idpreferences`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `covoitexpress`.`user_preferences`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `covoitexpress`.`user_preferences` (
  `idpreference` INT NOT NULL,
  `iduser` INT NOT NULL,
  PRIMARY KEY (`idpreference`, `iduser`),
  INDEX `fk_preferences_has_user_user1_idx` (`iduser` ASC),
  INDEX `fk_preferences_has_user_preferences1_idx` (`idpreference` ASC),
  CONSTRAINT `fk_preferences_has_user_preferences1`
    FOREIGN KEY (`idpreference`)
    REFERENCES `covoitexpress`.`preference` (`idpreferences`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_preferences_has_user_user1`
    FOREIGN KEY (`iduser`)
    REFERENCES `covoitexpress`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
