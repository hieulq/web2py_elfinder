<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_MOD_FAQ'))die('Stop!!!');$channel=array();$items=array();$channel['title']=$global_config['site_name'].' RSS: '.$module_info['custom_title'];$channel['link']=NV_MY_DOMAIN.NV_BASE_SITEURL."index.php?".NV_LANG_VARIABLE."=".NV_LANG_DATA."&amp;".NV_NAME_VARIABLE."=".$module_name;$channel['description']=$global_config['site_description'];$list_cats=nv_list_cats();if(!empty($list_cats)){$catalias=isset($array_op[1])?$array_op[1]:"";$catid=0;if(!empty($catalias)){foreach($list_cats as $c){if($c['alias']==$catalias){$catid=$c['id'];break;}}}if($catid>0){$channel['title']=$global_config['site_name'].' RSS: '.$module_name.' - '.$list_cats[$catid]['title'];$channel['link']=NV_MY_DOMAIN.NV_BASE_SITEURL."index.php?".NV_LANG_VARIABLE."=".NV_LANG_DATA."&amp;".NV_NAME_VARIABLE."=".$module_name."&amp;".NV_OP_VARIABLE."=".$list_cats[$catid]['alias'];$channel['description']=$list_cats[$catid]['description'];$sql="SELECT `id`, `catid`, `title`, `question`, `addtime` \n        FROM `".NV_PREFIXLANG."_".$module_data."` WHERE `catid`=".$catid." \n        AND `status`=1 ORDER BY `weight` ASC LIMIT 30";}else{$in=array_keys($list_cats);$in=implode(",",$in);$sql="SELECT `id`, `catid`, `title`, `question`, `addtime` \n        FROM `".NV_PREFIXLANG."_".$module_data."` WHERE `catid` IN (".$in.") \n        AND `status`=1 ORDER BY `weight` ASC LIMIT 30";}if($module_info['rss']){if(($result=$db->sql_query($sql))!==false){while(list($id,$cid,$title,$question,$addtime)=$db->sql_fetchrow($result)){$items[]=array('title'=>$title,'link'=>NV_MY_DOMAIN.NV_BASE_SITEURL."index.php?".NV_LANG_VARIABLE."=".NV_LANG_DATA."&amp;".NV_NAME_VARIABLE."=".$module_name."&amp;".NV_OP_VARIABLE."=".$list_cats[$cid]['alias']."#faq".$id,'guid'=>$module_name.'_'.$id,'description'=>$lang_module['faq_question'].": ".$question,'pubdate'=>$addtime );}}}}nv_rss_generate($channel,$items);die();

?>