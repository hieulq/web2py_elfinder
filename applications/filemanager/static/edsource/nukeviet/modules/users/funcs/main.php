<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_MOD_USER'))die('Stop!!!');$page_title=$module_info['custom_title'];$key_words=$module_info['keywords'];$mod_title=isset($lang_module['main_title'])?$lang_module['main_title']:$module_info['custom_title'];$contents="";if(!$global_config['allowuserlogin']){$contents.=user_info_exit($lang_module['notallowuserlogin']);}else{if(!defined('NV_IS_USER')){$gfx_chk=(in_array($global_config['gfx_chk'],array(2,4,5,7)))?1:0;$array_login=array("nv_login"=>'',"nv_password"=>'',"nv_redirect"=>'');$array_login['openid_info']=$lang_module['what_is_openid'];if($global_config['allowuserreg']==2){$array_login['openid_info'].="<br />".$lang_module['or_activate_account'];}$contents.=user_login($gfx_chk,$array_login);}else{$contents.=user_welcome();}}include(NV_ROOTDIR."/includes/header.php");echo nv_site_theme($contents);include(NV_ROOTDIR."/includes/footer.php");

?>