<br>
	<p>Compila la form per registrarti</p>
	<br>

	<form method="POST" action="index.php?control=Registration&action=addUser">
		<div>
			<div>
				<div>
			    	<label>Nome</label>
			    	<input type="text" name="name" placeholder="Nome">
			  	</div>
			</div>
		</div>

		<div>
	  		<div>
			  	<div>
			    	<label>Cognome</label>
			    	<input type="text" name="surname" placeholder="Cognome">
			  	</div>
			</div>
		</div>

		<div>
			<div>
				<div>
			    	<label>Codice Fiscale</label>
			    	<input type="text" name="CF" placeholder="Codice Fiscale">
			  	</div>
			</div>
		</div>
		

		<div>
	  		<div>
				<div>
			    	<label>Indirizzo Email</label>
			    	<input type="email" name="email" placeholder="Inserici email">
			  	</div>
			</div>
		</div>


		<div>
	  		<div>
				<div>
			    	<label>Username</label>
			    	<input type="text" name="username" placeholder="Username">
			  	</div>
			</div>
		</div>

		<div>
	  		<div>
			  	<div>
			   		<label>Password</label>
			   		<input type="password" name="password" placeholder="Password">
			  	</div>
			</div>
		</div>

	  	<input type="submit" value="Registrati">

	</form>