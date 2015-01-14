
		<br>
		Modifica i dati del paziente
		<br>
	    <br>
		<form method="POST" action="index.php?control=manageDB&action=modPat&mod=completed&p={$link}">
			<table>

				<tr>
					<td> Nome: </td>
					<td> <input type="text" name="name"/> </td>
				</tr>

				<tr>
					<td> Cognome: </td>
					<td> <input type="text" name="surname"/> </td>
				</tr>

				<tr>
                <td>Sesso: </td> 
                  <td>
                    <input type="radio" name="gender"> M 
                    <input type="radio" name="gender"> F 
                  </td>
                </tr>

                <tr>
                	<td>Data di nascita:</td>
                	<td> <input type="date" name="dateBirth" /> </td>
                </tr>

                <tr>
                    <td> Codice Fiscale: </td>
                    <td> <input type="text" name="CF"/> </td>
		</tr>

		<tr>
                    <td> <input type="submit" value="invia dati" /> </td>
                    <td> <input type="reset" value = "reset" /> </td>
                </tr>
                
            </table>
        </form>