CREATE DATABASE depot;

USE depot;

CREATE TABLE `tree` (
 `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
 `parent_id` INT(11) NOT NULL,
 `title` VARCHAR(255),
 PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tree`(`id`, `parent_id`, `title`) VALUES (1, 0, 'Заголовок 1');
INSERT INTO `tree`(`id`, `parent_id`, `title`) VALUES (2, 0, 'Заголовок 2');
INSERT INTO `tree`(`id`, `parent_id`, `title`) VALUES (3, 0, 'Заголовок 3');
INSERT INTO `tree`(`id`, `parent_id`, `title`) VALUES (4, 1, 'Заголовок 1.1');	
INSERT INTO `tree`(`id`, `parent_id`, `title`) VALUES (5, 1, 'Заголовок 1.2');
INSERT INTO `tree`(`id`, `parent_id`, `title`) VALUES (6, 4, 'Заголовок 1.1.1');
INSERT INTO `tree`(`id`, `parent_id`, `title`) VALUES (7, 6, 'Заголовок 1.1.1.1');