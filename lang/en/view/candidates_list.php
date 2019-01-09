<?php
include ("header_q.php");
?>
    <div class="block_for_messages">
        <?php
        //S'il y a des messages d'erreur dans la session, alors les sortir
        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];

            //Détruisez la cellule error_messages afin que les messages d'erreur ne réapparaissent pas lorsque la page est mise à jour.
            unset($_SESSION["error_messages"]);
        }

        //S'il y a des messages réussis dans la session, envoyez-les
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];

            //Détruire la cellule success_messages afin que ces messages ne réapparaissent pas lorsque la page est mise à jour.
            unset($_SESSION["success_messages"]);
        }
        ?>
    </div>
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
<table border="0" cellpadding="5" cellspacing="2">
	<tr>
		<td valign="top" align="left" width="744">
			<table border="0" cellpadding="0" cellspacing="2" width="825" align="center">
				
				<tr>
					<td>
						<form name="candidates_list" action="candidates.php" method="post">
						
							<table cellspacing="2" cellpadding="2" border="0" width="810" align="center" id="add_line">
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
												<font color="white">Family name</font></div>
										</td>
										<td bgcolor="#006400" width="222">
											<div align="center">
												<font color="white">First name</font></div>
										</td>
										<td bgcolor="#006400" width="180">
											<div align="center">
												<font color="white">Born</font></div>
										</td>
										<td bgcolor="#006400" width="100">
											<div align="center">
												<font color="white">Male/ Female</font></div>
										</td>
									    <!--<td bgcolor="#006400" width="100">
											<div align="center">
												<font color="white">About his/ her CV </font></div>
										</td>-->
									</tr>
									<tr>
										<td bgcolor="#ffffcc">1</td>
										<td bgcolor="#ffffcc" width="222"><input type="text" name="family_name[0]" size="30" required></td>
										<td bgcolor="#ffffcc" width="222"><input type="text" name="first_name[0]" required size="30"></td>
										<td bgcolor="#ffffcc" width="180"><input name="born_date[0]" required type="date"></td>
										<td bgcolor="#ffffcc" width="100">
							<div align="center">
								<input type="radio" name="gender[0]" required id="" value="Male">M
<input type="radio" name="gender[0]" value="Female">F
</div>
						</td>
										<!--<td bgcolor="#ffffcc" width="45"><select name="cv_status[0]" id="cv">
												<option value="1">only optional...</option>
												<option value="2">This is the CV at my disposal</option>
												<option value="3">This is the CV that I consulted online</option>
												<option value="4">This is the CV I saw but not examined</option>
											</select></td>-->
									</tr>
								
							</tbody></table>
						
						<div align="left">
							<p><input type="button" type="button" onclick="add_candidat_line();" value="Add a candidate"></p>
							<?php
                        if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
                           echo "<div valign='top'><a class='buttonuch' href='#popup1'> Save </a></div>";
                        }else{
                            echo "<input type='submit' name='add_candidates' value='Save'><br>";
                        }
                    ?>
                    <br>
							</form>
					</td>
				</tr>
			</table>
	                <div id="popup1" class="overlay">
                    	<div class="popup">
                    		<h2>Dear User,</h2>
                    		<a class="close" href="#">&times;</a>
                            <div class="content">
                    	        <p>You are currently offline. To save your data and use the features of the application, please <a href="form_auth.php">login</a> or <a href="form_register.php">register</a></p>
                    		</div>
                    	</div>
                    </div>

<div>
<?php

    include_once ("footer.php");?>
</div>