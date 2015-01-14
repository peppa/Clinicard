<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
	<head>
		<title>Healthy Website Template | Home :: W3layouts</title>
		<link href='http://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" type="image/x-icon" href="images/pageicon.png" />
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link rel="stylesheet" href="css/camera.css" type="text/css" media="all" />
		<meta name="keywords" content="Healthy iphone web template, Andriod web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<link rel="stylesheet" href="css/responsiveslides.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/responsiveslides.min.js"></script>
		  
	</head>
	<body>
			<div class="header">
				<div class="wrap">
				<div class="logo">
					<a href="index.php"><img src="images/logo.png" title="logo" /></a>
				</div>

<!-- login -->
            <div>
            	{$loginBox}
			</div>

				    
	            


				</div>
				<div class="clear"> </div>
				</div>
			</div>
				<!--<div class="clear"> </div>-->
				<div class="topnav">
				<ul id="topnav">


			        <li class="nav_top"><a href="index.php">Home</a></li>
				        <li class="nav_top">
				            <a href="index.php?controllerAction=About">About</a><!--
				            <span>
				                <a href="">The Company</a> |
				                <a href="">The Team</a> |
				                <a href="">Careers</a>
				            </span>-->
				        </li>
				        <li class="nav_top">
				            <a href="index.php?controllerAction=Services">Servizi</a><!--
				            <span>
				                <a href="">What We Do</a> |
				                <a href="">Our Process</a> |
				                <a href="">Testimonials</a>
				            </span>-->
				        </li>
				        <li class="nav_top">
				            <a href="index.php?controllerAction=Registration&action=loadForm">Registrazione</a><!--
				            <span>
				                <a href="">Web Design</a> |
				                <a href="">Development</a> |
				                <a href="">Identity</a> |
				                <a href="">SEO &amp; Internet Marketing</a> |
				                <a href="">Print Design</a>
				            </span>-->
				        </li>
				       
        		<li class="nav_top"><a href="index.php?controllerAction=Contacts">Contatti</a></li>
    		</ul>
    	</div>

    	<div>
    		<a href="index.php?control=manageDB">Archivio pazienti</a>
    	</div>

		PAGINA DI GESTIONE DEL DATABASE PAZIENTI

		<form method="POST" action="index.php?controllerAction=manageDB&action=insert">
			<div>
				<input type="submit" value="inserisci">
			</div>
		</form>

		<form method="POST" action="index.php?controllerAction=manageDB&action=search">
			<div>
				<input type="submit" value="cerca">
			</div>
		</form>



		<!-- show all patients in DB -->

		<br>
		<br>
		<br>
		Tutti i pazienti nel DB (Nome, Cognome, CF)
		<br>
		<br>

		<ul>
		{foreach $people as $patient}
	    <li> {$patient.name} {$patient.surname} {$patient.cf}
	    <a href="{$part1}{$patient.link}">vai </a>
	    </li>
	    <br>
	    {/foreach}
	    </ul>
		
			<div class="clear"> </div>
			<div class="footer">
				<div class="left-content">
					<a href="index.php"><img src="images/logo1.png" title="logo" /></a>
				</div>
				<div class="right-content">
					<p>Healthy  &#169	 All Rights Reserved | Design By <a href="http://w3layouts.com/">W3Layouts</a></p>
				</div>
				<div class="clear"> </div>
			</div>
		</div>
	</body>
</html>