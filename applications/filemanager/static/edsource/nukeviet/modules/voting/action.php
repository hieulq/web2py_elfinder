<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_MODULES'))die('Stop!!!');$sql_drop_module=array();$sql_drop_module[]="DROP TABLE IF EXISTS `".$db_config['prefix']."_".$lang."_".$module_data."`;";$sql_drop_module[]="DROP TABLE IF EXISTS `".$db_config['prefix']."_".$lang."_".$module_data."_rows`;";$sql_create_module=$sql_drop_module;$sql_create_module[]="CREATE TABLE `".$db_config['prefix']."_".$lang."_".$module_data."` (\n  `vid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,\n  `question` varchar(255) NOT NULL,\n  `link` varchar(255) NOT NULL default '',  \n  `acceptcm` int(2) NOT NULL DEFAULT '1',\n  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT '0',\n  `who_view` tinyint(2) unsigned NOT NULL DEFAULT '0',\n  `groups_view` varchar(255) NOT NULL,\n  `publ_time` int(11) unsigned NOT NULL DEFAULT '0',\n  `exp_time` int(11) unsigned NOT NULL DEFAULT '0',\n  `act` tinyint(1) unsigned NOT NULL DEFAULT '0',\n  PRIMARY KEY (`vid`),\n  UNIQUE KEY `question` (`question`)\n) ENGINE=MyISAM";$sql_create_module[]="CREATE TABLE `".$db_config['prefix']."_".$lang."_".$module_data."_rows` (\n  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,\n  `vid` int(11) unsigned NOT NULL,\n  `title` varchar(255) NOT NULL DEFAULT '',\n  `url` varchar(255) NOT NULL DEFAULT '',\n  `hitstotal` int(11) unsigned NOT NULL DEFAULT '0',\n  PRIMARY KEY (`id`),\n  UNIQUE KEY `vid` (`vid`,`title`)\n) ENGINE=MyISAM";

?>