<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_MOD_RSS'))die('Stop!!!');$rssarray=array();global $db_config;$result2=$db->sql_query("SELECT catid, parentid, ".NV_LANG_DATA."_title, ".NV_LANG_DATA."_alias FROM ".$db_config['prefix']."_".$mod_data."_catalogs ORDER BY `weight`,`order`");while(list($catid,$parentid,$title,$alias)=$db->sql_fetchrow($result2)){$rssarray[$catid]=array('catid'=>$catid,'parentid'=>$parentid,'title'=>$title,'link'=>NV_BASE_SITEURL."index.php?".NV_LANG_VARIABLE."=".NV_LANG_DATA."&amp;".NV_NAME_VARIABLE."=".$mod_name."&amp;".NV_OP_VARIABLE."=rss/".$alias);}

?>