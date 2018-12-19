<script>
        window.onload = function () {
            document.getElementById('add_job').addEventListener('click', delItem);
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

  
        <h1>Test for a professional reconversion</h1><h2>Introduce the generalities of the possible functions for the available collaborator</h2>
<form action="reconversion.php" method="post" name="exigences">
	<table border="0" width="650" cellspacing="2" cellpadding="2" id="add_job">
		<tbody>
			<tr>
				<td colspan="2">
					<fieldset>
						<legend><b>Generalities of the option of JOB 1</b></legend>
						<table border="0" cellspacing="2" cellpadding="0">
							<tbody>
								<tr>
									<td valign="middle" width="241">
                                                Title of Job 1:
</td>
									<td width="437"><input name="job[0]" size="50" type="text"></td>
								</tr>
								<tr>
									<td valign="middle" width="241">
                                                Service name:
</td>
									<td width="437"><input name="service_name[0]" size="50" type="text"></td>
								</tr>
								<tr>
									<td valign="top" width="241">
                                                Specify the function:
</td>
									<td width="437"><select id="fonction" name="specify_function[0]">
											<option value="1">select...</option>
											<option value="2">Senior manager</option>
											<option value="3">Middle manager</option>
											<option value="4">Employee</option>
											<option value="5">Salaried</option>
										</select></td>
								</tr>
							</tbody>
						</table>
					</fieldset>
				</td>
			</tr>
			<tr>
				<td colspan="2" valign="top">
					<div>
						<fieldset>
							<legend><b>Generalities of the option of JOB 2</b></legend>
							<table border="0" cellspacing="2" cellpadding="0">
								<tbody>
									<tr>
										<td valign="middle" width="241">
                                                   Title of Job 2:
</td>
										<td width="437"><input name="job[1]" size="50" type="text"></td>
									</tr>
									<tr>
										<td valign="top" width="241">
                                                   Not the same service? <br>
											Type it:
</td>
										<td valign="bottom" width="437"><input name="service_name[1]" size="50" type="text"></td>
									</tr>
									<tr>
										<td valign="middle" width="241">
                                                    
                                                        Specify the function:
</td>
										<td width="437"><select id="fonction" name="specify_function[1]">
												<option value="1">select...</option>
												<option value="manager">Senior manager</option>
												<option value="midle_management">Middle manager</option>
												<option value="Employee">Employee</option>
												<option value="Salaried">Salaried</option>
											</select></td>
									</tr>
								</tbody>
							</table>
						</fieldset>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	<br>
	<div>
                    <input type="button" onclick="add_job()" value="Insert an additional job option"><br>
		<br>
	</div>
	<div>
                    <td colspan="2" valign="top">
                        <fieldset>
                            <legend><b> Identity of the employee to be reclassified </b></legend>
                            <table border="0" cellspacing="2" cellpadding="0">
                                <tbody>
                                <tr>
                                    <td valign="middle" width="241">
                                        Family name:
                                    </td>
                                    <td width="437"><input name="reclass_name" size="24" type="text" required></td>
                                </tr>
                                <tr>
                                    <td valign="middle" width="241">
                                        First name:
                                    </td>
                                    <td valign="top" width="437"><input name="reclass_fisrt_name" size="24" type="text" required></td>
                                </tr>
                                <tr>
                                    <td valign="middle" width="241">
                                        Birth date:
                                    </td>
                                    <td width="437"><input name="reclass_birth" type="date" required></td>
                                </tr>
                                </tbody>
                            </table>
                        </fieldset>
                        <br>
                    </td>
                </div>

By clicking "Save" the abilities of this collaborator will be tested according to the requirements of the indicated optional positions.<br>The result of the test, in agreement with your order, will be visible on your personal page (profile).
                    <p><?php
                        if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
                           echo "<div valign='top'><a class='buttonuch' href='#popup1'> Save </a></div>";
                        }else{
                            echo "<div valign='top'><input name='save01' type='submit' value='Validate'></div>";
                        }
                    ?>
                    <div id="popup1" class="overlay">
                    	<div class="popup">
                    		<h2>Dear User,</h2>
        		<a class="close" href="#">&times;</a>
                <div class="content">
        	        <p>This feature is active when you are connected. Please, <a href="https://quantest.eu/lang/en/form_auth.php">connect</a> or <a href="https://quantest.eu/lang/en/form_register.php">register</a></p>
        		</div>
                    	</div>
                    </div>
                    
                </div>
            </form><?php

include_once ("footer.php");