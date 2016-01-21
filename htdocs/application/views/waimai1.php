<html xmlns="http://www.w3.org/1999/xhtml">
<!--STATUS OK-->
<head>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<meta http-equiv="Cache-control" content="no-cache" />
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
	
	<link href="../../../libs/glDatePicker/glDatePicker.default.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="../../../libs/jquery-2.1.3.js"></script>
	<script type="text/javascript" src="../../../libs/glDatePicker/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../../../libs/glDatePicker/glDatePicker.min.js"></script>
	
	


<style type="text/css">


body {
	display:-webkit-box;
    display: box;
	-webkit-box-orient: vertical;
	box-orient: vertical;
	-webkit-box-pack:start;
 	box-pack:start;
	-webkit-box-align: center;
	box-align: center;
	
	color: #333; text-align: center; font: 12px "微软雅黑"; 
	margin:0px;
}

.clear_fix {
	overflow: hidden;
}
#date{
	width:100%;
	height:220px;	
}

#time {
	background: #fff;padding: 1em 0;border-bottom: 1px solid #d8d8d8;
}
#time .btn-date{
	position:relative;
	float: left;
	line-height: 2.7em;
	width:6em;
	color: #ff3535;
	border: 1px solid #ff3535;
	text-align: center;
	border-radius: 0.2em;
}

#time .chooseTime{
	opacity:0;
	position: absolute;
	width: 100%;
	height:100%;
	left: 0;
	top: 0;
	font-size:1em;
	background: #fff;
	text-align: center;
	line-height: 2em;
	border-top:1px solid #bfbfbf;
	border-bottom: 1px solid #bfbfbf;
}

#time .m{
	float: left;
	margin:0 0.5em;
	line-height: 1.2em;
	font-size: 2em;
	color: #ff3535; 
	font-weight:bold;
	text-align: center;
}


#number{
	margin:0.5em 0; 
	background: #fff; 
	border-bottom: 1px solid #d8d8d8;
	border-top: 1px solid #d8d8d8;
	width: 100%;
}

#number .l{
	float: left;
}

#number .members{
	position:relative; 
	padding: 0.9em 0.8em;
}

#number .icon {
	float: right;
	width: 6px;
	height:1.5em;
	background: url(../../../img/arrow_right.png) 0 50% no-repeat;
}

#number .choose{
	opacity:0;position: absolute;width: 100%;height:100%;left: 0;top: 0;font-size:1em;background: #fff;text-align: center;line-height: 2em;border-top:1px solid #bfbfbf;border-bottom: 1px solid #bfbfbf;
}

.line{
	padding:0.6em  0.6em 0.5em 0;border-bottom: 1px solid #d8d8d8;  height:2.3em;
}

#telephone, #name {
	width: 100%;
}

#telephone .telephone{
	float: left;border: none;line-height: 2em;font-size:1em;width:50%;
}

#name .name{
	float: left;border: none;line-height: 2em;font-size:1em;width:50%;
}

#name .btn{
	float: right;width: 4em;border: 1px solid #626262;color: #626262; text-align: center;border-radius: 0.2em;cursor: pointer;    height: 2em;
    line-height: 2em;
}

#name .btn.active{
	border: 1px solid #ff3535;color: #ff3535;
}

#others .comment{
	font-size:1em;line-height: 2em;border:none;width:99%;
}

#submit{
	bottom: 1em;
	/*position: fixed;*/
	width:100%;
}

#submit .t-btn-show{
	margin:0;font-size: 13px;float: left;width: 45%;height: 2.3em;line-height: 2.3em;border: 1px solid #f95656;color: #f95656;text-align: center;cursor: pointer;background: #fff;border-radius: 0.2em;
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
	<title>填写订座信息</title>
