<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_MOD_CONTACT'))die('Stop!!!');function main_theme($array_content,$select_options,$base_url,$checkss){global $module_file,$lang_global,$lang_module,$module_info;$xtpl=new XTemplate("form.tpl",NV_ROOTDIR."/themes/".$module_info['template']."/modules/".$module_file);$xtpl->assign('CONTENT',$array_content);$xtpl->assign('LANG',$lang_module);$xtpl->assign('ACTION_FILE',$base_url);$xtpl->assign('CHECKSS',$checkss);$xtpl->assign('GFX_WIDTH',NV_GFX_WIDTH);$xtpl->assign('GFX_HEIGHT',NV_GFX_HEIGHT);$xtpl->assign('NV_BASE_SITEURL',NV_BASE_SITEURL);$xtpl->assign('CAPTCHA_REFRESH',$lang_global['captcharefresh']);$xtpl->assign('CAPTCHA_REFR_SRC',NV_BASE_SITEURL."images/refresh.png");$xtpl->assign('NV_GFX_NUM',NV_GFX_NUM);if(!empty($array_content['error'])){$xtpl->parse('main.error');}if(defined('NV_IS_USER')){$xtpl->parse('main.form.iuser');}else{$xtpl->parse('main.form.iguest');}if(!empty($select_options)){foreach($select_options as $value=>$link){$xtpl->assign('SELECT_NAME',$link['full_name']);$xtpl->assign('SELECT_VALUE',$value);$xtpl->assign('SELECTED',($array_content['fpart']==$value)?' selected="selected"':'');$xtpl->parse('main.form.select_option_loop');}$xtpl->parse('main.form');}if(!empty($array_content['bodytext'])){$xtpl->parse('main.bodytext');}$xtpl->parse('main');return $xtpl->text('main');}function sendcontact($url){global $module_file,$module_info,$lang_module;$xtpl=new XTemplate("sendcontact.tpl",NV_ROOTDIR."/themes/".$module_info['template']."/modules/".$module_file);$lang_module['urlrefresh']=nv_url_rewrite($url,true);$xtpl->assign('LANG',$lang_module);$xtpl->parse('main');return $xtpl->text('main');}

?>