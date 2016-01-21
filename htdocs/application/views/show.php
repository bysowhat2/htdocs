
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/> 
    <title>微信支付样例-支付2</title>
    <script type="text/javascript" src="../../../libs/jquery-2.1.3.js"></script>
    <script type="text/javascript">
	    //调用微信JS api 支付
	    function onBridgeReady(){
	    	   WeixinJSBridge.invoke(
	    	       'getBrandWCPayRequest',
	    	       <?php echo $result; ?>,
	    	       function(res){
		    	    	// 使用以上方式判断前端返回,微信团队郑重提示：res.err_msg将在用户支付成功后返回ok，但并不保证它绝对可靠。     
	    	           if(res.err_msg == "get_brand_wcpay_request：ok" ) {
		    	       } else {
		    	    	  // document.write(res.err_code+res.err_desc+res.err_msg);
		    	    	  window.history.go(-1); 
			    	   }     
	    	           
	    	       }
	    	   ); 
	    }

	    function callpay()
	    {
    		if (typeof WeixinJSBridge == "undefined"){
	    	   if( document.addEventListener ){
	    	       document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
	    	   }else if (document.attachEvent){
	    	       document.attachEvent('WeixinJSBridgeReady', onBridgeReady); 
	    	       document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
	    	   }
	    	}else{
	    	   onBridgeReady();
	    	} 
	    }
	    		    
	
    </script>
</head>
<body>
		<h1>金额：1分钱</h1>
		
		 <button  id="pay" style="width:210px; height:50px; border-radius: 15px;background-color:#FE6714; border:0px #FE6714 solid; cursor: pointer;  color:white;  font-size:16px;" type="button">
		 	立即支付
		 </button>
		 <script type="text/javascript">
		 $("#pay").click(function(){
			 callpay();
		});
		</script>

   
</body>
</html>


 