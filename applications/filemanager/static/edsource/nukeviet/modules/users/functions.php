<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_SYSTEM'))die('Stop!!!');define('NV_IS_MOD_USER',true);$lang_module['in_groups']=$lang_global['in_groups'];function validUserLog($array_user,$remember,$opid){global $db,$client_info,$crypt,$nv_Request;$remember=intval($remember);$checknum=nv_genpass(10);$checknum=$crypt->hash($checknum);$user=array('userid'=>$array_user['userid'],'checknum'=>$checknum,'current_agent'=>$client_info['agent'],'last_agent'=>$array_user['last_agent'],'current_ip'=>$client_info['ip'],'last_ip'=>$array_user['last_ip'],'current_login'=>NV_CURRENTTIME,'last_login'=>intval($array_user['last_login']),'last_openid'=>$array_user['last_openid'],'current_openid'=>$opid);$user=nv_base64_encode(serialize($user));$db->sql_query("UPDATE `".NV_USERS_GLOBALTABLE."` SET \n    `checknum` = ".$db->dbescape($checknum).", \n    `last_login` = ".NV_CURRENTTIME.", \n    `last_ip` = ".$db->dbescape($client_info['ip']).", \n    `last_agent` = ".$db->dbescape($client_info['agent']).", \n    `last_openid` = ".$db->dbescape($opid).", \n    `remember` = ".$remember." \n    WHERE `userid`=".$array_user['userid']);$live_cookie_time=($remember)?NV_LIVE_COOKIE_TIME:0;$nv_Request->set_Cookie('nvloginhash',$user,$live_cookie_time);}

?>