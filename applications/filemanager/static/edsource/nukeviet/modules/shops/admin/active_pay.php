<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_ADMIN'))die('Stop!!!');$table_name=$db_config['prefix']."_".$module_data."_orders";$contents=$lang_module['order_submit_pay_error'];$order_id=$nv_Request->get_int('order_id','get',0);$save=$nv_Request->get_string('save','post,get','');$re=$db->sql_query("SELECT *  FROM `".$table_name."` WHERE order_id=".$order_id);$data_content=$db->sql_fetchrow($re,2);if(empty($data_content)){$contents=$lang_module['order_submit_pay_error'];}if($save==1){$transaction_status=4;$payment_id=0;$payment_amount=0;$payment_data="";$payment="";$userid=$admin_info['userid'];$transaction_id=$db->sql_query_insert_id("INSERT INTO `".$db_config['prefix']."_".$module_data."_transaction` (`transaction_id`, `transaction_time`, `transaction_status`, `order_id`, `userid`, `payment`, `payment_id`, `payment_time`, `payment_amount`, `payment_data`) VALUES (NULL, UNIX_TIMESTAMP(), '".$transaction_status."', '".$order_id."', '".$userid."', '".$payment."', '".$payment_id."', UNIX_TIMESTAMP(), '".$payment_amount."', '".$payment_data."')");if($transaction_id>0){$db->sql_query("UPDATE `".$db_config['prefix']."_".$module_data."_orders` SET transaction_status=".$transaction_status." , transaction_id = ".$transaction_id.", transaction_count=transaction_count+1 WHERE `order_id`=".$order_id);nv_insert_logs(NV_LANG_DATA,$module_name,'log_payment_product',"id ".$id_pro,$admin_info['userid']);}$contents=$lang_module['order_submit_pay_ok'];nv_del_moduleCache($module_name);}echo $contents;

?>