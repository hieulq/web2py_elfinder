<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_MOD_WEBLINKS'))die('Stop!!!');$channel=array();$items=array();$channel['title']=$global_config['site_name'].' RSS: '.$module_info['custom_title'];$channel['link']=NV_MY_DOMAIN.NV_BASE_SITEURL."index.php?".NV_LANG_VARIABLE."=".NV_LANG_DATA."&amp;".NV_NAME_VARIABLE."=".$module_name;$channel['description']=$global_config['site_description'];$catid=0;if(isset($array_op[1])){$alias_cat_url=$array_op[1];$cattitle="";foreach($global_array_cat as $catid_i=>$array_cat_i){if($alias_cat_url==$array_cat_i['alias']){$catid=$catid_i;break;}}}if(!empty($catid)){$channel['title']=$global_config['site_name'].' RSS: '.$module_info['custom_title'].' - '.$global_array_cat[$catid]['title'];$channel['link']=NV_MY_DOMAIN.NV_BASE_SITEURL."index.php?".NV_LANG_VARIABLE."=".NV_LANG_DATA."&amp;".NV_NAME_VARIABLE."=".$module_name."&amp;".NV_OP_VARIABLE."=rss/".$alias_cat_url;$channel['description']=$global_array_cat[$catid]['description'];$sql="SELECT id, catid, add_time, title, alias, description, urlimg FROM `".NV_PREFIXLANG."_".$module_data."_rows` WHERE catid='".$catid."' AND status='1' ORDER BY id ASC LIMIT 30";}else{$sql="SELECT id, catid, add_time, title, alias, description, urlimg FROM `".NV_PREFIXLANG."_".$module_data."_rows` WHERE status='1' ORDER BY id ASC LIMIT 30";}if($module_info['rss']){$result=$db->sql_query($sql);while(list($id,$catid_i,$publtime,$title,$alias,$hometext,$homeimgfile)=$db->sql_fetchrow($result)){$rimages=(!empty($homeimgfile))?"<img src=\"".NV_BASE_SITEURL.NV_UPLOADS_DIR."/$homeimgfile\" width=\"100\" align=\"left\" border=\"0\">":"";$catalias=$global_array_cat[$catid_i]['alias'];$items[]=array('title'=>$title,'link'=>NV_MY_DOMAIN.NV_BASE_SITEURL."index.php?".NV_LANG_VARIABLE."=".NV_LANG_DATA."&amp;".NV_NAME_VARIABLE."=".$module_name."&amp;".NV_OP_VARIABLE."=".$catalias.'/'.$alias.'-'.$id,'guid'=>$module_name.'_'.$id,'description'=>$rimages.$hometext,'pubdate'=>$publtime );}}nv_rss_generate($channel,$items);die();

?>