<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_SITEINFO'))die('Stop!!!');require_once(NV_ROOTDIR."/includes/core/phpinfo.php");$array=phpinfo_array(32,1);if(!empty($array['PHP Variables'])){$xtpl=new XTemplate("variables_php.tpl",NV_ROOTDIR."/themes/".$global_config['module_theme']."/modules/".$module_file);$caption=$lang_module['variables_php'];$thead=array($lang_module['variable'],$lang_module['value']);$xtpl->assign('CAPTION',$caption);$xtpl->assign('THEAD0',$thead[0]);$xtpl->assign('THEAD1',$thead[1]);$a=0;$array_key_no_show=array();$array_key_no_show[]="_SERVER[\"HTTP_COOKIE\"]";$array_key_no_show[]="_SERVER[\"PHP_AUTH_USER\"]";$array_key_no_show[]="_SERVER[\"REMOTE_USER\"]";$array_key_no_show[]="_SERVER[\"AUTH_USER\"]";$array_key_no_show[]="_SERVER[\"HTTP_AUTHORIZATION\"]";$array_key_no_show[]="_SERVER[\"Authorization\"]";$array_key_no_show[]="_SERVER[\"PHP_AUTH_PW\"]";$array_key_no_show[]="_SERVER[\"REMOTE_PASSWORD\"]";$array_key_no_show[]="_SERVER[\"AUTH_PASSWORD\"]";foreach($array['PHP Variables']as $key=>$value){if(substr($key,0,7)!="_COOKIE"and!in_array($key,$array_key_no_show)){$xtpl->assign('CLASS',($a%2)?" class=\"second\"":"");$xtpl->assign('KEY',$key);$xtpl->assign('VALUE',$value);$xtpl->parse('main.loop');++$a;}}$xtpl->parse('main');$contents=$xtpl->text('main');}$page_title=$lang_module['variables_php'];include(NV_ROOTDIR."/includes/header.php");echo nv_admin_theme($contents);include(NV_ROOTDIR."/includes/footer.php");

?>