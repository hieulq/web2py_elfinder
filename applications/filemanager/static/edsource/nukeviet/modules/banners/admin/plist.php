<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_ADMIN'))die('Stop!!!');if($client_info['is_myreferer']!=1)die('Wrong URL');$sql="SELECT * FROM `".NV_BANNERS_PLANS_GLOBALTABLE."` ORDER BY `blang` ASC";$result=$db->sql_query($sql);$contents=array();$contents['caption']=$lang_module['plans_list2'];$contents['thead']=array($lang_module['title'],$lang_module['blang'],$lang_module['size'],$lang_module['is_act'],$lang_global['actions']);$contents['view']=$lang_global['detail'];$contents['edit']=$lang_global['edit'];$contents['add']=$lang_module['add_banner'];$contents['del']=$lang_global['delete'];$contents['rows']=array();while($row=$db->sql_fetchrow($result)){$contents['rows'][$row['id']]['title']=$row['title'];$contents['rows'][$row['id']]['blang']=(!empty($row['blang']))?$language_array[$row['blang']]['name']:$lang_module['blang_all'];$contents['rows'][$row['id']]['size']=$row['width'].' x '.$row['height'].'px';$contents['rows'][$row['id']]['act']=array('act_'.$row['id'],$row['act'],"nv_pl_chang_act(".$row['id'].",'act_".$row['id']."');");$contents['rows'][$row['id']]['view']=NV_BASE_ADMINURL."index.php?".NV_NAME_VARIABLE."=".$module_name."&amp;".NV_OP_VARIABLE."=info_plan&amp;id=".$row['id'];$contents['rows'][$row['id']]['edit']=NV_BASE_ADMINURL."index.php?".NV_NAME_VARIABLE."=".$module_name."&amp;".NV_OP_VARIABLE."=edit_plan&amp;id=".$row['id'];$contents['rows'][$row['id']]['add']=NV_BASE_ADMINURL."index.php?".NV_NAME_VARIABLE."=".$module_name."&amp;".NV_OP_VARIABLE."=add_banner&amp;pid=".$row['id'];$contents['rows'][$row['id']]['del']="nv_pl_del(".$row['id'].");";}include(NV_ROOTDIR."/includes/header.php");echo nv_plist_theme($contents);include(NV_ROOTDIR."/includes/footer.php");

?>