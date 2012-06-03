<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_MAINFILE'))die('Stop!!!');$rewrite["#([\"|\']".NV_BASE_SITEURL."index.php*\?)".NV_LANG_VARIABLE."=([a-z-]*)\&[amp;]*#"]="\\1\\3";$rewrite["#([\"|\']".NV_BASE_SITEURL."index.php)*\?".NV_LANG_VARIABLE."=([a-z-]*)([\"|\'])#"]="\\1\\3";$rewrite["#([\"|\'|\>]".$global_config['site_url']."/"."index.php*\?)".NV_LANG_VARIABLE."=([a-z-]*)\&[amp;]*#"]="\\1\\3";$rewrite["#([\"|\'|\>]".$global_config['site_url']."/"."index.php)*\?".NV_LANG_VARIABLE."=([a-z-]*)([\"|\'|\<])#"]="\\1\\3";

?>