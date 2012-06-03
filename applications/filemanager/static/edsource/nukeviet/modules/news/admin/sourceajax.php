<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_ADMIN'))die('Stop!!!');$q=filter_text_input('q','get',"",1);if(empty($q))return;$sql="SELECT title, link FROM `".NV_PREFIXLANG."_".$module_data."_sources` WHERE  `title` LIKE '%".$db->dblikeescape($q)."%' OR `link` LIKE '%".$db->dblikeescape($q)."%' ORDER BY `weight` ASC";$result=$db->sql_query($sql);while(list($title,$link)=$db->sql_fetchrow($result)){echo "".$title."\n";echo "".$link."\n";}

?>