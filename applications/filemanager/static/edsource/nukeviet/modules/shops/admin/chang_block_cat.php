<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_ADMIN'))die('Stop!!!');if(!defined('NV_IS_AJAX'))die('Wrong URL');$bid=$nv_Request->get_int('bid','post',0);$mod=$nv_Request->get_string('mod','post','');$new_vid=$nv_Request->get_int('new_vid','post',0);if(empty($bid))die("NO_".$bid);$content="NO_".$bid;if($mod=="weight"and $new_vid>0){$query="SELECT * FROM `".$db_config['prefix']."_".$module_data."_block_cat` WHERE `bid`=".$bid;$result=$db->sql_query($query);$numrows=$db->sql_numrows($result);if($numrows!=1)die('NO_'.$bid);$query="SELECT `bid` FROM `".$db_config['prefix']."_".$module_data."_block_cat` WHERE `bid`!=".$bid." ORDER BY `weight` ASC";$result=$db->sql_query($query);$weight=0;while($row=$db->sql_fetchrow($result)){++$weight;if($weight==$new_vid)++$weight;$sql="UPDATE `".$db_config['prefix']."_".$module_data."_block_cat` SET `weight`=".$weight." WHERE `bid`=".intval($row['bid']);$db->sql_query($sql);}$sql="UPDATE `".$db_config['prefix']."_".$module_data."_block_cat` SET `weight`=".$new_vid." WHERE `bid`=".intval($bid);$db->sql_query($sql);$content="OK_".$bid;}elseif($mod=="adddefault"and $bid>0){$new_vid=(intval($new_vid)==1)?1:0;$sql="UPDATE `".$db_config['prefix']."_".$module_data."_block_cat` SET `adddefault`=".$new_vid." WHERE `bid`=".intval($bid);$db->sql_query($sql);$content="OK_".$bid;}nv_del_moduleCache($module_name);include(NV_ROOTDIR."/includes/header.php");echo $content;include(NV_ROOTDIR."/includes/footer.php");

?>