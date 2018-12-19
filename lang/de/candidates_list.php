<script>
        window.onload = function () {
            document.getElementById('add_line').addEventListener('click', delItem);
            function delItem (e) {
                if (e.target.className == 'cancel') {
                    var del = e.target;
                    var elem = del.previousSibling;
                    elem.remove();
                    del.remove();
                }
            }
        }
</script>
<?php
include ("header_q.php");
/*if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
    exit("<p><strong>Error! </strong> You visited this page directly, so there is no data to process. You can go to the <a href=".$address_site."> home page </a>.</p>");
}*/

?>
    <div class="block_for_messages">
        <?php
        //Если в сессии существуют сообщения об ошибках, то выводим их
        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];

            //Уничтожаем ячейку error_messages, чтобы сообщения об ошибках не появились заново при обновлении страницы
            unset($_SESSION["error_messages"]);
        }

        //Если в сессии существуют радостные сообщения, то выводим их
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];

            //Уничтожаем ячейку success_messages,  чтобы сообщения не появились заново при обновлении страницы
            unset($_SESSION["success_messages"]);
        }
        ?>
    </div>

<table border="0" cellpadding="5" cellspacing="2">
	<tr>
		<td valign="top" align="left" width="818">
			<table border="0" cellpadding="0" cellspacing="2" width="817" align="center">
				<tr>
					<td>
					<form action=candidates.php method=post enctype=multipart/form-data>
								<h2><b>Bitte geben Sie an, welche Kandidaten getestet werden sollen, oder laden Sie die Liste herunter...<b> </h2>
								<p><input type="file" name="userfile" size="16"><p>
								<p><input type=submit name="upload" value="Senden"></p>
							</form>
					</td>
				</tr>
				<tr>
					<td>
						
			<form name="candidates_list" action="candidates.php" method="post">
				<table cellspacing="2" cellpadding="2" border="0" width="808" align="center" id="add_line">
					<tbody>
						<tr>
							<td></td>
							<td colspan="4">
								<div align="center"></div>
							</td>
						</tr>
						<tr>
							<td bgcolor="#006400">
								<div align="center">
									<font color="white">ID</font></div>
							</td>
							<td bgcolor="#006400" width="222">
								<div align="center">
									<font color="white">Name</font></div>
							</td>
							<td bgcolor="#006400" width="222">
								<div align="center">
									<font color="white">Vorname</font></div>
							</td>
							<td bgcolor="#006400" width="180">
								<div align="center">
									<font color="white">Geburtsdatum</font></div>
							</td>
							<td bgcolor="#006400" width="117">
								<div align="center">
									<font color="white">Mann/ Frau</font></div>
							</td>
							<!--<td bgcolor="#006400" width="100">
											<div align="center">
												<font color="white">&Uuml;ber seinen Lebenslauf </font></div>
										</td>--></tr>
						<tr>
							<td bgcolor="#ffffcc">1</td>
							<td bgcolor="#ffffcc" width="222"><input type="text" name="family_name[0]" size="30" required></td>
							<td bgcolor="#ffffcc" width="222"><input type="text" name="first_name[0]" required size="30"></td>
							<td bgcolor="#ffffcc" width="180"><input name="born_date[0]" required type="date"></td>
							<td bgcolor="#ffffcc" width="117">
								<div align="center">
									<input type="radio" name="gender[0]" required id="" value="Male">M
<input type="radio" name="gender[0]" value="Female">F
</div>
							</td>
							<!--<td bgcolor="#ffffcc" width="45"><select name="cv_status[0]" id="cv">
												<option value="1">fakultativ...</option>
												<option value="2">Ich habe seinen Lebenslauf</option>
												<option value="3">Lebenslauf online konsultiert</option>
												<option value="4">Gesehen, aber nicht &uuml;berpr&uuml;ft</option>
											</select></td>--></tr>
					</tbody>
				</table>
						
						<div align="left">
							<p><input type="button" type="button" onclick="add_candidat_line();" value="F&uuml;gen Sie einen Kandidaten"></p>
							<?php
                        if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
                           echo "<div valign='top'><a class='buttonuch' href='#popup1'> Rekord </a></div>";
                        }else{
                            echo "<input type='submit' name='add_candidates' value='Rekord'><br>";
                        }
                    ?><br>
							</form>
					</td>
				</tr>
			</table>
		
	 <div id="popup1" class="overlay">
                    	<div class="popup">
                    		<h2>Lieber Benutzer,</h2>
                    		<a class="close" href="#">&times;</a>
                            <div class="content">
                    	        <p>Sie sind derzeit offline. Um Ihre Daten zu speichern und alle Funktionen der Anwendung zu nutzen, <a href="form_register.php">registrieren</a> Sie sich bitte oder <a href="form_auth.php">melden</a> Sie sich an.</p>
                    		</div>
                    	</div>
                    </div>
</div>

<div><?php

include_once ("footer.php");?></div>