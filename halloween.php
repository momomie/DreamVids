<?php
	if(isset($_GET['cle'])){
		include 'includes/bdd.class.php';
		$db = new BDD();
		$req = $db->select("*", "citrouilles", "WHERE cle = '".$_GET['cle']."'");
		$rep = $db->fetch_array($req);
		if(empty($rep['cle'])){
			header("Location: ./");
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>DreamVids | Halloween</title>
	<meta charset="UTF-8">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<style type="text/css">
		body{
			background-size: cover;
			background-image: url('./img/halloween/background.png');
			margin: 0;
			padding: 0;
		}
		#container{
			position: absolute;
			top: 50%;
			left: 50%;
			width: 500px;
			height: 200px;
			margin-left: -250px;
			margin-top: -100px;
			font-family: 'Raleway', sans-serif;
			color: white;
			text-align: center;
		}
		.bravo{
			font-size: 57pt;
			font-weight: bold;
			text-shadow: 0px 0px 10px 3px black;
		}
		.description{
			font-size: 26pt;
		}
		input.cle{
			margin-top: 20px;
			padding: 5px;
			font-family: 'Raleway', sans-serif;
			font-weight: bold;
			text-align: center;
			width: 250px;
		}
	</style>
</head>
<body>
	<div id="container">
		<span class="bravo">BRAVO !</span><br/>
		<span class="description">Tu as gagné une clé bêta!</span><br/>
		<input class="cle" type="text" value="<?=$_GET['cle']?>">
	</div>
</body>
	<script type="text/javascript">
		
	</script>
</html>