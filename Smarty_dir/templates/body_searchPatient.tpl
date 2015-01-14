<br>
		Inserisci nome, cognome o codice fiscale del paziente
		<br>

		<form method="POST" action="index.php?control=manageDB&action=search">
			<table>
				<tr>
					<td> <input type="text" name="keyValue"> </td>
					<td> <input type="submit" value="cerca"> 
                    <td> <input type="reset" value = "reset"> </td>
                </tr>
            </table>
        </form>