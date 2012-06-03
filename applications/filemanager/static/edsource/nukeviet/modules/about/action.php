<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_MODULES'))die('Stop!!!');$sql_drop_module=array();$sql_drop_module[]="DROP TABLE IF EXISTS `".$db_config['prefix']."_".$lang."_".$module_data."`;";$sql_create_module=$sql_drop_module;$sql_create_module[]="CREATE TABLE `".$db_config['prefix']."_".$lang."_".$module_data."` (\n  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,\n  `title` varchar(255) NOT NULL,\n  `alias` varchar(255) NOT NULL,\n  `bodytext` mediumtext NOT NULL,\n  `keywords` mediumtext NOT NULL,\n  `weight` smallint(4) NOT NULL DEFAULT '0',\n  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT '0',\n  `add_time` int(11) NOT NULL DEFAULT '0',\n  `edit_time` int(11) NOT NULL DEFAULT '0',\n  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',\n  PRIMARY KEY (`id`),\n  UNIQUE KEY `alias` (`alias`)\n) ENGINE=MyISAM";

?>