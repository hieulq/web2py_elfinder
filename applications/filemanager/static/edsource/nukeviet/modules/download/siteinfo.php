<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_SITEINFO'))die('Stop!!!');$lang_siteinfo=nv_get_lang_module($mod);list($number)=$db->sql_fetchrow($db->sql_query("SELECT COUNT(*) as number FROM `".NV_PREFIXLANG."_".$mod_data."` where `status`= 1"));if($number>0){$siteinfo[]=array('key'=>$lang_siteinfo['siteinfo_publtime'],'value'=>$number);}list($number)=$db->sql_fetchrow($db->sql_query("SELECT COUNT(*) as number FROM `".NV_PREFIXLANG."_".$mod_data."` where `status`= 0"));if($number>0){$siteinfo[]=array('key'=>$lang_siteinfo['siteinfo_expired'],'value'=>$number);}list($number)=$db->sql_fetchrow($db->sql_query("SELECT COUNT(*) as number FROM `".NV_PREFIXLANG."_".$mod_data."_comments` where `status` = 1"));if($number>0){$siteinfo[]=array('key'=>$lang_siteinfo['siteinfo_comment'],'value'=>$number);}list($number)=$db->sql_fetchrow($db->sql_query("SELECT COUNT(*) as number FROM `".NV_PREFIXLANG."_".$mod_data."_comments` where `status` = 0"));if($number>0){$pendinginfo[]=array('key'=>$lang_siteinfo['siteinfo_comment_pending'],'value'=>$number,'link'=>NV_BASE_ADMINURL."index.php?".NV_NAME_VARIABLE."=".$mod."&amp;".NV_OP_VARIABLE."=comment&amp;status=0");}$sql="SELECT COUNT(*) as number FROM `".NV_PREFIXLANG."_".$mod_data."_tmp`";$array_data=nv_db_cache($sql,'',$mod);$number=isset($array_data[0]['number'])?intval($array_data[0]['number']):0;if($number>0){$pendinginfo[]=array('key'=>$lang_siteinfo['siteinfo_users_send'],'value'=>$number,'link'=>NV_BASE_ADMINURL."index.php?".NV_NAME_VARIABLE."=".$mod."&amp;".NV_OP_VARIABLE."=filequeue");}list($number)=$db->sql_fetchrow($db->sql_query("SELECT COUNT(*) as number FROM `".NV_PREFIXLANG."_".$mod_data."_report`"));if($number>0){$pendinginfo[]=array('key'=>$lang_siteinfo['siteinfo_eror'],'value'=>$number,'link'=>NV_BASE_ADMINURL."index.php?".NV_NAME_VARIABLE."=".$mod."&amp;".NV_OP_VARIABLE."=report");}

?>