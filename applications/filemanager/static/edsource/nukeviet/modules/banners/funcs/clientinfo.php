<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_MOD_BANNERS'))die('Stop!!!');$contents=array();$contents['containerid']="action";if(defined('NV_IS_BANNER_CLIENT')){$contents['aj']="nv_cl_info('action');";}else{$contents['aj']="nv_login_info('action');";}$page_title=$module_info['custom_title']." ".NV_TITLEBAR_DEFIS." ".$module_info['funcs'][$op]['func_custom_name'];$contents=clientinfo_theme($contents);include(NV_ROOTDIR."/includes/header.php");echo nv_site_theme($contents);include(NV_ROOTDIR."/includes/footer.php");

?>