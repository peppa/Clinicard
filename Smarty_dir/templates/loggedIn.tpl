<div id="logoutTPL" hidden>
	<form class="log" method="POST" action="index.php?control=logout">
            <p id="show-username">Ciao {ucfirst($username)}</p> <!-- ucfirst capitalizes first letter -->
                <p><input id="logout" type="submit" value="Esci"></p>
	</form>
</div>