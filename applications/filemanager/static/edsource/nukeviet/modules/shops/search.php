<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_MOD_SEARCH'))die('Stop!!!');$sql="SELECT SQL_CALC_FOUND_ROWS `id`,`".NV_LANG_DATA."_title`,`".NV_LANG_DATA."_alias`,`listcatid`,`".NV_LANG_DATA."_hometext`,`".NV_LANG_DATA."_bodytext` \nFROM `".$db_config['prefix']."_".$m_values['module_data']."_rows` \nWHERE (".nv_like_logic(NV_LANG_DATA.'_title',$dbkeyword,$logic)." \nOR ".nv_like_logic('product_code',$dbkeyword,$logic)." \nOR ".nv_like_logic(NV_LANG_DATA.'_bodytext',$dbkeyword,$logic)." \nOR ".nv_like_logic(NV_LANG_DATA.'_hometext',$dbkeyword,$logic).") \nAND ( `publtime` < ".NV_CURRENTTIME." AND (`exptime`=0 OR `exptime`>".NV_CURRENTTIME.") ) \nLIMIT ".$pages.",".$limit;$tmp_re=$db->sql_query($sql);$result=$db->sql_query("SELECT FOUND_ROWS()");list($all_page)=$db->sql_fetchrow($result);if($all_page){$array_cat_alias=array();$array_cat_alias[0]="other";$sql_cat="SELECT `catid`, `".NV_LANG_DATA."_alias` FROM `".$db_config['prefix']."_".$m_values['module_data']."_catalogs`";$re_cat=$db->sql_query($sql_cat);while(list($catid,$alias)=$db->sql_fetchrow($re_cat)){$array_cat_alias[$catid]=$alias;}$link=NV_BASE_SITEURL."index.php?".NV_LANG_VARIABLE."=".NV_LANG_DATA."&amp;".NV_NAME_VARIABLE."=".$m_values['module_name'].'&amp;'.NV_OP_VARIABLE.'=';while(list($id,$tilterow,$alias,$listcatid,$hometext,$bodytext)=$db->sql_fetchrow($tmp_re)){$content=$hometext.$bodytext;$catid=explode(",",$listcatid);$catid=end($catid);$url=$link.$array_cat_alias[$catid].'/'.$alias."-".$id;$result_array[]=array('link'=>$url,'title'=>BoldKeywordInStr($tilterow,$key,$logic),'content'=>BoldKeywordInStr($content,$key,$logic));}}

?>