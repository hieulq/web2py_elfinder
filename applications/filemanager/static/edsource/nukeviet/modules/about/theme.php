<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_MOD_ABOUT'))die('Stop!!!');function nv_about_main($row,$ab_links){global $module_file,$lang_module,$module_info;$xtpl=new XTemplate("main.tpl",NV_ROOTDIR."/themes/".$module_info['template']."/modules/".$module_file);$xtpl->assign('LANG',$lang_module);$xtpl->assign('CONTENT',$row);if(!empty($ab_links)){foreach($ab_links as $row){$xtpl->assign('OTHER',$row);$xtpl->parse('main.other.loop');}$xtpl->parse('main.other');}$xtpl->parse('main');return $xtpl->text('main');}

?>