<?php
/**
 * Created by PhpStorm.
 * User: alexdev
 * Date: 08.10.18
 * Time: 11:21
 */
include("header_q.php");
if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
    exit("<p><strong>Oops!</strong> La pagina richiesta non può essere visualizzata offline. Si prega di visitare la <a href=".$address_site."> home page </a> per accedere o registrarsi. </p>");
}
else {
    $email = $_SESSION['email'];
    $id = $_SESSION['id'];
    $result = $mysqli->query("SELECT * FROM users WHERE `id`= $id AND `email`= '" . $email . "'");
    if ($result) {
        $rows = mysqli_num_rows($result); // количество полученных строк
        echo "<table>
            <tr>
                <th>Id</th>
                <th>Tipo</th><br>
                <th>Azienda</th>
                <th>Sito</th>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Funzione</th>
                <th>Email</th>
                <th>Tel.</th>
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

