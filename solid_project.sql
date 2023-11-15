-- MySQL Script generated by MySQL Workbench
-- Wed Nov 15 16:55:37 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema SOLID
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `SOLID` ;

-- -----------------------------------------------------
-- Schema SOLID
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `SOLID` DEFAULT CHARACTER SET utf8 ;
USE `SOLID` ;

-- -----------------------------------------------------
-- Table `SOLID`.`Author`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `SOLID`.`Author` ;

CREATE TABLE IF NOT EXISTS `SOLID`.`Author` (
  `id_author` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NOT NULL,
  `last_name` VARCHAR(255) NULL,
  PRIMARY KEY (`id_author`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SOLID`.`Book`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `SOLID`.`Book` ;

CREATE TABLE IF NOT EXISTS `SOLID`.`Book` (
  `id_book` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `isbn` VARCHAR(13) NOT NULL,
  `present` TINYINT(1) NOT NULL DEFAULT 1,
  `id_author` INT NOT NULL,
  PRIMARY KEY (`id_book`),
  INDEX `fk_Book_Author_idx` (`id_author` ASC) VISIBLE,
  CONSTRAINT `fk_Book_Author`
    FOREIGN KEY (`id_author`)
    REFERENCES `SOLID`.`Author` (`id_author`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SOLID`.`User`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `SOLID`.`User` ;

CREATE TABLE IF NOT EXISTS `SOLID`.`User` (
  `id_user` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NOT NULL,
  `last_name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_user`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SOLID`.`Borrow`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `SOLID`.`Borrow` ;

CREATE TABLE IF NOT EXISTS `SOLID`.`Borrow` (
  `id_borrow` INT NOT NULL AUTO_INCREMENT,
  `borrowing_date` DATE NOT NULL,
  `return_date` DATE NULL,
  `id_book` INT NOT NULL,
  `id_user` INT NOT NULL,
  PRIMARY KEY (`id_borrow`),
  INDEX `fk_Borrow_Book1_idx` (`id_book` ASC) VISIBLE,
  INDEX `fk_Borrow_User1_idx` (`id_user` ASC) VISIBLE,
  CONSTRAINT `fk_Borrow_Book1`
    FOREIGN KEY (`id_book`)
    REFERENCES `SOLID`.`Book` (`id_book`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Borrow_User1`
    FOREIGN KEY (`id_user`)
    REFERENCES `SOLID`.`User` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SOLID`.`Borrow`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `SOLID`.`Borrow` ;

CREATE TABLE IF NOT EXISTS `SOLID`.`Borrow` (
  `id_borrow` INT NOT NULL AUTO_INCREMENT,
  `borrowing_date` DATE NOT NULL,
  `return_date` DATE NULL,
  `id_book` INT NOT NULL,
  `id_user` INT NOT NULL,
  PRIMARY KEY (`id_borrow`),
  INDEX `fk_Borrow_Book1_idx` (`id_book` ASC) VISIBLE,
  INDEX `fk_Borrow_User1_idx` (`id_user` ASC) VISIBLE,
  CONSTRAINT `fk_Borrow_Book1`
    FOREIGN KEY (`id_book`)
    REFERENCES `SOLID`.`Book` (`id_book`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Borrow_User1`
    FOREIGN KEY (`id_user`)
    REFERENCES `SOLID`.`User` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SOLID`.`Penalty`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `SOLID`.`Penalty` ;

CREATE TABLE IF NOT EXISTS `SOLID`.`Penalty` (
  `id_penalty` INT NOT NULL AUTO_INCREMENT,
  `amount` INT NOT NULL,
  `payed` TINYINT(1) NOT NULL DEFAULT 0,
  `id_user` INT NOT NULL,
  PRIMARY KEY (`id_penalty`),
  INDEX `fk_Penalty_User1_idx` (`id_user` ASC) VISIBLE,
  CONSTRAINT `fk_Penalty_User1`
    FOREIGN KEY (`id_user`)
    REFERENCES `SOLID`.`User` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
