<html xmlns="http://www.w3.org/1999/xhtml">
<!--STATUS OK-->
<head>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<meta http-equiv="Cache-control" content="no-cache" />
	<script type="text/javascript" src="../../../libs/jquery-2.1.3.js"></script>
<style type="text/css">

body {
	display:-webkit-box;
    display: box;
	-webkit-box-orient: vertical;
	box-orient: vertical;
	-webkit-box-pack:justify;
 	box-pack:justify;
	-webkit-box-align: center;
	box-align: center;
	
	background:url(../../../img/mysweepstake_background.png);
	background-size:100% 100%;
	
	margin:0px;
}


#space {
	-webkit-box-flex:60;
    box-flex:60;
	height: 260px;
	width: 100%;
}


#pintu {
	height: 630px;
	width: 630px;	
	overflow: hidden;
}

.imgbg {
	display:inline-block;
	width: 200px;
	height: 200px;
	background-color:rgba(0,0,0,1.0);
	margin: 5px;
	overflow: hidden;
	
	position: relative;
	top: -5px;
	left: -5px;

}

.img .imgbg {
	display: -webkit-box;
    display: box;
	-webkit-box-pack: center;
 	box-pack: center;
	-webkit-box-align: center;
	box-align: center;
}

.row{
	-webkit-box-flex:1;
    box-flex:1;
	
	width: 100%;
	font-size: 0;
}

.row .img {
	display:inline-block;
	width:200px;
	height:200px;
	border: 5px solid rgb(20,180,96);
	margin: 0px;
	background:url(../../../img/sweepstake.jpg);
	background-size:600px;

}

#wenan {
	-webkit-box-flex: 38;
    box-flex: 38;
	
    width: 100%;
	margin-top:40px;
	
	display: -webkit-box;
    display: box;
	-webkit-box-pack: center;
 	box-pack: center;
	-webkit-box-align: center;
	box-align: center;
	
}

#wenan p {
	font-size: 38px;
	color: white;
	margin:0px;
}

#wenan p span{
	color: rgb(253,218,17);
}

#duihuan {
	-webkit-box-flex:130;
    box-flex:130;

	height:130px;
} 

#duihuan img{
	height:100%;
}

#chakan {
	-webkit-box-flex:56;
    box-flex:56;
	
	width:100%;
	
	display: -webkit-box;
    display: box;
	-webkit-box-pack: center;
 	box-pack: center;
	-webkit-box-align: center;
	box-align: center;
}

#chakan p {
	font-size: 38px;
	color: yellow;
	margin: 0px;
}

p {
	font-family:SimSun;
}

#piece0 {
	background-position:0px 0px;
}

#piece1 {
	background-position:-200px 0px;
}

#piece2 {
	background-position:-400px 0px;
}

#piece3 {
	background-position:0px -200px;
}

#piece4 {
	background-position:-200px -200px;
}

#piece5 {
	background-position:-400px -200px;
}

#piece6 {
	background-position:0px 200px;
}

#piece7 {
	background-position:-200px 200px;
}

#piece8 {
	background-position:-400px 200px;
}


div .xuhao {
	z-index:2;
	width: 60px;
	height: 60px;
	border-radius: 60px;
	background: rgb(20,180,96);
	text-align: center;
}

div .xuhao span {
	font-size: 45px;
	line-height: 60px;
	color: white;
}

</style>
	<title>拼图拼奖拼人气</title>
</head>
<body>
	
	<div id="space"></div><!-- 文案的上方空白  240px -->
	
	<div id="pintu">
		<div id="row1" class="row">
			<div class="img" id="piece0"/><div class="imgbg"><div class="xuhao"><span>1</span></div></div></div>
			<div class="img" id="piece1"/><div class="imgbg"><div class="xuhao"><span>2</span></div></div></div>
			<div class="img" id="piece2"/><div class="imgbg"><div class="xuhao"><span>3</span></div></div></div>
			<!-- 与拼图重叠，使其变暗 <div class="imgbg"></div>-->
		</div>
		<div id="row2" class="row">
			<div class="img" id="piece3"/><div class="imgbg"><div class="xuhao"><span>4</span></div></div></div>
			<div class="img" id="piece4"/><div class="imgbg"><div class="xuhao"><span>5</span></div></div></div>
			<div class="img" id="piece5"/><div class="imgbg"><div class="xuhao"><span>6</span></div></div></div>	
		</div>
		<div id="row3" class="row">
			<div class="img" id="piece6"/><div class="imgbg"><div class="xuhao"><span>7</span></div></div></div>
			<div class="img" id="piece7"/><div class="imgbg"><div class="xuhao"><span>8</span></div></div></div>
			<div class="img" id="piece8"/><div class="imgbg"><div class="xuhao"><span>9</span></div></div></div>
		</div>
	</div><!--拼图  408px-->
	
	 
	
	<div id="wenan">
		<p>您可以兑换<span>奖品1</span>，还差<span>5</span>块拼图即可兑换！</p>
	</div><!-- 文案：您可以兑换。。。 24px -->
	
	
	<div id="duihuan">
		<a><img src="../../../img/lijiduihuan.png" alt="我的拼图"/></a>
	</div><!-- 立即兑换 76px-->
	
	<div id="chakan">
		<p>活动规则</p>
	</div><!-- 活动规则 30 -->
	
	
	
	
	
	
	
	
	<script>
		//将制定拼图块变暗
		//piece数组，分别对应9块拼图，1代表明亮，0代表暗
		var dark = [1,1,1,1,1,1,0,0,0];
		//var piece0 = document.getElementById("piece0");
		//piece0.style.opacity = 0.3;
		for(var i = 0 ;i < dark.length; i++) {
			//获取拼图姓名 如 piece2
			var name = "#piece" + i;
			if(dark[i] == 1) {
				//拼图为明亮的
				name += " .imgbg"
				$(name).css("background-color","rgba(0,0,0,0.0)");
				//序号为白底绿字
				//选择class为“序号”的div
				name += " .xuhao";
				$(name).css("background","white");
				//选择旗下的span
				name += " span";
				$(name).css("color","rgb(20,180,96)");
			} else {
				//$(name).css("opacity","0.3");
				name += " .imgbg"
				$(name).css("background-color","rgba(0,0,0,0.7)");
				//序号为白底绿字
				//选择class为“序号”的div
				name += " .xuhao";
				$(name).css("background","rgb(20,180,96)");
				//选择旗下的span
				name += " span";
				$(name).css("color","white");
			}
		}
	</script>
</body>
</html>
















