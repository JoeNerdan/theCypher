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
  `name` CHAR NULL DEFAULT NULL,
  `location` CHAR NULL DEFAULT NULL,
  `adress` CHAR NULL DEFAULT NULL,
  `city` CHAR NULL DEFAULT NULL,
  `price` INT NULL DEFAULT NULL,
  `date` date NULL DEFAULT NULL,
  `time` time NULL DEFAULT NULL,
  `everyWeek` CHAR NULL DEFAULT NULL,
  `email` CHAR NULL DEFAULT NULL,
  `homepage` CHAR NULL DEFAULT NULL,
  `new field` CHAR NULL DEFAULT NULL,
  `submitter` CHAR NULL DEFAULT NULL,
  `description` CHAR NULL DEFAULT NULL,
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

