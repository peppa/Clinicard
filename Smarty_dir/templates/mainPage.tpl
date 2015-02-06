<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
    <head>
	<title>Clinicard</title>
        <link href='http://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
        <!--<link rel="shortcut icon" type="image/x-icon" href="images/pageicon.png" /><!-- website icon -->
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
        <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
        <link href="css/myStyle.css" rel="stylesheet" type="text/css"  media="all" />
        <link href="css/style4.css" rel="stylesheet" type="text/css"  media="all" />
        <link href="css/style3.css" rel="stylesheet" type="text/css"  media="all" />
        <meta name="keywords" content="Healthy iphone web template, Andriod web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
        <link rel="stylesheet" href="css/responsiveslides.css">
        <link rel="stylesheet" href="css/myStyle.css">
        <script src="./script/jquery.js"></script>
        <script src="./script/jquery.cookie.js"></script>
        <script src="./script/script.js"></script>
        {if isset($header)}
            {$header}
        {/if}
        
        <noscript>
            <div id="script-disabled" class="errormsg">
                Per avere a disposizione tutte le funzionalit&agrave; di questa applicazione web &egrave necessario abilitare
                Javascript. Qui ci sono tutte le <a href="http://www.enable-javascript.com/it/"
                target="_blank"> istruzioni su come abilitare JavaScript nel tuo browser</a>.
            </div>
        </noscript>
        
        <div id="cookie-disabled" class="errormsg" hidden>
            I cookie sono disabilitati. Affinch&egrave; questa applicazione funzioni al meglio &egrave; necessario
            che siano attivati.
        </div>
        
        <div id="cookie-bar" hidden>
            <p>Questa applicazione web utilizza i cookie. Proseguendo acconsenti al loro utilizzo.<a href="" id="cookie-accepted" class="cb-enable">Ho capito</a></p>
        </div>


    </head>
    
    <body>
        <div class="header">
            <div class="wrap">
                <div class="logo">
                    <a href="index.php"><img src="images/logo_mine.png" title="logo" /></a>
                </div>

<!-- login -->
                <div class="log">
                    <div id="loginTPL" hidden>
                        <div>
                            <p id="login-error" class="no-input input-message-error" hidden><p>
                            <p><input id="userLogin" class="input-field-login" type="text" name="username" placeholder="username"></p>
                            <p><input id="passLogin" class="input-field-login" type="password" name="password" placeholder="password"></p>
                            <p><input id="rememberLogin" type="checkbox" name="keepLogged" value="yes">Ricordami <input id="login" value="Accedi"></p>
                        </div>
                    </div>

                <div id="logoutTPL" hidden>
                    <!--<form method="POST" action="index.php?control=logout">-->
                        <p id="show-username"></p>
                        <p><input id="logout"value="Esci"></p>
                   <!-- </form>-->
                </div>  

                </div>





            </div>
            <div class="clear"> </div>
        </div>

        <div class="topnav">
            <ul id="topnav">
                <li class="nav_top">
                    <a href="index.php">Home</a>
                </li>
                {if isset($isDoctor)}
                <li class="nav_top">
                    <a href="index.php?control=manageDB">Pazienti</a>
                </li>
                {else}
                <li class="nav_top">
                    <a href="index.php?control=Services">Serivizi</a>
                </li>
                {/if}
                <li class="nav_top">
                    <a href="index.php?control=VisitBooking">Prenota visita</a>
                </li>
                <li class="nav_top">
                    <a href="index.php?control=Registration">Registrazione</a>
                </li>

                <li class="nav_top">
                    <a href="index.php?control=Contacts">Contatti</a>
                </li>
            </ul>
        </div>

        {$body}

        <div class="separate"></div>
        <div class="footer">
            <div class="left-content">
                <a href="index.php"><img src="images/logo_footer.png" title="logo" /></a>
            </div>
            <div class="right-content">
                <p>Healthy  &#169	 All Rights Reserved | Design By <a href="http://w3layouts.com/">W3Layouts</a></p>
            </div>
            <div class="clear"> </div>
        </div>

    </body>
</html>

