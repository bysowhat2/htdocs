<html xmlns="http://www.w3.org/1999/xhtml">
<!--STATUS OK-->
<head>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<meta http-equiv="Cache-control" content="no-cache" />
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
	
	<link href="../../../libs/glDatePicker/glDatePicker.default.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="../../../libs/jquery-2.1.3.js"></script>
	<script type="text/javascript" src="../../../libs/iscroll.js"></script>
	
	


<style type="text/css">


body {
	
	
	color: #333; text-align: center; font: 12px "微软雅黑"; 
	margin:0px;
}

.menu-wraper{
	background-color:rgb(232,232,232);
	left:0;
	top:3.2em;
	width:100%;
	height:10%;
	
	display:-webkit-box;
    display: box;
	-webkit-box-pack:justify;
 	box-pack:justify;
	-webkit-box-align: center;
	box-align: center;
}

.menu-wraper .item{
	margin-right:10px;
	margin-left:10px;
	border-radius: 0.2em;
	border: 1px solid #ff3535;
	width:70px;
	height:30px;
	
    cursor: pointer;
	
	display:-webkit-box;
    display: box;
	-webkit-box-pack:center;
 	box-pack:center;
	-webkit-box-align: center;
	box-align: center;
}

.menu-wraper .item.active{
	background: #ff3535;
    color: #fff;
}

.list-wraper{
	width:100%;	
	height:80%;
	
	
	display:-webkit-box;
    display: box;
	-webkit-box-pack:justify;
 	box-pack:justify;
	-webkit-box-align: center;
	box-align: center;
}

.bar-wraper{
	display:-webkit-box;
    display: box;
	-webkit-box-orient: vertical;
	box-orient: vertical;
	-webkit-box-pack:start;
 	box-pack:start;
	-webkit-box-align: center;
	box-align: center;
	
	height:100%;
	width:20%;
	background-color: rgb(232,232,232);
}


.item-wraper{
	width:80%;
	height:100%;
	overflow: hidden;
}

.bottom-wraper{
	height:10%;
	width:100%;
	background-color: rgb(232,232,232);
}

.bar-wraper .item{
	color: #2f2f2f;
	height:50px;
	width: 100%;
	display:-webkit-box;
    display: box;
	-webkit-box-pack:center;
 	box-pack:center;
	-webkit-box-align: center;
	box-align: center;
}

.bar-wraper .item.active{
	border-left: 0.2em solid #ff3535;
    background: white;
}

.item-wraper .item{
	border-bottom: 1px solid #999;
}

.item-wraper .item .l
{
    float: left;
    height: 3.3em;
    width: 3.3em;
    margin-top: 0.6em;
    margin-left: 0.2em;
}

.item-wraper .item .mod2
{
    padding-top: 0.3em;
    overflow: hidden;
    border-bottom: 1px solid #999;
    padding-left: 0.5em;
    padding-bottom: 0.3em;
}

.item-wraper .item .mod2 .clear_fix
{
   zoom: 1;
}

.item-wraper .item .mod2 span
{
    float: left;
    width: 7.2em;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}
.item-wraper .item .mod2 .price{
	float:right;
}


.mod2 .choose-amount {
    line-height: 1.7em;
    font-size: 0.9em;
}

.mod2 .whole {
    float: right;
}

.mod2 p {
    line-height: 1.6em;
    font-size: 0.9em;
}

.item-wraper .item .mod2 .control{
	margin: 1.2em 0.3em;
}
.item-wraper .item .mod2 .control span
{
    border-radius: 0.2em;
	border: 1px solid #f95656; 
    width: 2.2em;
    overflow: hidden;
}

.bottom-wraper{
	display:-webkit-box;
    display: box;
	-webkit-box-orient: vertical;
	box-orient: vertical;
	-webkit-box-pack:center;
 	box-pack:center;
	-webkit-box-align: center;
	box-align: center;
}
.bottom-wraper a {
	text-decoration: none;
    color: #fff;
}

.bottom-wraper .btnok{
	background: #ff3535;
    background-size: cover;
    width: 3.9375em;
    height: 1.6em;
    border-radius: 0.4em;
}


