<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_ADMIN'))die('Stop!!!');$sql="SELECT * FROM `".NV_PREFIXLANG."_".$module_data."_rows` ORDER BY `full_name`";$result=$db->sql_query($sql);if(!$db->sql_numrows($result)){Header("Location: ".NV_BASE_ADMINURL."index.php?".NV_NAME_VARIABLE."=".$module_name."&".NV_OP_VARIABLE."=row");die();}$page_title=$lang_module['list_row_title'];$xtpl=new XTemplate("list_row.tpl",NV_ROOTDIR."/themes/".$global_config['module_theme']."/modules/".$module_file);$xtpl->assign('LANG',$lang_module);$xtpl->assign('GLANG',$lang_global);$a=0;while($row=$db->sql_fetchrow($result)){$xtpl->assign('ROW',array('class'=>(++$a%2)?" class=\"second\"":"",'full_name'=>$row['full_name'],'email'=>$row['email'],'phone'=>$row['phone'],'fax'=>$row['fax'],'id'=>$row['id'],'url_edit'=>NV_BASE_ADMINURL."index.php?".NV_NAME_VARIABLE."=".$module_name."&amp;".NV_OP_VARIABLE."=row&amp;id=".$row['id']));$array=array($lang_global['disable'],$lang_global['active']);foreach($array as $key=>$val){$xtpl->assign('STATUS',array('key'=>$key,'selected'=>$key==$row['act']?" selected=\"selected\"":"",'title'=>$val ));$xtpl->parse('main.row.status');}$xtpl->parse('main.row');}$xtpl->assign('URL_ADD',NV_BASE_ADMINURL."index.php?".NV_NAME_VARIABLE."=".$module_name."&amp;".NV_OP_VARIABLE."=row");$xtpl->parse('main');$contents=$xtpl->text('main');include(NV_ROOTDIR."/includes/header.php");echo nv_admin_theme($contents);include(NV_ROOTDIR."/includes/footer.php");

?>