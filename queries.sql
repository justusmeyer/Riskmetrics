CREATE SCHEMA `Riskmetrics` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE `Riskmetrics`.`todos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `task` VARCHAR(124) NULL DEFAULT NULL,
  `timeline` VARCHAR(45) NULL DEFAULT NULL,
  `category` VARCHAR(45) NULL DEFAULT NULL,
  `due_date` VARCHAR(45) NULL DEFAULT NULL,
  `responsible` VARCHAR(45) NULL DEFAULT NULL,
  `preparation` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `Riskmetrics`.`funds` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `fund` VARCHAR(45) NULL DEFAULT NULL,
  `inception` VARCHAR(45) NULL DEFAULT NULL,
  `fee` VARCHAR(45) NULL DEFAULT NULL,
  `terms` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`));
  
CREATE TABLE `Riskmetrics`.`mvos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `asset_class` VARCHAR(45) NULL DEFAULT NULL,
  `mean_return` INT(10) NULL DEFAULT NULL,
  `mean_stdev` INT(10) NULL DEFAULT NULL,
  `weight_1` INT(10) NULL DEFAULT NULL,
  `weight_2` INT(10) NULL DEFAULT NULL,
  `weight_3` INT(10) NULL DEFAULT NULL,
  `weight_4` INT(10) NULL DEFAULT NULL,
  `weight_5` INT(10) NULL DEFAULT NULL,
  `corr_1` INT(10) NULL DEFAULT NULL,
  `corr_2` INT(10) NULL DEFAULT NULL,
  `corr_3` INT(10) NULL DEFAULT NULL,
  `corr_4` INT(10) NULL DEFAULT NULL,
  `corr_5` INT(10) NULL DEFAULT NULL,
  `corr_6` INT(10) NULL DEFAULT NULL,
  `corr_7` INT(10) NULL DEFAULT NULL,
  `corr_8` INT(10) NULL DEFAULT NULL,
  `corr_9` INT(10) NULL DEFAULT NULL,
  `corr_10` INT(10) NULL DEFAULT NULL,
  `corr_11` INT(10) NULL DEFAULT NULL,
  `corr_12` INT(10) NULL DEFAULT NULL,
  `corr_13` INT(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`));
  