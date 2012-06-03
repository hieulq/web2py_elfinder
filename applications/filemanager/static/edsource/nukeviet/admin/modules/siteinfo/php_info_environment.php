<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_SITEINFO'))die('Stop!!!');$page_title=$lang_module['environment_php'];require_once(NV_ROOTDIR."/includes/core/phpinfo.php");$xtpl=new XTemplate("environment_php.tpl",NV_ROOTDIR."/themes/".$global_config['module_theme']."/modules/".$module_file);$array=phpinfo_array(16,1);$caption=$lang_module['environment_php'];$thead=array($lang_module['variable'],$lang_module['value']);if(!empty($array['Environment'])){$xtpl->assign('CAPTION',$caption);$xtpl->assign('THEAD0',$thead[0]);$xtpl->assign('THEAD1',$thead[1]);$a=0;foreach($array['Environment']as $key=>$value){$xtpl->assign('CLASS',($a%2)?" class=\"second\"":"");$xtpl->assign('KEY',$key);$xtpl->assign('VALUE',$value);$xtpl->parse('main.loop');++$a;}}$xtpl->parse('main');$contents=$xtpl->text('main');include(NV_ROOTDIR."/includes/header.php");echo nv_admin_theme($contents);include(NV_ROOTDIR."/includes/footer.php");

?>