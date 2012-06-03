<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_ADMIN'))die('Stop!!!');$content=filter_text_input('content','post','',1);$keywords=nv_get_keywords($content);include(NV_ROOTDIR."/includes/header.php");echo $keywords;include(NV_ROOTDIR."/includes/footer.php");

?>