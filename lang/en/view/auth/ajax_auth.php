<?php

include('../../../../dbconnect.php');

/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/

if (isset($_POST['login']) && isset ($_POST['pass'])) {
    $login = trim($_POST['login']);

    $pass = md5(trim($_POST['pass'] . "top_secret"));


    $_SESSION['email'] = $login;
    $_SESSION['password'] = $pass;

    $result = $mysqli->query("SELECT * FROM admin WHERE email = '$login' AND password = '$pass'");

    if ($result) { //если запрос прошел
        $rows = mysqli_num_rows($result); // количество полученных строк

        if ($rows > 0) {

            //go to admin bcs we have coincidence

            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin.php");

            //Removable script
            exit();

            /*for ($i = 0; $i < $rows; ++$i) {
                $row = mysqli_fetch_row($result);

                for ($j = 0; $j < count($row); ++$j) {
                    $data[$i][$j] = $row[$j];
                }
            }

            mysqli_free_result($result);

            echo "<pre>";
            print_r($data);
            echo "</pre>";*/
        } else {//если  строк 0
            $result = $mysqli->query("SELECT * FROM users WHERE email = '$login' AND password = '$pass'");
            echo "SELECT * FROM users WHERE email = '$login' AND password = '$pass'";

            if ($result) {//если запрос прошел
                $rows = mysqli_num_rows($result); // количество полученных строк

                for ($i = 0; $i < $rows; ++$i) {
                    $row = mysqli_fetch_row($result);

                    for ($j = 0; $j < count($row); ++$j) {
                        $data[$i][$j] = $row[$j];
                    }
                }

                mysqli_free_result($result);

                echo "<pre>";
                print_r($data);
                echo "</pre>";


            } else {
                echo "bad query";
            }
        }
    }
    print_r($_SESSION);
} else //end POST if
{
    echo "Нет необходимых данных";
}
?>