@media screen and (max-width: 319px) {
    body{font-size: 14px;};
}
@media screen and (min-width: 320px) and (max-width: 479px) {
    body{font-size: 16px;};
}
@media screen and (min-width: 480px) and (max-width: 639px) {
    /*480*/
    body{font-size: 24px;}
}
@media screen and (min-width: 640px) {
    body{font-size:32px;}
}


</style>
	<title>点菜</title>
</head>
<body>
    <!-- 订座日期 -->
	
	<div class="menu-wraper" id="menuWraper">
	        <div class="item active" desction="特色">海鲜</div>
	        <div class="item " desction="菜品">菜品</div>
	        <div class="item " desction="酒水">酒水</div>
	        <div class="item" desction="其它">其它</div>
	    
	</div>
	
	<div class="list-wraper">
		<div class="bar-wraper">
			 <div class="item">分类1</div>
		     <div class="item "  >分类2</div>
		     <div class="item " >分类3</div>
		     <div class="item ">分类4</div>
		</div>
		<div class="item-wraper" id="item-wraper">
			<div class="item-wraper-inner" style="" id="item-wraper-inner">
		
			</div>
		</div>
	</div>
	
	<div class="bottom-wraper">
		<div class="total">
        	<span class="l">共计<span class="num">0</span>个菜 &nbsp;&nbsp;</span>
            <span class="r">￥0.00</span>
        </div>
        <div class="btnok">
        	<a>选好了</a>
        </div>
	</div>
	
	
	<script type="text/javascript">
		//记录每个菜单的数据
	    //最多4个大分类，每个大分类最多10个小分类（bar),每个小分类最多20个菜品
		var arrAll = new Array(4);
		for(var i=0;i<arrAll.length;i++){
			arrAll[i] = new Array(10);
			for(var j=0;j<arrAll[i].length;j++){
				arrAll[i][j] = new Array(20);
				for(var k=0;k<arrAll[i][j].length;k++){
					arrAll[i][j][k] = new Array(2);
					//数量
					arrAll[i][j][k][0] = 0;
					//对应的价格
					arrAll[i][j][k][1] = 0;
				}
			}
		}

		//所有菜的个数
		var numberAll = 0;
		//所有菜的总价
		var priceAll = 0.0;
		
		//指定当前是第几个大分类
		var dafenleiIndex = 0;
		//指定当前是第几个中分类（bar)
		var zhongfenleiIndex = 0;
		//指定当前是第几个小分类(菜品）
		var xiaofenleiIndex = 0;

		
		//菜单区滑动 （.item-wraper）iscroll
		$(document).ready(function(){
			var myscroll=new iScroll("item-wraper");
			//首先显示第一个大分类下第一个中分类的内容
			$(".menu-wraper .item:first-child").click();
		});


		
		//菜单区域的“+-”
		function caidanAction(){
			//加减号更改数量
			//加号
			$("#item-wraper-inner .item .control span:first-child").each(function(index){
				$(this).click(function(){
					//alert(index+"+");
					var $number = $($("#item-wraper-inner .item .control span:nth-child(2)")[index]);
					var number = parseInt($number.text());
					number++;
					$number.text(number);

					//记录数量到全局数组
					arrAll[dafenleiIndex][zhongfenleiIndex][index][0] = number;

					var price = $number.parent().parent().parent().parent().find(".price").text();
					price = parseFloat(price);
					
					//记录该数量对应的价格到全局数组
					arrAll[dafenleiIndex][zhongfenleiIndex][index][1] = price;

					//计算价格和数量
					numberPriceAll();
				});
			});
	
			//减号
			$("#item-wraper-inner .item .control span:nth-child(3)").each(function(index){
				$(this).click(function(){
					//alert(index+"+");
					var $number = $($("#item-wraper-inner .item .control span:nth-child(2)")[index]);
					var number = parseInt($number.text());
					number = (number <= 1)?(number = 0):(number -= 1);				
					$number.text(number);

					//记录数量到全局数组
					arrAll[dafenleiIndex][zhongfenleiIndex][index] = number;
	
					numberPriceAll();
				});
			});
		}

		//数量
		//所有item的数量的数组
		function numberPriceAll(){
		
			numberAll = 0;
			priceAll = 0;
			
			//根据数组，计算所有菜的个数和总价
			for(var i=0;i<arrAll.length;i++){
				for(var j=0;j<arrAll[i].length;j++){
					for(var k=0;k<arrAll[i][j].length;k++){
						//数量
						numberAll += arrAll[i][j][k][0];					 
						//对应的价格
						priceAll += arrAll[i][j][k][0] * arrAll[i][j][k][1];
					}
				}
			}

			//更改.bottom-wraper 中的数值
			$(".bottom-wraper .num").text(numberAll);
			$(".bottom-wraper .r").text(Math.round(priceAll*10)/10);

			
		}


		//切换顶部 .menu-wraper
		var $menu= $(".menu-wraper .item");
		$menu.each(function(index){
			$(this).click(function(){
				//当前是第几个大分类
				dafenleiIndex = index;
				
				//去掉所有item的 .active
				for(var i=0;i<$menu.length;i++){
					$($menu[i]).removeClass("active");
				}

				//当前被点击的增加'active'
				$($menu[index]).addClass("active");
				//更改响应侧边栏.bar-wrape 的内容
				//侧边栏的内容
				var sideBar = ['分类'+index,'分类'+index,'分类'+index,'分类'+index];

				//根据侧边栏内容数组，生成对应个数的侧边栏选项
				//清空之前的侧边栏内容
				$(".bar-wraper .item").remove();
				//生成新侧边栏
				for(var i=0;i<sideBar.length;i++){
					barItemShow(sideBar[i]);
				}
				//为侧边栏添加点击事件：生成菜单区域
				barAction();


				//自动显示第一个分类(bar)
				$(".list-wraper .bar-wraper .item:first-child").click();

				
			});
		});

		//根据sidebar item 生成item的html
        function barItemShow(item){
			//item模板
        	var itemHtml1 = '<div class="item ">';
            var itmeHtml2 = '</div>';
            
            //将item1的值与模板相加
        	var itemHtml = itemHtml1 + item + itmeHtml2;
        	
        	$(".bar-wraper").append(itemHtml);
        }

        //左边框Action
        function barAction(){
			//点击左侧bar的item（每一个分类） .bar-wrape，刷新菜单内容
	        $(".bar-wraper .item").each(function(index){
	            $(this).click(function(){
		            //指定当前是第几个中分类
		            zhongfenleiIndex = index;

					//去掉其它item所有的active
		            $(".bar-wraper .item").each(function(index){
						$(this).removeClass("active");
			        });
					//增加类 ’active'
					$(this).addClass("active");
		           
		           	//自动生成菜单中每个item的html
	        		var item1 ={
	        		                 "imgSrc":"http://cater.haidilao.com//Cater/images/dishes/020103/10004.png",
	        		                 "name":"清油麻辣火锅",
	        		                 "price":"68.0"  
	        		           };
	
	        		var item0 ={
	                        "imgSrc":"http://cater.haidilao.com//Cater/images/dishes/020103/10053.png",
	                        "name":"菌汤火锅",
	                        "price":"68.1"  
	                  };

	        		//items数组（菜单内容）
		            var items = [item1,item0];  
		            
	                //清空原有内容
	        		$(".item-wraper-inner div").remove();
	                //生成新内容

	                for(var i=0;i<items.length;i++){
	        			itemShow(items[i],i);
	                }
	                
	                //为菜单栏添加点击事件
	                caidanAction();	
	               
	            });
	         });
        }
		
		
		//根据item1 生成item的html
		//读取arrAll相应位置的值arrAll[dafenleiIndex][zhongfenleiIndex][index][0],index就是小分类
        function itemShow(item,index){
			//item模板
        	var itemHtml1 = '<div class="item"><img class="l image" src=';
            var itmeHtml2 = '><div class="mod2"><div class="wraper clear_fix"><span class="name">';
            var itemHtml3 = '</span><span class="price">';
            var itemHtml4 = '</span></div><div class="choose-amount clear_fix" dishid="10053_020103"  dishname="菌汤火锅" dishunit="锅" unitprice="68.00"><div class="whole"><div class="control"><span>+</span><span>'
                itemHtml5 = '</span><span>-</span></div></div></div></div></div>';
            //将item1的值与模板相加
        	var itemHtml = itemHtml1 + item.imgSrc + itmeHtml2 + item.name + itemHtml3 + item.price + itemHtml4+arrAll[dafenleiIndex][zhongfenleiIndex][index][0]+itemHtml5;
        	
        	$(".item-wraper-inner").append(itemHtml);
        }


		
		
			
	</script>
</body>
</html>























