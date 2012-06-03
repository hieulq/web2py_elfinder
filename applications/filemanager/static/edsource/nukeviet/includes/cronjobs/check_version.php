<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_MAINFILE'))die('Stop!!!');if(!defined('NV_IS_CRON'))die('Stop!!!');function cron_auto_check_version(){global $nv_Request,$global_config;$admin_cookie=$nv_Request->get_bool('admin','session',false);if(!empty($admin_cookie)and $global_config['autocheckupdate']){require(NV_ROOTDIR."/includes/core/admin_access.php");require(NV_ROOTDIR."/includes/core/is_admin.php");if(defined('NV_IS_GODADMIN')){include_once(NV_ROOTDIR."/includes/core/admin_functions.php");nv_geVersion($global_config['autoupdatetime']*3600);}}return true;}

?>