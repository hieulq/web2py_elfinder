<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_ADMIN'))die('Stop!!!');$sql="SELECT * FROM `".NV_PREFIXLANG."_".$module_d."_cat` ORDER BY `order` ASC";$result=$db->sql_query($sql);While($row=$db->sql_fetchrow($result)){$t_sp="";if($row['lev']>0){for($i=1;$i<=$row['lev'];++$i){$t_sp.='&nbsp;&nbsp;&nbsp;&nbsp;';}}$arr_cat[$row['catid']]=array('module'=>$module,'key'=>$row['catid'],'title'=>$t_sp.$row['title'],'alias'=>$row['alias'],);}

?>