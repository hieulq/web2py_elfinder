<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_THEMES'))die('Stop!!!');$page_title=$lang_module['autoinstall'];$xtpl=new XTemplate("autoinstall.tpl",NV_ROOTDIR."/themes/".$global_config['module_theme']."/modules/".$module_file);$xtpl->assign('LANG',$lang_module);$xtpl->assign('GLANG',$lang_global);if(!$sys_info['zlib_support']){$xtpl->parse('error');$contents=$xtpl->text('error');}else{$xtpl->assign('NV_BASE_SITEURL',NV_BASE_SITEURL);$xtpl->assign('NV_BASE_ADMINURL',NV_BASE_ADMINURL);$xtpl->assign('NV_NAME_VARIABLE',NV_NAME_VARIABLE);$xtpl->assign('NV_OP_VARIABLE',NV_OP_VARIABLE);$xtpl->assign('MODULE_NAME',$module_name);$xtpl->assign('OP',$op);$xtpl->parse('main');$contents=$xtpl->text('main');}include(NV_ROOTDIR."/includes/header.php");echo nv_admin_theme($contents);include(NV_ROOTDIR."/includes/footer.php");

?>