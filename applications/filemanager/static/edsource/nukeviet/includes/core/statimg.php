<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_MAINFILE'))die('Stop!!!');if($global_config['online_upd']){list($online)=$db->sql_fetchrow($db->sql_query("SELECT COUNT(*) FROM `".NV_SESSIONS_GLOBALTABLE."` WHERE `onl_time` >= ".(NV_CURRENTTIME-NV_ONLINE_UPD_TIME)));$online=str_pad($online,3,"0",STR_PAD_LEFT);}else{$online="Hits";}$result=$db->sql_query("SELECT `c_count` FROM `".NV_COUNTER_TABLE."` WHERE `c_type` = 'total' AND `c_val`= 'hits'");list($hits)=$db->sql_fetchrow($result);$hits=str_pad($hits,8,"0",STR_PAD_LEFT);$image=ImageCreateFromPNG(NV_ROOTDIR."/images/banner88x31.png");$text_color1=ImageColorAllocate($image,50,50,50);$text_color2=ImageColorAllocate($image,255,255,255);$font=NV_ROOTDIR.'/includes/fonts/visitor2.ttf';$font_size=10;$y_value1=12;$x_value1=25;$y_value2=26;$x_value2=5;imagettftext($image,$font_size,0,$x_value1,$y_value1,$text_color1,$font,$online);imagettftext($image,$font_size,0,$x_value2,$y_value2,$text_color2,$font,$hits);Header("Content-type: image/png");imagepng($image);ImageDestroy($image);die();

?>