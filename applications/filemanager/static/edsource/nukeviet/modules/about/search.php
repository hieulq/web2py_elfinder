<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_MOD_SEARCH'))die('Stop!!!');$sql="SELECT SQL_CALC_FOUND_ROWS `id`,`title`,`alias`,`bodytext` \nFROM `".NV_PREFIXLANG."_".$m_values['module_data']."` \nWHERE `status`=1 AND (".nv_like_logic('title',$dbkeyword,$logic)." \nOR ".nv_like_logic('bodytext',$dbkeyword,$logic).") \nLIMIT ".$pages.",".$limit;$tmp_re=$db->sql_query($sql);$result=$db->sql_query("SELECT FOUND_ROWS()");list($all_page)=$db->sql_fetchrow($result);if($all_page){$link=NV_BASE_SITEURL."index.php?".NV_LANG_VARIABLE."=".NV_LANG_DATA."&amp;".NV_NAME_VARIABLE."=".$m_values['module_name'].'&amp;'.NV_OP_VARIABLE.'=';while(list($id,$tilterow,$alias,$content)=$db->sql_fetchrow($tmp_re)){$url=$link.$alias."-".$id;$result_array[]=array('link'=>$url,'title'=>BoldKeywordInStr($tilterow,$key,$logic),'content'=>BoldKeywordInStr($content,$key,$logic));}}

?>