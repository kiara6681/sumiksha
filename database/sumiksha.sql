
/************************** ALTER TABLE `refer_earn` ADD `required_loan` 27/03/2019 ***************************/
ALTER TABLE `refer_earn` ADD `required_loan` VARCHAR(255) NULL AFTER `sub_product_id`, ADD `approve_loan` VARCHAR(255) NULL AFTER `required_loan`, ADD `state_id` INT NULL AFTER `approve_loan`, ADD `city_id` INT NULL AFTER `state_id`;

/************************** ALTER TABLE `refer_earn` ADD `required_loan` 27/03/2019 ***************************/
ALTER TABLE `refer_earn` ADD `login_bank` VARCHAR(255) NULL AFTER `reject_reason`, ADD `login_date` VARCHAR(255) NULL AFTER `login_bank`;

ALTER TABLE `course1` CHANGE `banner_description` `information` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;

ALTER TABLE `course1` CHANGE `description` `current_roi` LONGTEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;

ALTER TABLE `course1` ADD `features` LONGTEXT NOT NULL AFTER `current_roi`;

ALTER TABLE `course1` CHANGE `information` `information` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL, CHANGE `current_roi` `current_roi` LONGTEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL, CHANGE `features` `features` LONGTEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;

ALTER TABLE `login` ADD `verify_token` TEXT NULL DEFAULT NULL AFTER `password`;