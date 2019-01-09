<?php 

    include ('../../../dbconnect.php');
    
    //print_r($_POST);
    
    if(isset($_POST['candidate']) && isset ($_POST['id_client']))
    {
    
        $result = $mysqli->query("SELECT * FROM expert_config WHERE user_id = 1");
        //".$_POST['id_client']);
    
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
        echo "<select name = candidates>";
        echo "<option value='0'> Choose jobs </option>";
        
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
    else //end POST if
    {
        echo "Нет необходимых данных";
    }
    
    ?>