<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_ADMIN'))die('Stop!!!');$path=nv_check_path_upload($nv_Request->get_string('path','post'));$check_allow_upload_dir=nv_check_allow_upload_dir($path);if(!isset($check_allow_upload_dir['delete_dir'])or $check_allow_upload_dir['delete_dir']!==true)die("ERROR_".$lang_module['notlevel']);if(empty($path)or $path==NV_UPLOADS_DIR)die("ERROR_".$lang_module['notlevel']);nv_delete_cache_upload($path);nv_deletefile(NV_ROOTDIR.'/'.$path,true);nv_loadUploadDirList(false);nv_insert_logs(NV_LANG_DATA,$module_name,$lang_module['deletefolder'],$path,$admin_info['userid']);echo "OK";

?>