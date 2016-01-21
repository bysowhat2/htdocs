<?php
define ( "TOKEN", "ourDREAM" );
function checkSignature() {
	$signature = $_GET ["signature"];
	$timestamp = $_GET ["timestamp"];
	$nonce = $_GET ["nonce"];
	
	
	$token = TOKEN;
	$tmpArr = array (
			$token,
			$timestamp,
			$nonce 
	);
	// use SORT_STRING rule
	sort ( $tmpArr, SORT_STRING );
	$tmpStr = implode ( $tmpArr );
	$tmpStr = sha1 ( $tmpStr );
	
	if ($tmpStr == $signature) {
		return true;
	} else {
		return false;
	}
}

//不符合验证，不会是配置或用户信息
if(checkSignature() == false)
	exit;

//只有进行服务器配置时才有这个参数
//配置的情况
$echoStr = isset($_GET ["echostr"])?$_GET ["echostr"]:null;
if($echoStr){
	echo $echoStr;
	exit();
}

//用户信息的情况

//get post data, May be due to the different environments
$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

//extract post data
if (!empty($postStr)){
	/* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
	 the best way is to check the validity of xml by yourself */
	libxml_disable_entity_loader(true);
	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
	$fromUsername = $postObj->FromUserName;
	$toUsername = $postObj->ToUserName;
	$content = trim($postObj->Content);
	
	$time = time();
	$retMsg = $content;
	//html 模板
	$textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[text]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $retMsg);
	//返回response
	echo $resultStr;
	
}
		
?>



























