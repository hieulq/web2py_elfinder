<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_MOD_BANNERS'))die('Stop!!!');$contents=array();$contents['info']=$lang_module['main_page_info'];$contents['detail']=$lang_global['detail'];$sql="SELECT * FROM `".NV_BANNERS_PLANS_GLOBALTABLE."` WHERE `act`=1 ORDER BY `blang` ASC";$result=$db->sql_query($sql);$contents['rows']=array();while($row=$db->sql_fetchrow($result)){$contents['rows'][$row['id']]['title']=array($row['title']);$contents['rows'][$row['id']]['blang']=array($lang_module['blang'],((!empty($row['blang']))?$language_array[$row['blang']]['name']:$lang_module['blang_all']));$contents['rows'][$row['id']]['size']=array($lang_module['size'],$row['width'].' x '.$row['height'].'px');$contents['rows'][$row['id']]['form']=array($lang_module['form'],$row['form']);$contents['rows'][$row['id']]['description']=array($lang_module['description'],$row['description']);}$contents['containerid']="action";$contents['aj']="nv_login_info('action');";$contents['clientinfo_link']=NV_BASE_SITEURL."index.php?".NV_LANG_VARIABLE."=".NV_LANG_DATA."&amp;".NV_NAME_VARIABLE."=".$module_name."&amp;".NV_OP_VARIABLE."=clientinfo";$contents['clientinfo_addads']=NV_BASE_SITEURL."index.php?".NV_LANG_VARIABLE."=".NV_LANG_DATA."&amp;".NV_NAME_VARIABLE."=".$module_name."&amp;".NV_OP_VARIABLE."=addads";$contents['clientinfo_stats']=NV_BASE_SITEURL."index.php?".NV_LANG_VARIABLE."=".NV_LANG_DATA."&amp;".NV_NAME_VARIABLE."=".$module_name."&amp;".NV_OP_VARIABLE."=stats";$page_title=$module_info['custom_title']." ".NV_TITLEBAR_DEFIS." ".$module_info['funcs'][$op]['func_custom_name'];$contents=nv_banner_theme_main($contents);include(NV_ROOTDIR."/includes/header.php");echo nv_site_theme($contents);include(NV_ROOTDIR."/includes/footer.php");

?>