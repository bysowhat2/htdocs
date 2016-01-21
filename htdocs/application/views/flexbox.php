<html xmlns="http://www.w3.org/1999/xhtml">
<!--STATUS OK-->
<head>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<meta http-equiv="Cache-control" content="no-cache" />
<style type="text/css">
.navigation {
	display: flex;
	flex-flow: row wrap;
	justify-content: flex-end;
	align-items: center;
	width: 100%;
	height: 100px;
	background: green;
	margin:auto 0;
}
@media screen and (max-width: 800px) {
	.navigation {
		justify-content: space-around;
	}
}

@media screen and (max-width: 500px) {
  .navigation {
    /* On small screens, we are no longer using row direction but column */
    flex-direction: column;
  }
}


#parent {
	display: flex;
	flex-flow: row nowrap;
	justify-content: space-between;
	height: 700px;
	background: black;
}

.child {
	height: 100px;
	width: 100px;
	border:5px solid red;
	margin:auto 0;
	background:yellow;
}

.child2 {
	height: 50px;
	width: 50px;
	border:5px solid red;
	margin:auto 0;
	background:yellow;
}

</style>
	<title>award</title>
</head>
<body>
	<div class='navigation'>
		<p>111111 </p>
		<p>222222 </p>
		<p>333333 </p>
		<p>444444 </p>
		<input type='text'></input>
	</div>
	
	
	<div id='parent'>
		<div class='child'></div>
		<div class='child'></div>
		<div class='child'></div>
		<div class='child2'></div>
		<div class='child'></div>
		<div class='child'></div>
	</div>
	<script>
	
	</script>
</body>
</html>

