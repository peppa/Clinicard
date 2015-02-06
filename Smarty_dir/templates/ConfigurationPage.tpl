<!DOCTYPE html>
<html>
<head>
	<link href="css/myStyle.css" rel="stylesheet" type="text/css">
        <link href="css/style4.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="mainContent">
        <div class="title">
            <h2>CLINICARD</h2>
            <h4>PAGINA DI INSTALLAZIONE</h4>
        </div>
    <form method="POST" action="index.php">
        <div class="row">
        <div class="row-element">
            <p class="label"><label>Username:</label></p>
            <p><input class="input-field" type="text" name="userConfig"></p>
        </div>
    </div>
    
    <div class="row">
        <div class="row-element">
            <p class="label"><label>Password:</label></p>
            <p><input class="input-field" type="text" name="passConfig"/></p>
        </div>
    </div>
    
    <div class="row">
        <div class="row-element">
            <p class="label"><label>Host:</label></p>
            <p><input class="input-field" type="text" name="hostConfig"/></p>
        </div>
    </div>
    
    <div class="row">
        <div class="row-element">
            <p class="label"><label>Database (deve essere gi&agrave; stato creato):</label></p>
            <p><input class="input-field"type="text" name="DBConfig"/></p>
        </div>
    </div>
        
        <div class="row-buttons">
        <p> <button class="controlButton" type="submit"/>Invia</button>
            <button class="controlButton" type="reset"/>Reset</button>
        </p>
    </div>
        
    </form>
    </div>
</body>