<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_ADMIN'))die('Stop!!!');$order_id=$nv_Request->get_int('order_id','post,get',0);$checkss=$nv_Request->get_string('checkss','post,get',0);$contents="NO_".$order_id;if($order_id>0 and $checkss==md5($order_id.$global_config['sitekey'].session_id())){$re=$db->sql_query("SELECT * FROM `".$db_config['prefix']."_".$module_data."_orders` WHERE order_id=".$order_id);$data_order=$db->sql_fetchrow($re);if($pro_config['active_order_number']=='0'){product_number_order($data_order['listid'],$data_order['listnum'],"+");}$db->sql_query("DELETE FROM `".$db_config['prefix']."_".$module_data."_orders` WHERE `order_id`=".$order_id." AND `transaction_status` < 1");if($db->sql_affectedrows()){$db->sql_query("DELETE FROM `".$db_config['prefix']."_".$module_data."_transaction` WHERE `order_id`=".$order_id."");$contents="OK_".$order_id;}}elseif($nv_Request->isset_request('listall','post,get')){$listall=$nv_Request->get_string('listall','post,get');$array_id=explode(',',$listall);foreach($array_id as $order_i){$arr_order_i=explode("_",$order_i);$order_id=intval($arr_order_i[0]);$checkss=trim($arr_order_i[1]);if($order_id>0 and $checkss==md5($order_id.$global_config['sitekey'].session_id())){$re=$db->sql_query("SELECT * FROM `".$db_config['prefix']."_".$module_data."_orders` WHERE order_id=".$order_id);$data_order=$db->sql_fetchrow($re);if($pro_config['active_order_number']=='0'){product_number_order($data_order['listid'],$data_order['listnum'],"+");}$db->sql_query("DELETE FROM `".$db_config['prefix']."_".$module_data."_orders` WHERE `order_id`=".$order_id."  AND `transaction_status` < 1");if($db->sql_affectedrows()){$db->sql_query("DELETE FROM `".$db_config['prefix']."_".$module_data."_transaction` WHERE `order_id`=".$order_id."");}$db->sql_freeresult();}}$contents="OK_0";}echo $contents;nv_del_moduleCache($module_name);

?>