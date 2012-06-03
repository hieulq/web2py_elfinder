<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_ADMIN'))die('Stop!!!');$title=filter_text_input('title','post','');$alias=change_alias($title);include(NV_ROOTDIR."/includes/header.php");echo $alias;include(NV_ROOTDIR."/includes/footer.php");

?>