<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_MAINFILE'))die('Stop!!!');require_once(NV_ROOTDIR.'/includes/class/flood.class.php');$rules=array('60'=>NV_MAX_REQUESTS_60,'300'=>NV_MAX_REQUESTS_300);$flb=new FloodBlocker(NV_ROOTDIR.'/'.NV_LOGS_DIR.'/ip_logs',$rules,$client_info['ip']);if($flb->is_blocker){if(!defined('NV_IS_AJAX')and file_exists(NV_ROOTDIR."/themes/default/system/flood_blocker.tpl")){$xtpl=new XTemplate("flood_blocker.tpl",NV_ROOTDIR."/themes/default/system");$xtpl->assign('PAGE_TITLE',$lang_global['flood_page_title']);$xtpl->assign('IMG_SRC',NV_BASE_SITEURL.'images/load_bar.gif');$xtpl->assign('IMG_WIDTH',33);$xtpl->assign('IMG_HEIGHT',8);$xtpl->assign('FLOOD_BLOCKER_INFO1',$lang_global['flood_info1']);$xtpl->assign('FLOOD_BLOCKER_INFO2',$lang_global['flood_info2']);$xtpl->assign('FLOOD_BLOCKER_INFO3',$lang_global['sec']);$xtpl->assign('FLOOD_BLOCKER_TIME',$flb->time_blocker);$xtpl->parse('main');echo $xtpl->text('main');exit();}else{trigger_error($lang_global['flood_info1'],256);}}unset($rules,$flb);

?>