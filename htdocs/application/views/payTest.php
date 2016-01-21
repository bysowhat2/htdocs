
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/> 
    <title>微信支付样例-支付</title>
    <script type="text/javascript" src="../../../libs/jquery-2.1.3.js"></script>
    <script type="text/javascript">
		
    </script>
</head>
<body>
   <h1>您购买的商品为 iphone6s 16g</h1>
   <button id="pay">确认</button>
   
    
    <script type="text/javascript">
	
/*     
         获取用户openID API
    snsapi_userinfo
    snsapi_base
    href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx8cc15c84c45b1c5e&redirect_uri=http://www.yuebuting.com/index.php/waimai/index/10&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect">
*/

	
	$("#pay").click(function(){
		//var scope = 'snsapi_userinfo';
		var scope = 'snsapi_base';
		var appid = 'wx8cc15c84c45b1c5e';
		//$scope = 'snsapi_base';
		//必须与公众平台上设置的获取信息接口domain相同
		var redirect_uri = 'http://www.yuebuting.com/index.php/waimai/pay';
		
		var url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='+appid+'&redirect_uri='+redirect_uri+'&response_type=code&scope='+scope+'&state=1#wechat_redirect';
		window.location = url;
	});
    
    </script>
   
</body>
</html>


 