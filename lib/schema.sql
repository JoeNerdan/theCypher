-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'events'
-- 
-- ---
CREATE DATABASE theCypher;
USE theCypher;

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` TINYINT NULL AUTO_INCREMENT DEFAULT NULL,
  `name` VARCHAR(256) NULL DEFAULT NULL,
  `location` VARCHAR(256) NULL DEFAULT NULL,
  `address` VARCHAR(256) NULL DEFAULT NULL,
  `city` VARCHAR(256) NULL DEFAULT NULL,
  `price` INT NULL DEFAULT NULL,
  `date` date NULL DEFAULT NULL,
  `time` time NULL DEFAULT NULL,
  `everyWeek` VARCHAR(256) NULL DEFAULT NULL,
  `email` VARCHAR(256) NULL DEFAULT NULL,
  `homepage` VARCHAR(256) NULL DEFAULT NULL,
  `visible` BOOLEAN NULL DEFAULT 0,
  `submitter` VARCHAR(256) NULL DEFAULT NULL,
  `description` VARCHAR(1256) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Foreign Keys 
-- ---


-- ---
-- Table Properties
-- ---

-- ALTER TABLE `events` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `events` (`id`,`name`,`location`,`adress`,`city`,`price`,`date`,`time`,`everyWeek`,`email`,`homepage`,`new field`,`submitter`,`description`) VALUES
-- ('','','','','','','','','','','','','','');

