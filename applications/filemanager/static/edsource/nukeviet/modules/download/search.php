<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_MOD_SEARCH'))die('Stop!!!');if(!nv_function_exists('nv_sdown_cats')){function nv_sdown_cats($module_data){global $db;$sql="SELECT `id`, `title`, `alias`, `who_view`, `groups_view` FROM `".NV_PREFIXLANG."_".$module_data."_categories` WHERE `status`=1";$result=$db->sql_query($sql);$list=array();while($row=$db->sql_fetchrow($result)){if(nv_set_allow($row['who_view'],$row['groups_view'])){$list[$row['id']]=array('id'=>( int )$row['id'],'title'=>$row['title'],'alias'=>$row['alias']);}}return $list;}}$list_cats=nv_sdown_cats($m_values['module_data']);$in=implode(",",array_keys($list_cats));$sql="SELECT SQL_CALC_FOUND_ROWS `alias`,`title`,`description`, `introtext`, `catid` \nFROM `".NV_PREFIXLANG."_".$m_values['module_data']."` \nWHERE `catid` IN (".$in.") \nAND (".nv_like_logic('title',$dbkeyword,$logic)." \nOR ".nv_like_logic('description',$dbkeyword,$logic)." \nOR ".nv_like_logic('introtext',$dbkeyword,$logic).") \nLIMIT ".$pages.",".$limit;$tmp_re=$db->sql_query($sql);$result=$db->sql_query("SELECT FOUND_ROWS()");list($all_page)=$db->sql_fetchrow($result);if($all_page){$link=NV_BASE_SITEURL."index.php?".NV_LANG_VARIABLE."=".NV_LANG_DATA."&amp;".NV_NAME_VARIABLE."=".$m_values['module_name'].'&amp;'.NV_OP_VARIABLE.'=';while(list($alias,$tilterow,$content,$introtext,$catid)=$db->sql_fetchrow($tmp_re)){$content=$content.' '.$introtext;$result_array[]=array('link'=>$link.$list_cats[$catid]['alias'].'/'.$alias,'title'=>BoldKeywordInStr($tilterow,$key,$logic),'content'=>BoldKeywordInStr($content,$key,$logic));}}

?>