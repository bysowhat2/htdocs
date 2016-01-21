<?php


//发起JSAPI支付的类
class WxJSAPIPay {
	
	//发起请求的基本参数
	private $code;
	private $pay_key;
	private $parameters = array();
	
	
	
	
	
	
	function __construct($code) {
		$this->code = $code;
		$this->pay_key = 'Z2jNdoj5o73BvTvOTQsIl79lxnKm5y3v';
		$this->parameters['nonce_str'] = $this->getRandChar(32);//随机字符串,自己定义
		$this->parameters['appid'] = 'wx8cc15c84c45b1c5e';//公众账号ID
		$this->parameters['mch_id'] = '1288052501';//商户号
	}
	
	/*
	 * get请求
	 * url 请求地址
	 */
	private function httpGet($url='')
	{
		//HTTP Get
		//初始化
		$ch = curl_init();
		//设置选项，包括URL
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		//执行并获取HTML文档内容
		$output = curl_exec($ch);
		//释放curl句柄
		curl_close($ch);
		//打印获得的数据
		//print_r($output);
		return $output;
	}
	
	/*
	 * get请求
	* $url 请求地址
	* $post_data 请求参数
	*/
	private function httpPost($url='', $post_data)
	{
	
		//HTTP Post
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		//1 如果成功只将结果返回，不自动输出返回的内容。如果失败返回FALSE
		//0 如果成功只返回TRUE，自动输出返回的内容。 如果失败返回FALSE
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// post数据
		curl_setopt($ch, CURLOPT_POST, 1);
		// post的变量
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		$output = curl_exec($ch);
		curl_close($ch);
		//打印获得的数据
		//print_r($output);
		return $output;
	}
	
