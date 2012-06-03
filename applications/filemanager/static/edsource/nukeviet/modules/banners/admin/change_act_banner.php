<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_ADMIN'))die('Stop!!!');if(!defined('NV_IS_AJAX'))die('Wrong URL');$id=$nv_Request->get_int('id','post',0);if(empty($id))die('Stop!!!');$sql="SELECT `act` FROM `".NV_BANNERS_ROWS_GLOBALTABLE."` WHERE `id`=".$id." AND `act`IN (0,1,3)";$result=$db->sql_query($sql);$numrows=$db->sql_numrows($result);if($numrows!=1)die('Stop!!!');$row=$db->sql_fetchrow($result);$act=intval($row['act']);if($act==0)$act=1;elseif($act==1)$act=3;elseif($act==3)$act=1;$sql="UPDATE `".NV_BANNERS_ROWS_GLOBALTABLE."` SET `act`=".$act." WHERE `id`=".$id;$return=$db->sql_query($sql);$return=$return?"OK":"NO";nv_CreateXML_bannerPlan();include(NV_ROOTDIR."/includes/header.php");echo $return.'|act_'.$id;include(NV_ROOTDIR."/includes/footer.php");

?>