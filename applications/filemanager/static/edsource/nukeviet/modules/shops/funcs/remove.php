<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_MOD_SHOPS'))die('Stop!!!');if(!isset($_SESSION[$module_data.'_cart']))$_SESSION[$module_data.'_cart']=array();$id=$nv_Request->get_int('id','post,get',0);if($id>0){if(isset($_SESSION[$module_data.'_cart'][$id])){unset($_SESSION[$module_data.'_cart'][$id]);echo $id;}else echo "";}else{$listall=$nv_Request->get_string('listall','post,get');$array_id=explode(',',$listall);$array_id=array_map("intval",$array_id);foreach($array_id as $id){if($id>0){if(isset($_SESSION[$module_data.'_cart'][$id])){unset($_SESSION[$module_data.'_cart'][$id]);}}}echo "OK_0";}

?>