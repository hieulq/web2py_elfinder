<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_MAINFILE'))die('Stop!!!');if(!function_exists('nv_cart_info')){function nv_cart_info($block_config){$module=$block_config['module'];$bid=$block_config['bid'];$content='
        <div class="block clearfix">
			<div class="block_cart clearfix" id="cart_'.$module.'"></div>
		    <script type="text/javascript">
			$("#cart_'.$module.'").load(\''.NV_BASE_SITEURL."index.php?".NV_LANG_VARIABLE."=".NV_LANG_DATA."&".NV_NAME_VARIABLE."=".$module."&".NV_OP_VARIABLE."=loadcart".'\');
			</script>
		</div>
        ';return $content;}}if(defined('NV_SYSTEM')){$content=nv_cart_info($block_config);}

?>