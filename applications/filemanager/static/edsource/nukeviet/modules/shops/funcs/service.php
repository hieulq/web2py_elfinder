<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_MOD_SHOPS'))die('Stop!!!');if($pro_config['active_payment']=="1"){include_once(NV_ROOTDIR."/modules/".$module_file."/nusoap.php");$secure_pass=$pro_config['secure_pass'];function UpdateOrder($transaction_info,$order_code,$payment_id,$payment_type,$secure_code){global $secure_pass,$db,$db_config,$module_data;$table_name=$db_config['prefix']."_".$module_data."_orders_".NV_LANG_DATA."";$secure_code_new=md5($transaction_info.' '.$order_code.' '.$payment_id.' '.$payment_type.' '.$secure_pass);if($secure_code_new!=$secure_code){}else {if($payment_type==2){$order_code=intval($order_code);$re=$db->sql_query("UPDATE `".$table_name."` SET payment_id=".$payment_id." , payment = 1 , payment_type = ".$payment_type." WHERE id=".$order_code);}elseif($payment_type==1){$order_code=intval($order_code);$re=$db->sql_query("UPDATE `".$table_name."` SET payment_id=".$payment_id." , payment = 1 , payment_type = ".$payment_type." WHERE id=".$order_code);}}return "den day";}function RefundOrder($transaction_info,$order_code,$payment_id,$refund_payment_id,$payment_type,$secure_code){global $secure_pass,$db,$db_config,$module_data;$table_name=$db_config['prefix']."_".$module_data."_orders_".NV_LANG_DATA."";$secure_code_new=md5($transaction_info.' '.$order_code.' '.$payment_id.' '.$refund_payment_id.' '.$secure_pass);if($secure_code_new!=$secure_code){return-1;}else {$order_code=intval($order_code);$re=$db->sql_query("UPDATE `".$table_name."` SET payment_id=".$payment_id." , payment = 2 , payment_type = ".$payment_type." WHERE id=".$order_code);}}$server=new nusoap_server();$server->configureWSDL('WS_WITH_SMS',NS);$server->wsdl->schemaTargetNamespace=NS;$server->register('UpdateOrder',array('transaction_info'=>'xsd:string','order_code'=>'xsd:string','payment_id'=>'xsd:int','payment_type'=>'xsd:int','secure_code'=>'xsd:string'),array('result'=>'xsd:int'),NS);$server->register('RefundOrder',array('transaction_info'=>'xsd:string','order_code'=>'xsd:string','payment_id'=>'xsd:int','refund_payment_id'=>'xsd:int','payment_type'=>'xsd:int','secure_code'=>'xsd:string'),array('result'=>'xsd:int'),NS);$HTTP_RAW_POST_DATA=(isset($HTTP_RAW_POST_DATA))?$HTTP_RAW_POST_DATA:'';$server->service($HTTP_RAW_POST_DATA);}else{die('thanh toan khong kich hoat');}

?>