ALTER TABLE `vendor` ADD `pum_set` VARCHAR(20) NOT NULL AFTER `vp_merchant_id`, ADD `pum_merchant_key` VARCHAR(500) NOT NULL AFTER `pum_set`, ADD `pum_merchant_salt` VARCHAR(500) NOT NULL AFTER `pum_merchant_key`;


DELETE FROM `business_settings` WHERE `business_settings`.`type` = 'pum_set';
DELETE FROM `business_settings` WHERE `business_settings`.`type` = 'pum_merchant_key';
DELETE FROM `business_settings` WHERE `business_settings`.`type` = 'pum_merchant_salt';
DELETE FROM `business_settings` WHERE `business_settings`.`type` = 'pum_account_type';


INSERT INTO `business_settings` (`business_settings_id`, `type`, `status`, `value`) VALUES (NULL, 'pum_set', NULL, 'ok');
INSERT INTO `business_settings` (`business_settings_id`, `type`, `status`, `value`) VALUES (NULL, 'pum_merchant_key', NULL, NULL);
INSERT INTO `business_settings` (`business_settings_id`, `type`, `status`, `value`) VALUES (NULL, 'pum_merchant_salt', NULL, NULL);
INSERT INTO `business_settings` (`business_settings_id`, `type`, `status`, `value`) VALUES (NULL, 'pum_account_type', NULL, 'sandbox');


INSERT INTO `permission` (`permission_id`, `name`, `codename`, `parent_status`, `description`) VALUES (NULL, 'delete all', 'delete_all', 'parent', NULL);
INSERT INTO `permission` (`permission_id`, `name`, `codename`, `parent_status`, `description`) VALUES (NULL, 'delete all categories', 'delete all categories', '111', NULL);
INSERT INTO `permission` (`permission_id`, `name`, `codename`, `parent_status`, `description`) VALUES (NULL, 'delete all products', 'delete all products', '111', NULL);
INSERT INTO `permission` (`permission_id`, `name`, `codename`, `parent_status`, `description`) VALUES (NULL, 'delete all brands', 'delete all brands', '111', NULL);


ALTER TABLE `sale` ADD `guest_id` VARCHAR(100) NOT NULL AFTER `buyer`;


INSERT INTO `general_settings` (`general_settings_id`, `type`, `value`) VALUES (NULL, 'wallet_system_set', 'ok');


UPDATE `general_settings` SET `value` = '1.5.2' WHERE `type` = 'version';