</head>
<body>
    <!-- 订座日期 -->
	<div id="date">
		
		<div gldp-el="mydate" style="width:100%; height:200px;"> </div>
		<span>订餐日期</span><input type="text" id="mydate" gldp-id="mydate" />
		
	</div>
	
	<!-- 订座时间 -->
	<div id="time">
		<div class="btn-date" desction="时选择">
                <span class="l" id="classselHour">时</span>
                <select class="chooseTime" id="selec-hour">
                		<option class="hour-item" value="09">09</option>
                		<option class="hour-item" value="10">10</option>
                		<option class="hour-item" value="11">11</option>
                		<option class="hour-item" value="12">12</option>
                		<option class="hour-item" value="13">13</option>
                		<option class="hour-item" value="14">14</option>
                		<option class="hour-item" value="15">15</option>
                		<option class="hour-item" value="16">16</option>
                		<option class="hour-item" value="17">17</option>
                		<option class="hour-item" value="18">18</option>
                		<option class="hour-item" value="19">19</option>
                		<option class="hour-item" value="20">20</option>
                		<option class="hour-item" value="21">21</option>
                		<option class="hour-item" value="22">22</option>
                		<option class="hour-item" value="23">23</option>
                </select>
         </div><!-- 时选择 -->
	
		<div class="m">:</div>
		
	
		<div class="btn-date" desction="分选择">
                <span class="l" id="classselMin">分</span>
                <select class="chooseTime" id="selec-min">
                		<option class="hour-item" value="09">00</option>
                		<option class="hour-item" value="10">15</option>
                		<option class="hour-item" value="11">30</option>
                		<option class="hour-item" value="12">45</option>
                </select>
         </div><!-- 分选择 -->
	</div>
	
	<!-- 就餐人数 -->
	<div id="number">
		<div class="members clear_fix">
	    	<span class="l peopleNum">就餐人数</span>
	        <span class="icon"></span>
	        <select class="choose" desction="就餐人数" id="select-number">
	        	<option class="item" value="就餐人数">就餐人数</option>
	            <option class="item">1</option>
	            <option class="item">2</option>
	            <option class="item">3</option>
	            <option class="item">4</option>
	            <option class="item">5</option>
	            <option class="item">6</option>
	            <option class="item">7</option>
	            <option class="item">8</option>
	            <option class="item">9</option>
	            <option class="item">10</option>
	            <option class="item">11</option>
	            <option class="item">12</option>
	            <option class="item">超过12人</option>
	       </select>
		</div>
	</div>
	
	<!-- 姓名和性别 -->
	<div id="name">
		<div class="line clear_fix selectSex">
            <input class="name" type="text" value="" placeholder="姓名" id="input-name">
            <span class="lady btn analyze_parent" desction="女士" code="10209">女士</span>
            <span class="man btn analyze_parent" desction="先生" code="10208">先生</span>
        </div>
	</div>
	
	<!-- 手机号 -->
	<div id="telephone">
		<div class="line clear_fix">
			<input class="telephone" type="text" value="" placeholder="电话" id="input-telephone">
		</div>
	</div>
	
	
	<!-- 备注 -->
	<div id="others">
		<input class="comment" id ="input-others" type="text" placeholder="备注(可不填)">
	</div>
	
	<div id="submit">
		<span class="t-btn-show"  id="seatonly">订座</span>
		<span class="t-btn-show" style="float:right; margin-right:1em;right:0em;" id="seatOrder">订座点餐</span>
	</div>
	
	
	<script type="text/javascript">
		//glDatePicker 日历控件 
	    $(window).load(function(){
	    	$("#mydate").glDatePicker({
	    		dowNames : ["周一","周二","周三","周四","周五","周六","周日"],
	    		monthNames : ["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
	    		showAlways : true,
	    		format : 'yyyy-mm-dd'
		    });
	    });
	
		function init(){
			//选择时间和小时，更新选择的结果
			$("#selec-hour").change(function(){
				var value = $("#selec-hour option:selected").text();
				$("#classselHour").text( value );
			});

			$("#selec-min").change(function(){
				var value = $("#selec-min option:selected").text();
				$("#classselMin").text( value );
			});

			$("#select-number").change(function(){
				var value = $("#select-number option:selected").text();
				$(".peopleNum").text( value+"人" );
			});


			//选择性别，切换选中的效果
			var $sexBtns = $("#name .btn");
			$sexBtns.each(function(){
				$(this).click(function(){
					//取消所有active
					for(var i=0;i<$sexBtns.length;i++){
						$($sexBtns[i]).removeClass("active");
					}

					//被点击的改变active
					$(this).toggleClass("active");
				});
			});
		}
			
		

		 /*	 
		  特殊字符转换成转义符(XSS) 
		  */

	     function html2Escape(sHtml) {
	            if( typeof (sHtml) == "undefined" || sHtml== null || sHtml == 'null'|| sHtml.length == 0) return '';
	                return sHtml.replace(/[<>&"]/g,function(c){return {'<':'&lt;','>':'&gt;','&':'&amp;','"':'&quot;'}[c];});
	      };

		
		var informationValidation = {
			//用户填写的订座信息
			date : "",
			hour : "",
			min : "",
			number : "",
			name : "",
			telephone : "",
			sex : "",
			others : "",
			checkMobile : function(str){//检查输入的电话是否是11位数字
				var re = /^1\d{10}$/;
		    		if (re.test(str)) {
		        		return str;
				    } else {
				       return false;
				    }
			},
			getSex : function (){//获取性别
				var manClass = $("#name .man").attr("class");
				var ladyClass = $("#name .lady").attr("class");
				if(manClass.indexOf("active") !== -1)
					return 1;
				if(ladyClass.indexOf("active") !== -1)
					return 2;
				return 0;
			},
			validation : function(){
			 /*
	         	验证用户输入的数据是否有误
	         */
	  			this.date = html2Escape($("#mydate").val());
	  			this.hour = html2Escape($("#classselHour").text());
	  			this.min = html2Escape($("#classselMin").text());
	  			this.number = html2Escape($("#select-number").find("option:selected").text());
	  			this.name = html2Escape($("#input-name").val());
	  			this.telephone = html2Escape(this.checkMobile($("#input-telephone").val())+"");
	  			this.sex = html2Escape(this.getSex()+"");
	  			this.others = html2Escape($("#input-others").val());
	  			
	  			if(!this.date){
	  				alert("请输入日期");	
	  				return false;
	  			} else if(this.hour == "时"){
	  				alert("请选择时间（小时）");
	  				return false;
	  			} else if(this.min  == "分"){
	  				alert("请选择时间（分钟）");
	  				return false;
	  			} else if(!this.name){
	  				alert("请输入姓名");
	  				return false;
	  			} else if(!this.sex){
	  				alert("请选择性别");
	  				return false;
	  			} else if(!this.checkMobile($("#input-telephone").val())){
	  				alert("电话不对哦");
	  				return false;
	  			} else{
	  				return true;
	  			}
			}
		}


		//运行部分
		//页面js绑定初始化
		init();
		//点击订座，发送信息
		$("#seatonly").click(function(){			
			if(informationValidation.validation() === true){
  				var url = "date=" + encodeURIComponent(informationValidation.date) + "&hour=" + encodeURIComponent(informationValidation.hour) +
  							"&min=" + encodeURIComponent(informationValidation.min) + "&number=" + encodeURIComponent(informationValidation.number) +
  							"&name=" + encodeURIComponent(informationValidation.name) + "&telephone=" + encodeURIComponent(informationValidation.telephone) +
  							"&sex=" + encodeURIComponent(informationValidation.sex) + "&others=" + encodeURIComponent(informationValidation.others);
				//alert(encodeURI(url));
				//通过公众号发送订座信息给用户
  				url = "http://www.yuebuting.com/index.php/waimai/getCode/seatOnly?" + url;
  				window.location = url;
			}
		});

		
	</script>
</body>
</html>

