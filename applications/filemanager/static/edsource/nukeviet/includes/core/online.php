<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_MAINFILE'))die('Stop!!!');function nv_online_upd(){global $db,$client_info,$user_info;$userid=0;$username="guest";if(isset($user_info['userid'])and $user_info['userid']>0){$userid=$user_info['userid'];$username=$user_info['username'];}elseif($client_info['is_bot']){$username='bot:'.$client_info['bot_info']['name'];}$query="REPLACE INTO `".NV_SESSIONS_GLOBALTABLE."` VALUES (\n    ".$db->dbescape($client_info['session_id']).", \n    ".$userid.", \n    ".$db->dbescape($username).", \n    ".NV_CURRENTTIME."\n    )";$db->sql_query($query);}nv_online_upd();

?>