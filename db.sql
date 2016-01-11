CREATE TABLE `volcation`.`users` (
	`user_id` INT NOT NULL,
	`username` VARCHAR( 20 ) NOT NULL ,
	`name` VARCHAR( 20 ) NOT NULL ,
	`password` VARCHAR( 50 ) NOT NULL ,
	`birthday` DATE NOT NULL ,
	`email` VARCHAR( 50 ) NOT NULL ,
	`visit` INT NOT NULL DEFAULT '0',
	PRIMARY KEY ( `user_id` ) 
) ENGINE = MYISAM ;


CREATE TABLE `volcation`.`posts` (
	`post_id` INT NOT NULL,
	`user_id` INT NOT NULL ,
	`title` VARCHAR( 80 ) NOT NULL ,
	`content` TEXT NOT NULL ,
	`date` DATE NOT NULL,
	PRIMARY KEY ( `post_id` ) 
) ENGINE = MYISAM ;


CREATE TABLE `volcation`.`comments` (
	`user_id` INT NOT NULL ,
	`post_id` INT NOT NULL ,
	`date` DATETIME NOT NULL ,
	`content` TEXT NOT NULL ,
	`comment_id` INT NOT NULL ,
	PRIMARY KEY ( `comment_id` ) 
) ENGINE = MYISAM ;

ALTER TABLE `users` ADD UNIQUE (
 `username` 
)
ALTER TABLE `users` ADD UNIQUE (
 `email` 
)

ALTER TABLE `posts` CHANGE `post_id` `post_id` INT( 11 ) NOT NULL AUTO_INCREMENT 

ALTER TABLE `comments` CHANGE `comment_id` `comment_id` INT( 11 ) NOT NULL AUTO_INCREMENT 

CREATE TABLE `volcation`.`board` (
 `board_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`boardname` VARCHAR( 20 ) NOT NULL 
) ENGINE = MYISAM ;


ALTER TABLE `posts` ADD `board_id` INT NOT NULL AFTER `post_id`