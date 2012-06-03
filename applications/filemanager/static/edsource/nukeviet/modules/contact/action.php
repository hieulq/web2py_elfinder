<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_MODULES'))die('Stop!!!');$sql_drop_module=array();$sql_drop_module[]="DROP TABLE IF EXISTS `".$db_config['prefix']."_".$lang."_".$module_data."_rows`";$sql_drop_module[]="DROP TABLE IF EXISTS `".$db_config['prefix']."_".$lang."_".$module_data."_send`";$sql_create_module=$sql_drop_module;$sql_create_module[]="CREATE TABLE `".$db_config['prefix']."_".$lang."_".$module_data."_rows` (\n  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,\n  `full_name` varchar(255) NOT NULL,\n  `phone` varchar(255) NOT NULL,\n  `fax` varchar(255) NOT NULL,\n  `email` varchar(100) NOT NULL,\n  `note` mediumtext NOT NULL,\n  `admins` mediumtext NOT NULL,\n  `act` tinyint(1) unsigned NOT NULL DEFAULT '0',\n  PRIMARY KEY (`id`),\n  UNIQUE KEY `full_name` (`full_name`)\n) ENGINE=MyISAM";$sql_create_module[]="CREATE TABLE `".$db_config['prefix']."_".$lang."_".$module_data."_send` (\n  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,\n  `cid` mediumint(8) unsigned NOT NULL DEFAULT '0',\n  `title` varchar(255) NOT NULL,\n  `content` mediumtext NOT NULL,\n  `send_time` int(11) unsigned NOT NULL DEFAULT '0',\n  `sender_id` mediumint(8) unsigned NOT NULL DEFAULT '0',\n  `sender_name` varchar(100) NOT NULL,\n  `sender_email` varchar(100) NOT NULL,\n  `sender_phone` varchar(255) NOT NULL,\n  `sender_ip` varchar(15) NOT NULL,\n  `is_read` tinyint(1) unsigned NOT NULL DEFAULT '0',\n  `is_reply` tinyint(1) unsigned NOT NULL DEFAULT '0',\n  `reply_content` mediumtext NOT NULL,\n  `reply_time` int(11) unsigned NOT NULL DEFAULT '0',\n  `reply_aid` mediumint(8) unsigned NOT NULL DEFAULT '0',\n  PRIMARY KEY (`id`),\n  KEY `sender_name` (`sender_name`)\n) ENGINE=MyISAM";$sql_create_module[]="INSERT INTO `".$db_config['prefix']."_".$lang."_".$module_data."_rows` (`id`, `full_name`, `phone`, `fax`, `email`, `note`, `admins`, `act`)  VALUES (NULL, 'Webmaster', '', '', '', '', '1/1/1/0;', 1)";

?>