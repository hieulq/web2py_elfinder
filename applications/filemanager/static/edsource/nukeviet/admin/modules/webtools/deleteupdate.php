<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_WEBTOOLS'))die('Stop!!!');$contents="Error Access!!!";$checksess=filter_text_input('checksess','get','');if($checksess==md5($global_config['sitekey'].session_id())and file_exists(NV_ROOTDIR.'/install/update_data.php')){$contents="";$list_file_docs=nv_scandir(NV_ROOTDIR.'/install',"/^update_docs_([a-z]{2})\.html$/");foreach($list_file_docs as $docsfile){$check_del=nv_deletefile(NV_ROOTDIR.'/install/'.$docsfile);if($check_del[0]==0){$contents.=$check_del[1].' '.$lang_module['update_manual_delete'];}}$check_delete_file=nv_deletefile(NV_ROOTDIR.'/install/update_data.php');if($check_delete_file[0]==0){$contents.=$check_delete_file[1].' '.$lang_module['update_manual_delete'];}if(file_exists(NV_ROOTDIR.'/install/update')){$check_delete_dir=nv_deletefile(NV_ROOTDIR.'/install/update',true);if($check_delete_dir[0]==0){$contents.=$check_delete_dir[1].' '.$lang_module['update_manual_delete'];}}$list_file_logs=nv_scandir(NV_ROOTDIR.'/'.NV_DATADIR,"/^config_update_NVUD([0-9]+)\.php$/");foreach($list_file_logs as $logsfile){$check_del=nv_deletefile(NV_ROOTDIR.'/'.NV_DATADIR.'/'.$logsfile);if($check_del[0]==0){$contents.=$check_del[1].' '.$lang_module['update_manual_delete'];}}clearstatcache();}if($contents=="")$contents="OK";include(NV_ROOTDIR."/includes/header.php");echo $contents;include(NV_ROOTDIR."/includes/footer.php");

?>