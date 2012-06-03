<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_SITEINFO'))die('Stop!!!');$lang_siteinfo=nv_get_lang_module($mod);list($number)=$db->sql_fetchrow($db->sql_query("SELECT COUNT(*) as number FROM `".NV_PREFIXLANG."_".$mod_data."_send` where `is_read`= 0"));if($number>0){$pendinginfo[]=array('key'=>$lang_siteinfo['siteinfo_new'],'value'=>$number,'link'=>NV_BASE_ADMINURL."index.php?".NV_NAME_VARIABLE."=".$mod);}

?>