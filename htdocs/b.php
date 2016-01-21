<?php
	session_start();
?>

<html>
	<head>
	</head>
	<body>
		
		<p>BÒ³Ãæ</p>
		<p id="s">session:name is <?php echo $_SESSION['name']?></p>
		
		<script>
			var Cookie = {
				set: function (name, value, days){
					var expires = '';
					if (days){
						var date = new Date();
						date.setTime(date.getTime()+(days*24*60*60*1000));
						expires += date.toGMTString();
					}
					document.cookie = name+ '=' + value + expires+'; path=/';
				},
				get: function (name){
					var nameEQ = name + '=';
					var ca = document.cookie.split(';');
					for(var i=0;i < ca.length;i++){
						var c = ca[i];
						while (c.charAt(0)==' '){
							c = c.substring(1,c.length);
						}
						if(c.indexOf(nameEQ) == 0){
							return c.substring(nameEQ.length,c.length);
						}
					}
					return null;
				}
			};
		
			var sessionid = Cookie.get("PHPSESSID");
			//alert(sessionid);
			document.getElementById("s");
			s.innerHTML += sessionid;
		
		</script>
		
		
		
		
	</body>
</html>