<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_MOD_RSS'))die('Stop!!!');$rssarray=array();$sql="SELECT `catid`, `parentid`, `title`, `alias` FROM `".NV_PREFIXLANG."_".$mod_data."_cat` ORDER BY `weight`, `order`";$list=nv_db_cache($sql,'',$mod_name);foreach($list as $value){$value['link']=NV_BASE_SITEURL."index.php?".NV_LANG_VARIABLE."=".NV_LANG_DATA."&amp;".NV_NAME_VARIABLE."=".$mod_name."&amp;".NV_OP_VARIABLE."=rss/".$value['alias'];$rssarray[]=$value;}

?>