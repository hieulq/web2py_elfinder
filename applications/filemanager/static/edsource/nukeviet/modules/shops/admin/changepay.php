<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_ADMIN'))die('Stop!!!');$payment=$nv_Request->get_string('oid','post','');$new_weight=$nv_Request->get_int('w','post',0);$content="NO_".$payment;$table=$db_config['prefix']."_".$module_data."_payment";list($payment,$weight_old)=$db->sql_fetchrow($db->sql_query("SELECT `payment`, `weight` FROM `".$table."` WHERE `payment`=".$db->dbescape($payment).""));if(!empty($payment)){$query="SELECT `payment` FROM `".$table."` WHERE `weight` = ".intval($new_weight)."";$result=$db->sql_query($query);list($payment_swap)=$db->sql_fetchrow($result);$sql="UPDATE `".$table."` SET `weight`=".$new_weight." WHERE `payment`=".$db->dbescape($payment);$db->sql_query($sql);$sql="UPDATE `".$table."` SET `weight`=".$weight_old." WHERE `payment`=".$db->dbescape($payment_swap);$db->sql_query($sql);$content="OK_".$payment;nv_del_moduleCache($payment);}include(NV_ROOTDIR."/includes/header.php");echo $content;include(NV_ROOTDIR."/includes/footer.php");

?>