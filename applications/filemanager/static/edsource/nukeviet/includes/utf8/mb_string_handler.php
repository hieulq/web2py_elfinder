<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_MAINFILE'))die('Stop!!!');mb_internal_encoding($global_config['site_charset']);mb_http_output($global_config['site_charset']);function nv_internal_encoding($encoding){return mb_internal_encoding($encoding);}function nv_strlen($string){global $global_config;return mb_strlen($string,$global_config['site_charset']);}function nv_substr($string,$start,$length){global $global_config;return mb_substr($string,$start,$length,$global_config['site_charset']);}function nv_substr_count($haystack,$needle){return mb_substr_count($haystack,$needle);}function nv_strpos($haystack,$needle,$offset=0){global $global_config;return mb_strpos($haystack,$needle,$offset,$global_config['site_charset']);}function nv_strrpos($haystack,$needle,$offset=0){global $global_config;return mb_strrpos($haystack,$needle,$offset,$global_config['site_charset']);}function nv_strtolower($string){global $global_config;return mb_strtolower($string,$global_config['site_charset']);}function nv_strtoupper($string){global $global_config;return mb_strtoupper($string,$global_config['site_charset']);}

?>