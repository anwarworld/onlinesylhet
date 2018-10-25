ALTER TABLE `categories` ADD `sub_cat_id` INT NOT NULL AFTER `parent_cat_name`;
ALTER TABLE `categories` ADD `sub_cat_name` VARCHAR(100) NOT NULL AFTER `sub_cat_id`;
ALTER TABLE `categories` ADD `category_sort` INT NOT NULL AFTER `category_image`;
ALTER TABLE `categories` CHANGE `sub_cat_name` `sub_cat_name` VARCHAR(100) NOT NULL;
