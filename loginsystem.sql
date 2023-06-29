CREATE DATABASE loginsystem;
Use loginsystem;

CREATE TABLE IF NOT EXISTS `loginsystem`.`games` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(255) NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  `empresa` VARCHAR(255) NOT NULL,
  `anocreacao` VARCHAR(4) NULL DEFAULT NULL,
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


INSERT INTO `games` (`id`, `tipo`, `nome`, `empresa`, `anocreacao`) VALUES
(1, 'Ação', 'Grand Theft Auto V', 'Rockstar North', 2013),
(2, 'RPG', 'The Witcher 3: Wild Hunt', 'CD Projekt RED', 2015),
(3, 'Estratégia', 'Civilization VI', 'Firaxis Games', 2016),
(4, 'Aventura', 'Uncharted 4: A Thief''s End', 'Naughty Dog', 2016),
(5, 'Esporte', 'FIFA 22', 'Electronic Arts', 2021),
(6, 'Corrida', 'Forza Horizon 5', 'Playground Games', 2021),
(7, 'Simulação', 'The Sims 4', 'Maxis', 2014),
(8, 'Tiro em primeira pessoa', 'Call of Duty: Modern Warfare', 'Infinity Ward', 2019),
(9, 'Luta', 'Mortal Kombat 11', 'NetherRealm Studios', 2019),
(10, 'Plataforma', 'Super Mario Odyssey', 'Nintendo', 2017),
(11, 'Survival', 'The Forest', 'Endnight Games', 2014),
(12, 'RPG', 'Dark Souls III', 'FromSoftware', 2016),
(13, 'Ação', 'Assassin''s Creed Valhalla', 'Ubisoft Montreal', 2020),
(14, 'Aventura', 'The Legend of Zelda: Breath of the Wild', 'Nintendo', 2017),
(15, 'Estratégia', 'Crusader Kings III', 'Paradox Development Studios', 2020),
(16, 'Corrida', 'Mario Kart 8 Deluxe', 'Nintendo', 2017),
(17, 'Esporte', 'NBA 2K22', 'Visual Concepts', 2021),
(18, 'Tiro em primeira pessoa', 'Halo Infinite', '343 Industries', 2021),
(19, 'Simulação', 'Microsoft Flight Simulator', 'Asobo Studio', 2020),
(20, 'Luta', 'Dragon Ball FighterZ', 'Arc System Works', 2018);