	/*
	 * 生成n位随机字符串(数字或字母），长度为$length
	 */
	public function getRandChar($length){
		$str = null;
		$strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
		$max = strlen($strPol)-1;
	
		for($i=0;$i<$length;$i++){
			$str .= $strPol[rand(0,$max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
		}
	
		return $str;
	}
	
	
	/*
	 * 将多个参数加密为sign
	 */
	public function createSign($parameters = NULL)
	{
		if($parameters == NULL){
			$parameters = $this->parameters;
		}
		
		
		//step 1 按key排序
		ksort($parameters);
		reset($parameters);
		$signPars = '';
		while(list($k, $v) = each($parameters)){
			if('' === $v) continue;
			$signPars .= $k . '=' . $v . '&';
		}
		//step 2 key 放在最后
		$signPars = $signPars.'key='.$this->pay_key;
		//setp 3 md5 encrypt
		$sign = strtoupper(MD5($signPars));
	//	var_dump($sign);exit;
		return $sign;
	}
	
	/*
	 * 设置参数
	 * key 参数名 
	 * value 参数值
	 */
	public function set_parameters($key, $value){
		//if($key == ''){
			
		//}
		/* if($key == 'nonce_str' || $key == 'appid' || $key == 'mch_id')
			return FALSE;
		else  */
			$this->parameters[$key] = $value;
		
	}
	
	/*
	 * 获取参数值
	* key 参数名
	* value 参数值
	*/
	public function get_parameters($key){
		if(isset($this->parameters[$key])/*  && $key != 'nonce_str' && $key != 'appid' && $key != 'mch_id' */){
			return $this->parameters[$key];
		} else {
			return FALSE;
		}
	}
	
	
	/*
	 * 根据code获取用户openid*
	 * 
	 */
	public function get_user_openid(){
		if(!empty($this->code)){
			//由code 得到 access_token
			//https://api.weixin.qq.com/sns/oauth2/access_token?appid=APPID&secret=SECRET&code=CODE&grant_type=authorization_code
			//获取access_token 和 openid
			$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx8cc15c84c45b1c5e&secret=3a112b2555bb7a916141be1b5bb4986f&code=".$this->code."&grant_type=authorization_code";
			$result = $this->httpGet($url);
			$result = json_decode($result);
			$openid = isset($result->openid)?$result->openid:0;
			return $openid;
		} else {
			return FALSE;
		}
	}
	
	/*
	 * 通过统一下单接口，获取prepay_id
	 */
	public function get_prepay_id(){
		$textTpl = "<xml>
							<openid><![CDATA[%s]]></openid>
							<appid><![CDATA[%s]]></appid>
							<mch_id><![CDATA[%s]]></mch_id>
							<spbill_create_ip>%s</spbill_create_ip>
							<nonce_str><![CDATA[%s]]></nonce_str>
							<body><![CDATA[%s]]></body>
							<out_trade_no><![CDATA[%s]]></out_trade_no>
							<total_fee><![CDATA[%d]]></total_fee>
							<notify_url><![CDATA[%s]]></notify_url>
							<trade_type><![CDATA[%s]]></trade_type>
							<sign><![CDATA[%s]]></sign>
	
					</xml>";
		$resultStr = sprintf($textTpl, $this->parameters['openid'], $this->parameters['appid'], $this->parameters['mch_id'],
				$this->parameters['spbill_create_ip'], $this->parameters['nonce_str'], $this->parameters['body'],
				$this->parameters['out_trade_no'],$this->parameters['total_fee'],
				$this->parameters['notify_url'],$this->parameters['trade_type'], $this->parameters['sign']);  //xml参数
	
		$url = 'https://api.mch.weixin.qq.com/pay/unifiedorder';//统一下单接口
		//post请求，无需证书
		$resultXML = $this->httpPost($url, $resultStr);
	
		//解析返回的xml数据
		libxml_disable_entity_loader(true);
		$postObj = simplexml_load_string($resultXML, 'SimpleXMLElement', LIBXML_NOCDATA);
		$prepay_id = isset($postObj->prepay_id) ? $postObj->prepay_id : false;
	
	
		//重复订单返回return_code 也是success,只能靠是否有prepay_id判断成功与否
		if($prepay_id === FALSE){
			return array(FALSE, $postObj);
		} else {
			return array(TRUE, $prepay_id);
		}
	
	
	}
}

	
	
	
	
	
	
	
	
	
	
	
	
	
	
/* 	//获取用户openid
	$data['code'] = isset($_GET['code'])?$_GET['code']:0;//由payTest.php得到code
	//redirect->error
	$openid = $this->get_user_openid($data['code']);
	
	
	//支付参数
	$pay_key = 'Z2jNdoj5o73BvTvOTQsIl79lxnKm5y3v';//pay key 支付页面设置
	$parameters = array();
	$parameters['appid'] = 'wx8cc15c84c45b1c5e';//公众账号ID
	$parameters['mch_id'] = '1288052501';//商户号
	$parameters['spbill_create_ip'] = $_SERVER['REMOTE_ADDR'];//终端ip
	//$parameters['nonce_str'] = '60uf9sh6nmppr9azveb2bn7arhy79izk';//随机字符串,自己定义
	$parameters['nonce_str'] = $this->getRandChar(32);
	$parameters['body'] = 'Iphone6s16G';//随机字符串,自己定义
	//$parameters['out_trade_no'] = '123456789';//商户订单号 32个字符内的数字字母//相同订单号不能重复发起支付
	$parameters['out_trade_no'] = $this->getRandChar(32);//商户订单号 32个字符内的数字字母//相同订单号不能重复发起支付
	$parameters['total_fee'] = 1;//总金额（分）,int型
	$parameters['notify_url'] = 'www.yuebuting.com';//接收微信支付异步通知回调地址，通知url必须为直接可访问的url，不能携带参数。
	$parameters['trade_type'] = 'JSAPI';//公众号支付
	$parameters['openid'] = $openid;//用户标识
	
	$parameters['sign'] = $this->createSign($parameters, $pay_key);//签名
	if($parameters['sign'] === false){
		//redirect->error
	}
	
	//获取prepay_id
	$prepay_id = $this->get_prepay_id($parameters);
	if($prepay_id[0] === FALSE){//失败
		$data['err_code'] = $prepay_id[1]->err_code;
		//$data['err_code_des'] = $prepay_id[1]->err_code_des;
		$this->load->view('showError', $data);
	} else {//成功获取prepay_id
		$prepay_id = $prepay_id[1];
		$parameters2 = array(
				'appId' => $parameters['appid'],
				'timeStamp' => (string)(time()+28800),//当前时间戳（秒），北京时间，东八区
				'nonceStr' => $parameters['nonce_str'],
				'package' => 'prepay_id='.$prepay_id,
				'signType' => 'MD5',
		);
		//不同于$parameters['sign']，每一次请求带sign的都是重新根据这次请求的参数生成的新sign
		$parameters2['paySign'] = $this->createSign($parameters2, $pay_key);
			
			
		$data['result'] = json_encode($parameters2);
		$this->load->view('show', $data);
	} */

?>
	