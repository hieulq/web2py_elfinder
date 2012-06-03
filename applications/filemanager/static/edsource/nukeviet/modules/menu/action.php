<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_MODULES'))die('Stop!!!');$sql_drop_module=array();$sql_drop_module[]="DROP TABLE IF EXISTS `".$db_config['prefix']."_".$lang."_".$module_data."_menu`";$sql_drop_module[]="DROP TABLE IF EXISTS `".$db_config['prefix']."_".$lang."_".$module_data."_rows`";$sql_create_module=$sql_drop_module;$sql_create_module[]="CREATE TABLE `".$db_config['prefix']."_".$lang."_".$module_data."_rows` (\n  `id` int(11) NOT NULL AUTO_INCREMENT,\n  `parentid` int(11) unsigned NOT NULL,\n  `mid` int(11) NOT NULL DEFAULT '0',  \n  `title` varchar(255) NOT NULL,\n  `link` text NOT NULL,\n  `note` varchar(255) NOT NULL DEFAULT '',\n  `weight` int(11) NOT NULL,\n  `order` int(11) NOT NULL DEFAULT '0',\n  `lev` int(11) NOT NULL DEFAULT '0',\n  `subitem` mediumtext NOT NULL,\n  `who_view` tinyint(2) NOT NULL DEFAULT '0',\n  `groups_view` varchar(255) NOT NULL,  \n  `module_name` varchar(255) NOT NULL DEFAULT '',\n  `op` varchar(255) NOT NULL DEFAULT '', \n  `target` tinyint(4) NOT NULL DEFAULT '0',\n  `css` varchar(255) NOT NULL DEFAULT '', \n  `active_type` tinyint(1) unsigned NOT NULL DEFAULT '0',\n  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',\n   PRIMARY KEY (`id`)\n) ENGINE=MyISAM";$sql_create_module[]="CREATE TABLE `".$db_config['prefix']."_".$lang."_".$module_data."_menu` (\n  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,\n  `title` varchar(50) NOT NULL,\n  `menu_item` mediumtext NOT NULL,\n  `description` varchar(255) NOT NULL DEFAULT '',\n   PRIMARY KEY (`id`),\n  UNIQUE KEY `title` (`title`)\n) ENGINE=MyISAM";

?>