<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once dirname(__FILE__).'/../libraries/WxJSAPIPay.class.php';//绝对路径了

class Waimai extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($pg=1)
	{
		/*
		$data['path'] = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, __FILE__);;
		if($pg == 1)
			$this->load->view('waimai1',$data);
		if($pg == 2)
			$this->load->view('waimai2',$data);
		if($pg == 3)
			$this->load->view('waimai3',$data);
		if($pg == 4)
			$this->load->view('waimai4',$data);
		if($pg == 5)
			$this->load->view('waimai5',$data);
		if($pg == 6)
			$this->load->view('waimai6',$data);
		if($pg == 7)
			$this->load->view('waimai7',$data);
		if($pg == 8)
			$this->load->view('waimai8',$data);
		if($pg == 99)
			$this->load->view('a',$data);
		*/
		//外卖页面
		//订座
		if($pg == 1)
			$this->load->view('waimai1');
		//菜单
		if($pg == 2)
			$this->load->view('waimai2');
		if($pg == 3)
			$this->load->view('waimai3');
		if($pg == 4)
			$this->load->view('waimai4');

		//支付页面
		if($pg == 10)
			$this->load->view('payTest');
		//支付页面 步骤2
		if($pg == 11)
			$this->load->view('payTest-2');
	}
	
	public function test($pg=1)
	{
		$this->load->view('a.html');
	}
	
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
	
	private function getRandChar($length){
		$str = null;
		$strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
		$max = strlen($strPol)-1;
	
		for($i=0;$i<$length;$i++){
			$str .= $strPol[rand(0,$max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
		}
	
		return $str;
	}
	
	private function createSign($parameters, $pay_key)//生成sign
	{
		//step 1 按key排序
		ksort($parameters);
		reset($parameters);
		$signPars = '';
		while(list($k, $v) = each($parameters)){
			if('' === $v) continue;
			$signPars .= $k . '=' . $v . '&';
		}
		//step 2 key 放在最后
		$signPars = $signPars.'key='.$pay_key;
		//setp 3 md5 encrypt
		$sign = strtoupper(MD5($signPars));
		return $sign;	
	}
	
	//根据code获取用户信息
	private function get_user_info($code='0'){
		//由code 得到 access_token
		//https://api.weixin.qq.com/sns/oauth2/access_token?appid=APPID&secret=SECRET&code=CODE&grant_type=authorization_code
		
		//获取access_token 和 openid
		$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx8cc15c84c45b1c5e&secret=3a112b2555bb7a916141be1b5bb4986f&code=".$code."&grant_type=authorization_code";
		$result = $this->httpGet($url);
		$result = json_decode($result);
		$openid = isset($result->openid)?$result->openid:0;
		$access_token = isset($result->access_token)?$result->access_token:0;
	
		
		//获取用户信息
		$url = "https://api.weixin.qq.com/sns/userinfo?access_token=".$access_token."&openid=".$openid;
		$result = $this->httpGet($url);
		$result = json_decode($result);
		
		return $result;
		/* $nickname = isset($result->nickname)?$result->nickname:0;
		$headimgurl = isset($result->headimgurl)?$result->headimgurl:0; */
	}
	
	//根据code获取用户openid
	private function get_user_openid($code='0'){
		//由code 得到 access_token
		//https://api.weixin.qq.com/sns/oauth2/access_token?appid=APPID&secret=SECRET&code=CODE&grant_type=authorization_code
		//获取access_token 和 openid
		$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx8cc15c84c45b1c5e&secret=3a112b2555bb7a916141be1b5bb4986f&code=".$code."&grant_type=authorization_code";
		$result = $this->httpGet($url);
		$result = json_decode($result);
		$openid = isset($result->openid)?$result->openid:0;
		return $openid;
	}
	
	private function get_prepay_id($parameters){
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
		$resultStr = sprintf($textTpl, $parameters['openid'], $parameters['appid'], $parameters['mch_id'],
				$parameters['spbill_create_ip'], $parameters['nonce_str'], $parameters['body'],
				$parameters['out_trade_no'],$parameters['total_fee'],
				$parameters['notify_url'],$parameters['trade_type'], $parameters['sign']);  //xml参数
		
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
	
	private function logError($message){
		date_default_timezone_set('Asia/Shanghai');
		$info = array(
				'message' => $message,
				'ip' =>	$_SERVER['REMOTE_ADDR']
		);
		$path = dirname(__FILE__).'/../logs/'.date('y-m-d-H-i-s').'_log.html';
		error_log(json_encode($info) , 3, $path);
	}
	
	public function pay($value='0')
	{
		//获取用户openid
		$data['code'] = isset($_GET['code'])?$_GET['code']:FALSE;//由payTest.php得到code
		if($data['code'] === FALSE){//无code处理
			$this->logError('code is FALSE');
			$this->load->view('payError.php');
			return;
		}
		$jsAPIPay = new WxJSAPIPay($data['code']);
		$openid = $jsAPIPay->get_user_openid();//获取openid
		if($openid === FALSE){
			$this->logError('openid is FALSE');
			$this->load->view('payError.php');
			return;
		}
		
		//支付参数
		$parameters = array();
		$jsAPIPay->set_parameters('spbill_create_ip', $_SERVER['REMOTE_ADDR']);//终端ip
		$jsAPIPay->set_parameters('body', 'Iphone6s16G');//商品描述
		$jsAPIPay->set_parameters('out_trade_no', '1234567890');//商户订单号 32个字符内的数字字母//相同订单号不能重复发起支付
		$jsAPIPay->set_parameters('total_fee', 1);//总金额（分）,int型
		$jsAPIPay->set_parameters('notify_url', 'www.yuebuting.com');//接收微信支付异步通知回调地址，通知url必须为直接可访问的url，不能携带参数。
		$jsAPIPay->set_parameters('trade_type', 'JSAPI');//公众号支付
		$jsAPIPay->set_parameters('openid', $openid); //用户标识
		$jsAPIPay->set_parameters('sign', $jsAPIPay->createSign());
		
		if($jsAPIPay->get_parameters('sign') === false){
			$this->logError('sign is FALSE');
			$this->load->view('payError.php');
		}
		
		$prepay_id = $jsAPIPay->get_prepay_id();//获取prepay_id
		
		if($prepay_id[0] === FALSE){//失败
			$data['err_code'] = $prepay_id[1]->err_code;
			$this->load->view('showError', $data);
		} else {//成功获取prepay_id
			$prepay_id = $prepay_id[1];
			$parameters2 = array(
					'appId' => $jsAPIPay->get_parameters('appid'),
					'timeStamp' => (string)(time()+28800),//当前时间戳（秒），北京时间，东八区
					'nonceStr' => $jsAPIPay->get_parameters('nonce_str'),
					'package' => 'prepay_id='.$prepay_id,
					'signType' => 'MD5',
			);
			
			//不同于$parameters['sign']，每一次请求带sign的都是重新根据这次请求的参数生成的新sign
			$parameters2['paySign'] = $jsAPIPay->createSign($parameters2);
			$data['result'] = json_encode($parameters2);
			$this->load->view('show', $data);
		}
	}
	
	
}
