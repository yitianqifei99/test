<?php
header('Content-type: text/html;charset=UTF-8');
/** https请求（支持GET和POST） */
function https_request($url, $data = null) {
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	if (!empty($data)) {
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	}
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($curl);
	curl_close($curl);
	return $output;
}

$url = 'http://192.168.18.111/eoc_api/index.php';
//$url = 'http://192.168.18.13/eoc_api/index.php';

$str = '{"callin_fee_type":"1","callout_fee_type":"1","callin_rate":"0.100","callout_rate":"0.100","outbound_caller_rem":"0","inbound_caller_rem":"0","seat_count":"19","fifo_count":"20","hot_number_id":"4008812531","fee_total":"200.000","black_on":0,"auto_satisfy_direction":2,"business_state":1,"is_record":"0","satisfy_type":1,"satisfy_start_bell":1,"satisfy_end_bell":3,"company_code":"1000001","enterprise_id":"1","func_name":"enterprise_busi_set"}';
$data = json_decode($str, true);
$rt = https_request($url, $data);
if(is_string($rt)) {
	$rt = json_decode($rt, true);
}

var_dump($rt);
//var_export($rt);

?>