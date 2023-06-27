CREATE DATABASE loginsystem;
Use loginsystem;

CREATE TABLE IF NOT EXISTS `loginsystem`.`livro` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `isbn` BIGINT NOT NULL,
  `titulo` VARCHAR(255) NOT NULL,
  `escritor` VARCHAR(255) NOT NULL,
  `anoPublicacao` VARCHAR(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id`));


CREATE TABLE IF NOT EXISTS `loginsystem`.`session` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(300) NULL,
  PRIMARY KEY (`id`));


CREATE TABLE IF NOT EXISTS `loginsystem`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  `create_datetime` DATETIME NOT NULL,
  `session_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_session_idx` (`session_id` ASC),
  CONSTRAINT `fk_users_session`
    FOREIGN KEY (`session_id`)
    REFERENCES `loginsystem`.`session` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
AUTO_INCREMENT = 3;


INSERT INTO `session` (`id`, `nome`, `descricao`) VALUES
(1, 'Admin', 'System admin'),
(2, 'User', 'System user');


INSERT INTO `users` (`id`, `username`, `email`, `password`, `create_datetime`,`session_id`) VALUES
(1, 'root', 'root', '63a9f0ea7bb98050796b649e85481845', '2023-06-23 16:53:00',1);