<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_ADMIN')or!defined('NV_MAINFILE')or!defined('NV_IS_MODADMIN'))die('Stop!!!');$submenu['clearsystem']=$lang_module['clearsystem'];$submenu['siteDiagnostic']=$lang_module['siteDiagnostic'];$submenu['keywordRank']=$lang_module['keywordRank'];$submenu['sitemapPing']=$lang_module['sitemapPing'];$submenu['checkupdate']=$lang_module['checkupdate'];$submenu['config']=$lang_module['config'];if($module_name=="webtools"){$allow_func=array('main','clearsystem','sitemapPing','checkupdate','siteDiagnostic','keywordRank','config');$menu_top=array("title"=>$module_name,"module_file"=>"","custom_title"=>$lang_global['mod_webtools']);if(defined('NV_IS_GODADMIN')){$allow_func[]="deleteupdate";}define('NV_IS_FILE_WEBTOOLS',true);}

?>