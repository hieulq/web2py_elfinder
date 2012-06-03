<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_SYSTEM'))die('Stop!!!');if(!in_array($op,array('detail','result'))){define('NV_IS_MOD_VOTING',true);}if(!empty($array_op)){unset($matches);if(preg_match("/^result\-([0-9]+)$/",$array_op[0],$matches)){$id=( int )$matches[1];$op="result";}}

?>