<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_ADMIN')or!defined('NV_MAINFILE')or!defined('NV_IS_MODADMIN'))die('Stop!!!');define('NV_IS_FILE_ADMIN',true);$submenu['user_add']=$lang_module['user_add'];$submenu['user_waiting']=$lang_module['member_wating'];$submenu['groups']=$lang_global['mod_groups'];$submenu['question']=$lang_module['question'];$submenu['siteterms']=$lang_module['siteterms'];$submenu['config']=$lang_module['config'];$allow_func=array('main','del','setactive','user_add','edit','user_waiting','question','siteterms','config','groups','getuserid');function groupList(){global $db;$query="SELECT * FROM `".NV_GROUPS_GLOBALTABLE."` ORDER BY `weight`";$result=$db->sql_query($query);$groups=array();while($row=$db->sql_fetchrow($result)){$groups[$row['group_id']]=$row;}return $groups;}function nv_fix_question(){global $db;$query="SELECT `qid` FROM `".NV_USERS_GLOBALTABLE."_question` WHERE `lang`='".NV_LANG_DATA."' ORDER BY `weight` ASC";$result=$db->sql_query($query);$weight=0;while($row=$db->sql_fetchrow($result)){++$weight;$sql="UPDATE `".NV_USERS_GLOBALTABLE."_question` SET `weight`=".$weight." WHERE `qid`=".$row['qid'];$db->sql_query($sql);}$db->sql_freeresult();}

?>