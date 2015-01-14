
		<br>
		Inserisci i dati del paziente
		<br>
	    <br>
		<form method="POST" action="index.php?control=manageDB&action=insert&sent=y">
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
                    <input type="radio" name="gender" value="male"> M 
                    <input type="radio" name="gender" value="female"> F 
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
                	<td>Data visita:</td>
                	<td> <input type="date" name="dateCheck" /> </td>
                </tr>

				<tr>
					<td> Anamnesi: </td>
					<td> <textarea rows="5" cols="60" name="medHistory"></textarea>
				</tr>

				<tr>
					<td> Esame obiettivo: </td>
					<td> <textarea rows="5" cols="60" name="medExam"></textarea>
				</tr>

				<tr>
					<td> Conclusioni: </td>
					<td> <textarea rows="5" cols="60" name="conclusions"></textarea>
				</tr>

				<tr>
					<td> Prescrizione esami: </td>
					<td> <textarea rows="5" cols="60" name="toDoExams"></textarea>
				</tr>

				<tr>
					<td> Terapia: </td>
					<td> <textarea rows="5" cols="60" name="terapy"></textarea>
				</tr>

				<tr>
					<td> Controllo: </td>
					<td> <textarea rows="5" cols="60" name="checkup"></textarea>
				</tr>

				<tr>
					<td> <input type="submit" value="invia dati" /> </td>
                    <td> <input type="reset" value = "reset" /> </td>
                </tr>
            </table>
        </form>