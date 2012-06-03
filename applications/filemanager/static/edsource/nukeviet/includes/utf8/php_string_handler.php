<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_MAINFILE'))die('Stop!!!');function nv_internal_encoding($encoding){return false;}function nv_strlen($string){return preg_match_all('/./u',$string,$tmp);}function nv_substr($string,$start,$length){$nv_strlen=nv_strlen($string);if($start<0)$start=$nv_strlen+$start;if($length<0)$length=$nv_strlen-$start+$length;$xlen=$nv_strlen-$start;$length=($length>$xlen)?$xlen:$length;preg_match('/^.{'.$start.'}(.{0,'.$length.'})/us',$string,$tmp);return(isset($tmp[1]))?$tmp[1]:false;}function nv_substr_count($haystack,$needle){$needle=preg_quote($needle,'/');preg_match_all('/'.$needle.'/u',$haystack,$dummy);return sizeof($dummy[0]);}function nv_strpos($haystack,$needle,$offset=0){$offset=($offset<0)?0:$offset;if($offset>0){preg_match('/^.{'.$offset.'}(.*)/us',$haystack,$dummy);$haystack=(isset($dummy[1]))?$dummy[1]:'';}$p=strpos($haystack,$needle);if($haystack==''or $p===false)return false;$r=$offset;$i=0;while($i<$p){if(ord($haystack[$i])<128){$i=$i+1;}else{$bvalue=decbin(ord($haystack[$i]));$i=$i+strlen(preg_replace('/^(1+)(.+)$/','\1',$bvalue));}++$r;}return $r;}function nv_strrpos($haystack,$needle,$offset=null){if($offset===null){$ar=explode($needle,$haystack);if(sizeof($ar)>1){array_pop($ar);$haystack=join($needle,$ar);return nv_strlen($haystack);}return false;}else{if(!is_int($offset)){trigger_error('nv_strrpos expects parameter 3 to be long',E_USER_WARNING);return false;}$haystack=nv_substr($haystack,$offset);if(false!==($pos=nv_strrpos($haystack,$needle))){return $pos+$offset;}return false;}}function nv_strtolower($string){include(NV_ROOTDIR.'/includes/utf8/lookup.php');return strtr($string,$utf8_lookup['strtolower']);}function nv_strtoupper($string){include(NV_ROOTDIR.'/includes/utf8/lookup.php');return strtr($string,$utf8_lookup['strtoupper']);}

?>