<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_BUFFER_CLASS'))define('NV_BUFFER_CLASS',true);class NVbuffer{var $position=0;var $varname=null;function stream_open($path,$mode,$options,&$opened_path){$url=parse_url($path);$this->varname=$url["host"];$this->position=0;return true;}function stream_read($count){$ret=substr($GLOBALS[$this->varname],$this->position,$count);$this->position+=strlen($ret);return $ret;}function stream_write($data){if(!isset($GLOBALS[$this->varname]))$GLOBALS[$this->varname]='';$left=substr($GLOBALS[$this->varname],0,$this->position);$right=substr($GLOBALS[$this->varname],$this->position+strlen($data));$GLOBALS[$this->varname]=$left.$data.$right;$this->position+=strlen($data);return strlen($data);}function stream_tell(){return $this->position;}function stream_eof(){return $this->position>=strlen($GLOBALS[$this->varname]);}function stream_seek($offset,$whence){switch($whence){case SEEK_SET:if($offset<strlen($GLOBALS[$this->varname])&&$offset>=0){$this->position=$offset;return true;}else{return false;}break;case SEEK_CUR:if($offset>=0){$this->position+=$offset;return true;}else{return false;}break;case SEEK_END:if(strlen($GLOBALS[$this->varname])+$offset>=0){$this->position=strlen($GLOBALS[$this->varname])+$offset;return true;}else{return false;}break;default:return false;}}function stream_metadata($path,$option,$var){if($option==STREAM_META_TOUCH){$url=parse_url($path);$varname=$url["host"];if(!isset($GLOBALS[$varname])){$GLOBALS[$varname]='';}return true;}return false;}}

?>