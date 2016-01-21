
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/> 
    <title>支付失败</title>
    <script type="text/javascript" src="../../../libs/jquery-2.1.3.js"></script>
   
</head>
<body>
 	<!-- 错误通知 -->
	<h1 id="error_info"></h1>	
	<a href="#">返回</a><!-- 支付前url -->
  
  	 <script type="text/javascript">
	 
	   var err_code = "<?php echo (isset($err_code)?$err_code:FALSE) ?>";
	   if(!err_code){
		   //未知支付错误
		   $("#error_info").text("未知错误");
	   } else {
		   //该订单已经支付了哦
		   if(err_code == "ORDERPAID"){
			   $("#error_info").text("该订单已经支付了哦");
		   } else {	
		   //订单君凌乱了呢，过会再试试呗
			   $("#error_info").text("订单君凌乱了呢，过会再试试呗");
		   }
	   }  
	
    </script>
   
</body>
</html>


 