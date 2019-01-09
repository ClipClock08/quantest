<?php 

    include ('../../../dbconnect.php');
    
    //print_r($_POST);
    if(isset($_POST['test_type']) && isset ($_POST['id_client']))
    {
        if(($_POST['test_type'] == 2))
        { // start if Reconversion
            $result = $mysqli->query("SELECT * FROM reconversion WHERE user_id =".$_POST['id_client']);
        
            if($result)
            {
                $rows = mysqli_num_rows($result); // количество полученных строк
            
                for ($i = 0 ; $i < $rows ; ++$i)
                {
                    $row = mysqli_fetch_row($result);
                    
                    for ($j = 0 ; $j < count($row) ; ++$j) { 
                        $job[$i][$j] = $row[$j];
                    }
                }
             
                 mysqli_free_result($result);
            
            /*echo "<pre>";
             print_r(count($reclass));
            echo "</pre>";*/
            echo "<select name ='jobs' id='reclass>";
            echo "<option value='0'> Choose job </option>";
            
                for($i = 0; $i < count($job); $i++)
                {
                    echo "<option value='{$job[$i][0]}'>{$job[$i][2]}</option>";
                }
        
            echo "</select>";
            }
            else
            {
                echo "bad Query";
            } 
        }
        else
        {
            echo "do not selected any type of test";
        }//end if reconversion
        
    }
    else //end POST if
    {
        echo "Нет необходимых данных";
    }
    
?>