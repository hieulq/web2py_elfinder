<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_MOD_SEARCH'))die('Stop!!!');$sql="SELECT SQL_CALC_FOUND_ROWS `id`,`catid`, `title`, `alias`, `description` \nFROM `".NV_PREFIXLANG."_".$m_values['module_data']."_rows` \nWHERE (".nv_like_logic('title',$dbkeyword,$logic)." \nOR ".nv_like_logic('url',$dbkeyword,$logic)." \nOR ".nv_like_logic('description',$dbkeyword,$logic).") \nLIMIT ".$pages.",".$limit;$tmp_re=$db->sql_query($sql);$result=$db->sql_query("SELECT FOUND_ROWS()");list($all_page)=$db->sql_fetchrow($result);if($all_page){$array_cat_url=array();$array_cat_url[0]=NV_BASE_SITEURL."index.php?".NV_LANG_VARIABLE."=".NV_LANG_DATA."&amp;".NV_NAME_VARIABLE."=".$m_values['module_name']."&amp;".NV_OP_VARIABLE."=other";$sql_cat="SELECT `catid`, `alias` FROM `".NV_PREFIXLANG."_".$m_values['module_data']."_cat`";$re_cat=$db->sql_query($sql_cat);while(list($catid,$alias)=$db->sql_fetchrow($re_cat)){$array_cat_url[$catid]=NV_BASE_SITEURL."index.php?".NV_LANG_VARIABLE."=".NV_LANG_DATA."&amp;".NV_NAME_VARIABLE."=".$m_values['module_name']."&amp;".NV_OP_VARIABLE."=".$alias;}while(list($id,$catid,$tilterow,$alias,$content)=$db->sql_fetchrow($tmp_re)){$result_array[]=array('link'=>$array_cat_url[$catid].'/'.$alias,'title'=>BoldKeywordInStr($tilterow,$key,$logic),'content'=>BoldKeywordInStr($content,$key,$logic));}}

?>