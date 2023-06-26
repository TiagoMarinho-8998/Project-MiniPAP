-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema LoginSystem
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema LoginSystem
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `LoginSystem` DEFAULT CHARACTER SET utf8 ;
USE `LoginSystem` ;

-- -----------------------------------------------------
-- Table `user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` VARCHAR(255) NOT NULL,
  `pass` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`id_user`));


-- -----------------------------------------------------
-- Table `session`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `session` (
  `id_session` INT(11) NOT NULL AUTO_INCREMENT,
  `id_user` INT(11) NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_session`),
  INDEX `fk_session_user_idx` (`id_user` ASC) VISIBLE,
  CONSTRAINT `fk_session_user`
    FOREIGN KEY (`id_user`)
    REFERENCES `user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- ----------------------------------------------------------------------------------------------------------
-- Register admin:
INSERT INTO user (id, nome, email, pass) VALUES ( 1, 'root', 'root', 'root');
-- ----------------------------------------------------------------------------------------------------------

INSERT INTO session (id, token) VALUES ();

SELECT role FROM user WHERE email = 'johndoe@example.com' AND pass = 'password';