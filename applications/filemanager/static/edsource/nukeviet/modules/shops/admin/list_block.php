<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_ADMIN'))die('Stop!!!');if(!defined('NV_IS_AJAX'))die('Wrong URL');$bid=$nv_Request->get_int('bid','get',0);$contents=nv_show_block_list($bid);include(NV_ROOTDIR."/includes/header.php");echo $contents;include(NV_ROOTDIR."/includes/footer.php");

?>