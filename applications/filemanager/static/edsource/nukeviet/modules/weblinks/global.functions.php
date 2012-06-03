<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_MAINFILE'))die('Stop!!!');function _substr($str,$length,$minword=3){$sub='';$len=0;foreach(explode(' ',$str)as $word){$part=(($sub!='')?' ':'').$word;$sub.=$part;$len+=strlen($part);if(isset($word{$minword})&&isset($sub{$length-1})){break;}}return $sub.((isset($str{$len}))?'...':'');}

?>