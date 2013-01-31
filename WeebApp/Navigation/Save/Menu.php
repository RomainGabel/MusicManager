<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
	<title>MusicManager</title>
	<style type="text/css">
      .blue {
        background: blue;
        
      }
    </style>
	<LINK rel="stylesheet" type="text/css" href="../CSS/V2.css">
	</head>

	<body>
	<img style="margin-left: 30px; left: 0px; top:0px; width:400px;"
			src="../CSS/Logo.png" onclick="Moove();">


		<section id="Container">

		


		</section>

	</body>

	</html>
	

	<SCRIPT TYPE="text/javascript">
	function Moove(){

		document.getElementById('Container').className = 'blue';

		var doc = document.getElementById('Container');
		var x = 0;
		var value;

		for (var i = 0; i <= 100 ; i++) {
			x++ ;
			value = x+'px';
			doc.style.marginLeft = value;
			setTimeout("",1000000);
		};
			

		alert(doc.offsetLeft);
	}
			
	</SCRIPT>












