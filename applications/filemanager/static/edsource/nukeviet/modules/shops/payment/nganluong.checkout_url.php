<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_MOD_SHOPS'))die('Stop!!!');require_once(NV_ROOTDIR."/modules/".$module_file."/payment/nganluong.class.php");$receiver=$payment_config['receiver_pay'];$return_url=$global_config['site_url']."/?".NV_LANG_VARIABLE."=".NV_LANG_DATA."&".NV_NAME_VARIABLE."=".$module_name."&".NV_OP_VARIABLE."=complete&payment=nganluong";$price=$data['order_total'];$price_vn=intval(CurrencyConversionToNumber($price,$pro_config['money_unit'],"VND"));$order_code=$data['order_code'];$transaction_info=$data['order_note'];$nl=new NL_Checkout($payment_config['checkout_url'],$payment_config['merchant_site'],$payment_config['secure_pass']);$url=$nl->buildCheckoutUrl($return_url,$receiver,$transaction_info,$order_code,$price_vn);$url.="&key_refer=5c429fb7cc74299b5d1e53fb0906b8cb";

?>