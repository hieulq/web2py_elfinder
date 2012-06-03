<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_ADMIN'))die('Stop!!!');$shopid=filter_text_input('id','get',0,1);$sql="SELECT cateid,".NV_LANG_DATA."_title FROM `".$db_config['prefix']."_".$module_data."_cateshops` WHERE shopid = ".$shopid;$result=$db->sql_query($sql);while(list($cateid_i,$title_i)=$db->sql_fetchrow($result)){echo "<option value=\"".$cateid_i."\">".$title_i."</option>\n";}

?>