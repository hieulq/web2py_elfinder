<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_ADMIN'))die('Stop!!!');$id=$nv_Request->get_string('list','post,get');$id=explode(',',$id);foreach($id as $value){$sql="UPDATE `".NV_PREFIXLANG."_".$module_data."_rows` SET topicid=0 WHERE id='$value'";$result=$db->sql_query($sql);}echo $lang_module['topic_delete_success'];

?>