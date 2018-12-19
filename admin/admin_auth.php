<?php
    //Connecting caps
    include_once("header_admin.php");
?>


<div id="form_auth">
   <p> <h1>Connecting to interface by ADMIN</h1></p>

<form id='login' action='https://quantest.online/admin/admin_selection.php' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Admin Login</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>

<label for='username' >UserName*:</label>
<input type='text' name='email' id='email' placeholder="your email address.."  maxlength="200" />

<label for='password' >Password*:</label>
<input type='password' name='password' id='password' maxlength="24" />

<input type='submit' name='submitButtonName' value='Submit' />

</fieldset>
</form>

<?php 
    
    //Connecting to the footer
    require_once("footer.php");
?>