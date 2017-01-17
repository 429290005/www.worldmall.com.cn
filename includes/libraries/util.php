<?php
//签名函数 
function createSign ($paramArr, $appSecret) {
    ksort($paramArr);
    $stringToBeSigned = $appSecret;
    foreach ($paramArr as $k => $v)
    {
    	if("@" != substr($v, 0, 1))
    	{
    		$stringToBeSigned .= "$k$v";
    	}
    }
    unset($k, $v);
    $stringToBeSigned .= $appSecret;
    
    return strtoupper(md5($stringToBeSigned));
}

//组参函数 
function createStrParam ($paramArr) { 
    $strParam = '';
    foreach ($paramArr as $key => $val) { 
       if ($key != '' && $val !='') {
           $strParam .= $key.'='.urlencode($val).'&'; 
       } 
    } 
    return $strParam; 
} 

//解析xml函数
function getXmlData ($strXml) {
	$pos = strpos($strXml, 'xml');
	if ($pos) {
		$xmlCode=simplexml_load_string($strXml,'SimpleXMLElement', LIBXML_NOCDATA);
		$arrayCode=get_object_vars_final($xmlCode);
		return $arrayCode ;
	} else {
		return '';
	}
}

function get_object_vars_final($obj){
	if(is_object($obj)){
		$obj=get_object_vars($obj);
	}
	if(is_array($obj)){
		foreach ($obj as $key=>$value){
			$obj[$key]=get_object_vars_final($value);
		}
	}
	return $obj;
}

function curl($url, $postFields = null)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_FAILONERROR, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	if (is_array($postFields) && 0 < count($postFields))
	{
		$postBodyString = "";
		$postMultipart = false;
		foreach ($postFields as $k => $v)
		{
			if("@" != substr($v, 0, 1))//判断是不是文件上传
			{
				$postBodyString .= "$k=" . urlencode($v) . "&"; 
			}
			else//文件上传用multipart/form-data，否则用www-form-urlencoded
			{
				$postMultipart = true;
			}
		}
		unset($k, $v);
		curl_setopt($ch, CURLOPT_POST, true);
		if ($postMultipart)
		{
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
		}
		else
		{
			curl_setopt($ch, CURLOPT_POSTFIELDS, substr($postBodyString,0,-1));
		}
	}
	$reponse = curl_exec($ch);
	
	if (curl_errno($ch))
	{
		throw new Exception(curl_error($ch),0);
	}
	else
	{
		$httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if (200 !== $httpStatusCode)
		{
			throw new Exception($reponse,$httpStatusCode);
		}
	}
	curl_close($ch);
	return $reponse;
}
?>