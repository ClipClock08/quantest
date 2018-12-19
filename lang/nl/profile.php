<?php
/**
 * Created by PhpStorm.
 * User: alexdev
 * Date: 08.10.18
 * Time: 11:21
 */
include("header_q.php");
if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
    exit("<p><strong>Oops!</strong> De gevraagde pagina kan niet offline worden bekeken. Ga naar de <a href=".$address_site."> startpagina</a> om in te loggen of te registreren.</p>");
}
else {
    $email = $_SESSION['email'];
    $id = $_SESSION['id'];
    $result = $mysqli->query("SELECT * FROM users WHERE `id`= $id AND `email`= '" . $email . "'");
    if ($result) {
        $rows = mysqli_num_rows($result); // number of rows received
        echo "<table>
            <tr>
                <th>Id</th>
                <th>Type</th>
                <th>Company</th>
                <th>Website</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Functions</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>";
        for ($i = 0; $i < $rows; ++$i) {
            $row = mysqli_fetch_row($result);

            echo "<tr>";

            for ($j = 0; $j < mysqli_num_fields($result) - 1; ++$j)
                echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo "</table>";

        // очищаем результат
        mysqli_free_result($result);
    }
}

