<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_MOD_SHOPS'))die('Stop!!!');$contents="";$link=NV_BASE_SITEURL."index.php?".NV_LANG_VARIABLE."=".NV_LANG_DATA."&amp;".NV_NAME_VARIABLE."=".$module_name."&amp;".NV_OP_VARIABLE."=";$id=$nv_Request->get_int('id','get,post',0);$query=$db->sql_query("SELECT * FROM `".$db_config['prefix']."_".$module_data."_rows` WHERE `id` = ".$id."");$data_content=$db->sql_fetchrow($query);global $catid;$catid=$data_content['listcatid'];$query=$db->sql_query("SELECT * FROM `".$db_config['prefix']."_".$module_data."_units` WHERE `id` = ".$data_content['product_unit']."");$data_unit=$db->sql_fetchrow($query);$data_unit['title']=$data_unit[NV_LANG_DATA.'_title'];$array_img=explode("|",$data_content['homeimgthumb']);if(!empty($array_img[0])&&!nv_is_url($array_img[0])){$data_content['homeimgfile']=NV_BASE_SITEURL.NV_UPLOADS_DIR."/".$module_name."/".$data_content['homeimgfile'];$array_img[0]=NV_BASE_SITEURL.NV_UPLOADS_DIR."/".$module_name."/".$array_img[0];}else{$data_content['homeimgfile']=NV_BASE_SITEURL.NV_UPLOADS_DIR."/".$module_name."/thumb/no_image.jpg";$array_img[0]=NV_BASE_SITEURL."themes/".$module_info['template']."/images/".$module_name."/no-image.jpg";}$data_content['homeimgthumb']=$array_img[0];$page_title=$data_content[NV_LANG_DATA.'_title'];$contents=print_product($data_content,$data_unit,$page_title);echo $contents;

?>