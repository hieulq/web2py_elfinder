<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_MODULES'))die('Stop!!!');$mod=filter_text_input('mod','post');if(empty($mod)or!preg_match($global_config['check_module'],$mod))die("NO_".$mod);$sql="SELECT `in_menu` FROM `".NV_MODULES_TABLE."` WHERE `title`=".$db->dbescape($mod);$result=$db->sql_query($sql);$numrows=$db->sql_numrows($result);if($numrows!=1){die('NO_'.$mod);}$modfile=$site_mods[$mod]['module_file'];$include_file=NV_ROOTDIR."/modules/".$modfile."/funcs/main.php";if(file_exists($include_file)and filesize($include_file)!=0){$row=$db->sql_fetchrow($result);$in_menu=$row['in_menu']?0:1;}else{$in_menu=0;}$sql="UPDATE `".NV_MODULES_TABLE."` SET `in_menu`=".$in_menu." WHERE `title`=".$db->dbescape($mod);$db->sql_query($sql);nv_del_moduleCache('modules');include(NV_ROOTDIR."/includes/header.php");echo 'OK_'.$mod;include(NV_ROOTDIR."/includes/footer.php");

?>