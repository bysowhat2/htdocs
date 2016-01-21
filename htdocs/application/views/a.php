<!DOCTYPE html>
<html>
    <head>
        <title>My Sample Project</title>
       
		<script>
		
			
		</script>
		<style type="text/css">
			body, div, h1{
				margin: 0;
				padding: 0;
			}

		</style>
    </head>
    <body>
		<div id="here"></div>

		<script type="text/javascript">
			function loop1() {
				for(var i=1;i<15000;i++) {
					document.getElementById("here").innerHTML += 'a';
				}
			}

			function loop2() {
				var content = "";
				for(var i=1;i<15000;i++) {
					content += 'a';
				}
				document.getElementById("here").innerHTML += content;
			}

			/*var start = new Date().getTime();
			loop1();
			var end = new Date().getTime();
			console.log( (end - start)/1000 );
			alert((end - start)/1000);*/


			for(var ii = 0;ii<5000; ii++) {
				document.body.appendChild(document.createElement('div'));
			}
			
			function collectionGlobal() {
				var alldivs = document.getElementsByTagName('div');
				for(var i=0;i<alldivs.length;i++) {
					var name = document.getElementsByTagName('div')[i].nodeName;
					var name = document.getElementsByTagName('div')[i].nodeType;
					var name = document.getElementsByTagName('div')[i].tagName;
				}
			}

			function collectionLocal() {
				var alldivs = document.getElementsByTagName('div');
				var length = alldivs.length;
				var node = null;
				var name = null;
				for(var i=0;i<alldivs.length;i++) {
					node = alldivs[i];
					name = node.nodeName;
					name = node.nodeType;
					name = node.tagName;
				}
			}


			var start = new Date().getTime();
			collectionGlobal();
			//collectionLocal();
			var end = new Date().getTime();
			console.log( (end - start) );
			alert((end - start));
		</script>
    </body>
</html>
