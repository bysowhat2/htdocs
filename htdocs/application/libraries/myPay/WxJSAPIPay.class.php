<?php


//发起JSAPI支付的类
class WxJSAPIPay {
	
	//发起请求的基本参数
	private $code;
	
	function __construct($code) {
		$this->$code = $code;
	}
	
	
	/*
	 * 根据code获取用户openid*
	 * 
	 */
	private function get_user_openid(){
		if(!empty($this->code)){
			//由code 得到 access_token
			//https://api.weixin.qq.com/sns/oauth2/access_token?appid=APPID&secret=SECRET&code=CODE&grant_type=authorization_code
			//获取access_token 和 openid
			$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx8cc15c84c45b1c5e&secret=3a112b2555bb7a916141be1b5bb4986f&code=".$this->$code."&grant_type=authorization_code";
			$result = $this->httpGet($url);
			$result = json_decode($result);
			$openid = isset($result->openid)?$result->openid:0;
			return $openid;
		} else {
			return FALSE;
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//获取用户openid
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
	}
}

?>