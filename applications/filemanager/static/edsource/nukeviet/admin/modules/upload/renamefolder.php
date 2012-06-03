<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_ADMIN'))die('Stop!!!');$path=nv_check_path_upload($nv_Request->get_string('path','post'));$newname=nv_string_to_filename(htmlspecialchars(trim($nv_Request->get_string('newname','post')),ENT_QUOTES));$check_allow_upload_dir=nv_check_allow_upload_dir($path);if(!isset($check_allow_upload_dir['rename_dir'])or $check_allow_upload_dir['rename_dir']!==true)die("ERROR_".$lang_module['notlevel']);if(empty($path)or $path==NV_UPLOADS_DIR)die("ERROR_".$lang_module['notlevel']);if(empty($newname))die("ERROR_".$lang_module['rename_nonamefolder']);unset($matches);preg_match("/(.*)\/(.*)$/",$path,$matches);if(!isset($matches)or empty($matches))die("ERROR_".$lang_module['notlevel']);$newpath=$matches[1].'/'.$newname;if(is_dir(NV_ROOTDIR.'/'.$newpath))die("ERROR_".$lang_module['folder_exists']);nv_delete_cache_upload($path);@rename(NV_ROOTDIR.'/'.$path,NV_ROOTDIR.'/'.$newpath);nv_loadUploadDirList(false);nv_insert_logs(NV_LANG_DATA,$module_name,$lang_module['renamefolder'],$path." -> ".$newpath,$admin_info['userid']);echo $newpath;

?>