<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_MAINFILE'))die('Stop!!!');function nv_delete_cache($pattern){if($dh=opendir(NV_ROOTDIR."/".NV_CACHEDIR)){while(($file=readdir($dh))!==false){if(preg_match($pattern,$file)){unlink(NV_ROOTDIR."/".NV_CACHEDIR."/".$file);}}closedir($dh);}}function nv_delete_all_cache(){$pattern="/(.*)\.cache/";nv_delete_cache($pattern);}function nv_del_moduleCache($module_name,$lang=NV_LANG_DATA){$pattern="/^".$lang."\_".$module_name."\_(.*)\.cache$/i";nv_delete_cache($pattern);}function nv_get_cache($filename){if(empty($filename)or!preg_match("/(.*)\.cache/",$filename))return false;$filename=basename($filename);if(!file_exists(NV_ROOTDIR."/".NV_CACHEDIR."/".$filename))return false;return nv_gz_get_contents(NV_ROOTDIR."/".NV_CACHEDIR."/".$filename);}function nv_set_cache($filename,$content){if(empty($filename)or!preg_match("/(.*)\.cache/",$filename))return false;$filename=basename($filename);return nv_gz_put_contents(NV_ROOTDIR."/".NV_CACHEDIR."/".$filename,$content);}function nv_db_cache($sql,$key='',$modname='',$lang=NV_LANG_DATA){global $db,$module_name;$list=array();if(empty($sql))return $list;if(empty($modname))$modname=$module_name;$cache_file=$lang."_".$modname."_".md5($sql)."_".NV_CACHE_PREFIX.".cache";if(($cache=nv_get_cache($cache_file))!=false){$list=unserialize($cache);}else{if(($result=$db->sql_query($sql))!==false){$a=0;while($row=$db->sql_fetch_assoc($result)){$key2=(!empty($key)and isset($row[$key]))?$row[$key]:$a;$list[$key2]=$row;++$a;}$db->sql_freeresult($result);$cache=serialize($list);nv_set_cache($cache_file,$cache);}}return $list;}

?>