<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_MAINFILE'))die('Stop!!!');iconv_set_encoding('input_encoding',$global_config['site_charset']);iconv_set_encoding('internal_encoding',$global_config['site_charset']);iconv_set_encoding('output_encoding',$global_config['site_charset']);function nv_internal_encoding($encoding){return iconv_set_encoding('internal_encoding',$encoding);}function nv_strlen($string){global $global_config;return iconv_strlen($string,$global_config['site_charset']);}function nv_substr($string,$start,$length){global $global_config;return iconv_substr($string,$start,$length,$global_config['site_charset']);}function nv_substr_count($haystack,$needle){$needle=preg_quote($needle,'/');preg_match_all('/'.$needle.'/u',$haystack,$dummy);return sizeof($dummy[0]);}function nv_strpos($haystack,$needle,$offset=0){global $global_config;return iconv_strpos($haystack,$needle,$offset,$global_config['site_charset']);}function nv_strrpos($haystack,$needle,$offset=0){global $global_config;return iconv_strrpos($haystack,$needle,$offset,$global_config['site_charset']);}function nv_strtolower($string){include(NV_ROOTDIR.'/includes/utf8/lookup.php');return strtr($string,$utf8_lookup['strtolower']);}function nv_strtoupper($string){include(NV_ROOTDIR.'/includes/utf8/lookup.php');return strtr($string,$utf8_lookup['strtoupper']);}

?>