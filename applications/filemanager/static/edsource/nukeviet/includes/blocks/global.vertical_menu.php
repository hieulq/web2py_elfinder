<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_MAINFILE'))die('Stop!!!');global $nv_vertical_menu;$content="";if(!empty($nv_vertical_menu)){$content.="<div id=\"ver_menu\">\n";foreach($nv_vertical_menu as $menu){$content.=($menu[2])?"<a href=\"".$menu[1]."\" class=\"current\">".$menu[0]."</a>\n":"<a href=\"".$menu[1]."\">".$menu[0]."</a>\n";if(!empty($menu['submenu'])){foreach($menu['submenu']as $sub_menu){$content.=($sub_menu[2])?"<a href=\"".$sub_menu[1]."\" class=\"sub_current\">".$sub_menu[0]."</a>\n":"<a href=\"".$sub_menu[1]."\" class=\"sub_normal\">".$sub_menu[0]."</a>\n";}}}$content.="</div>\n";}

?>