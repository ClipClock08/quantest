<?php
/**
 * Created by PhpStorm.
 * User: alexdev
 * Date: 08.10.18
 * Time: 11:21
 */
include("header_q.php");
if (!isset($_SESSION["email"]) && empty($_SESSION["password"])) {
    exit("<p><strong>Oops!</strong> The requested page can not be viewed offline. Please visit the <a href=" . $address_site . ">home page</a> to login or register.</p>");
} else {
    // print_r($_SESSION);

    $email = $_SESSION['email'];

    ?>

    <table border='0' cellpadding='2' cellspacing='2'>
    <tr>
    <td>
    <fieldset>
    <legend><h2><b>Your profile saved on this interface</b></h2></legend><br>
    <table border='0' cellpadding='0' cellspacing='2' width='750'>
    <?php


    $result = $mysqli->query("SELECT id, type_account, company_name, website, first_name, last_name, civility, your_functions, email, phone FROM users WHERE  `email`= '$email'");
    $rows = mysqli_num_rows($result);

    for ($i = 0; $i < $rows; ++$i) {

        $row = mysqli_fetch_row($result);


        for ($j = 0; $j < mysqli_num_fields($result); ++$j)
            $profile[$j] = $row[$j];
    }

    //print_r($profile);
    echo "  <tbody>
			<tr>
				<td valign='top' width='241'>Customer status:</td>
				<td width='342'><b>$profile[1]</b></td>
			</tr>
			<tr>
                    <td valign='top' width='241'>
                        <div align='left'>First Name:</div>
                    </td>
                    <td width='342'><b>$profile[4]</b></td>
                </tr>
                <tr>
                    <td width='241'>
                        <div align='left'>Last Name:</div>
                    </td>
                    <td width='342'><b>$profile[5]</b></td>
                </tr>
			<tr>
				<td valign='top' width='241'>Function in the Company:</td>
				<td><b>$profile[7]</b></td>
			</tr>
			<tr>
				<td valign='top' width='241'>Company Name:</td>
				<td><b>$profile[2]</b></td>
			</tr>
			<tr>
				<td valign='top' width='241'>Email address:</td>
				<td><b>$profile[8]</b></td>
			</tr>
			<tr>
				<td valign='top' width='241'>Phone number:</td>
				<td><b>$profile[9]</b></td>
			</tr>
			<tr>
				<td valign='top' width='241'>Website of Company:</td>
			
               
                    <td valign='top'><b>$profile[3]</b></td>
                </tr>
                </tbody>
            </table>
        </fieldset>";
}
?>
    <br>
    <fieldset>
        <legend><h2><b>The tests you ordered</b></h2></legend>
        <br>
        <table border="1" cellpadding="3" cellspacing="3" whidt="800" width="750">
            <tbody>
            <tr>
                <td valign="top" width="97">Date</td>
                <td width="93"><b>Test type</b></td>
                <td width="290"><b>Name of the test or of the candidate</b></td>
                <td width="107"><b>Num.</b></td>
                <td width="222"><b>Test status (3)</b></td>
                <td width="222"><b>Visibility for the costumers</b></td>
            </tr>
            <tr>
                <td valign="top" width="97">
                    <div align="left">
                        dd/mm/yyyy
                    </div>
                </td>
                <td width="93">Recruitment</td>
                <td width="290">Purchasing department employee</td>
                <td width="107">32 candidates</td>
                <td width="222">Pending</td>
                <td width="222">Only previous</td>
            </tr>
            <tr>
                <td width="97">
                    <div align="left">
                        dd/mm/yyyy
                    </div>
                </td>
                <td width="93">Reconversion</td>
                <td width="290">Albert Einstein</td>
                <td width="107">3 jobs options</td>
                <td width="222">In process</td>
                <td width="222">Only previous</td>
            </tr>
            <tr>
                <td valign="top" width="97">
                    dd/mm/yyyy
                </td>
                <td width="93">Reconversion</td>
                <td width="290">Robert de Niro</td>
                <td width="107">6 jobs options</td>
                <td width="222">Completed</td>
                <td width="222">Display or Download or Print</td>
            </tr>
            </tbody>
        </table>


    </fieldset>
    <div>
        <a class="button" href="test_order.php">Ordered a test</a>
    </div>

    </table>

<?php

include_once("footer.php");
