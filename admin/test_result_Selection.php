 <?php
   //Add a file to connect to the database
   //SELECT * FROM admin_selection ORDER BY id DESC LIMIT 1
    require("../dbconnect.php");
    include ("getPoints.php");
    
    
    $result = $mysqli->query("SELECT * FROM admin_selection ORDER BY id DESC LIMIT 1");
    $rows = mysqli_num_rows($result);
    
    if($result){
        $param = 0;    
        for($i=0; $i<$rows; $i++){
        
            $row = mysqli_fetch_row($result);
            for($j=0; $j<count($row); $j++){
                
                $selection_arr[$j] = $row[$j];
                
            }
            
        }
        
        
        
        for($l = 19; $l < 38; $l++){
            //counting candidate's score
            $param += getNumber($selection_arr[$l]);
        }
        
        //echo $param;
        // $param += getNumber($selection_arr[19]);       
        /*echo "<pre>";
        print_r($selection_arr);
        echo "</pre>";*/
            
        ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/quantest.css"/>
    <link rel="stylesheet" href="../css/static-form.css"/>
    <script src="../js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <title>Tests de s&eacute;lection d'embauche et de reconversion professionnelle | QUANTEST</title>
</head>
<body>
    

<table border="1" cellpadding="2" cellspacing="2" width="800" align="center">
    <fieldset>
        <legend>
            <h2><b>Result of a Recruitment Test</b> by your best HR assistant</h2>
        </legend>
        <tr>
            <td valign="middle" width="165">
                <div align="left">
                    <img src="../img/logoQuantestPlat.jpg" width="162" height="85" border="0">
                </div>
            </td>
            <td valign="middle" width="364">
                <div>
                    <fieldset>
                        <legend>
                            <h4>About Costumer</h4>
                        </legend>
                        <table border="0" cellpadding="2" cellspacing="2">
                            <tr>
                                <td>Client:</td>
                                <td colspan="2"><b><?php echo $selection_arr[2]; ?></b></td>
                            </tr>
                            <tr>
                                <td>Statut:</td>
                                <td colspan="2"><b><?php echo $selection_arr[3]; ?></b></td>
                            </tr>
                            <tr>
                                <td>Name of the contact:</td>
                                <td><b><?php echo $selection_arr[4]; ?></b></td>
                                <td><b><?php echo $selection_arr[5]; ?></b></td>
                            </tr>
                            <tr>
                                <td>Function:</td>
                                <td colspan="2"><b><?php echo $selection_arr[6]; ?></b></td>
                            </tr>
                            <tr>
                                <td>Website :</td>
                                <td colspan="2"><b><?php echo $selection_arr[7]; ?></b></td>
                            </tr>
                        </table>
                    </fieldset>
                </div>
            </td>
            <td valign="middle" width="493">
                <div>
                    <fieldset>
                        <legend>
                            <h4>About the ordered test</h4>
                        </legend>
                        <table border="0" cellpadding="2" cellspacing="2" width="350">
                            <tr>
                                <td>Job Title:</td>
                                <td><b><?php echo $selection_arr[12]; ?></b></td>
                            </tr>
                            <tr>
                                <td>Service:</td>
                                <td><b><?php echo $selection_arr[13]; ?></b></td>
                            </tr>
                            <tr>
                                <td>Job status:</td>
                                <td><b><?php echo $selection_arr[14]; ?></b></td>
                            </tr>
                            <tr>
                                <td>Ref. of this test(id):</td>
                                <td><b><?php echo $selection_arr[0]; ?></b></td>
                            </tr>
                            <tr>
                                <td>
                                    Date of the test:
                                </td>
                                <td><b><?php echo $selection_arr[38]; ?></b></td>
                            </tr>
                        </table>
                    </fieldset>
                </div>

            </td>
        </tr>
        <tr>
            <td valign="middle" width="165">
                <div align="center">
                    Candidate tested:
                    <h1><?php echo $selection_arr[10]." ".$selection_arr[9]; ?></h1>
                </div>
            </td>
            <td valign="bottom" width="364">
                <div>
                    <fieldset>
                        <legend><b>About point of his/ her declarations</b></legend>

                        <table border="0" cellpadding="0" cellspacing="2" width="350">
                            <tr>
                                <td>1</td>
                                <td>Identity:</td>
                                <td width="35"><?php ?><img src="img/<?php echo getImages($selection_arr[15]);?>"
                                                                              width="16" height="16"
                                                                              border="0"></td>
                                <td><?php echo $selection_arr[15]; ?></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Civil status:</td>
                                <td width="35"><img src="img/<?php echo getImages($selection_arr[16]);?>" width="16" height="16" border="0">
                                </td>
                                <td><?php echo $selection_arr[16]; ?></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Studies:</td>
                                <td width="35"><img src="img/<?php echo getImages($selection_arr[17]);?>" width="16" height="16" border="0">
                                </td>
                                <td><?php echo $selection_arr[17]; ?></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Eperience:</td>
                                <td width="35"><img src="img/<?php echo getImages($selection_arr[18]);?>"
                                                                              width="16" height="16"
                                                                              border="0"></td>
                                <td><?php echo $selection_arr[18]; ?></td>
                            </tr>
                        </table>
                        <br>

                    </fieldset>
                </div>
            </td>
            <td valign="bottom" width="493">
                <div>
                    <fieldset>
                        <legend><b>About presomptions</b></legend>

                        <table border="0" cellpadding="0" cellspacing="2">
                            <tr>
                                <td width="20">5</td>
                                <td width="200">
                                    <p>Religious extremism:</p>
                                </td>
                                <td width="25"><?php echo getNumber($selection_arr[19]);?></td>
                                <td width="35"><img src="img/<?php echo getImages($selection_arr[19]);?>" width="16" height="16" border="0">
                                </td>
                                <td rowspan="2" width="150">
                                    <div align="center">
                                        Sous-total <?php echo getNumber($selection_arr[19]) + getNumber($selection_arr[20]);?> / -10
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="20">6</td>
                                <td width="200">
                                    <p>Anti-Western extremism:</p>
                                </td>
                                <td width="25"><?php echo getNumber($selection_arr[20]);?></td>
                                <td width="35"><img src="img/<?php echo getImages($selection_arr[20]);?>" width="16" height="16" border="0">
                                </td>
                            </tr>
                        </table>
                        <br>

                    </fieldset>
                </div>
            </td>
        </tr>
    </fieldset>
</table>
    <div align="left">
        <br>
        <fieldset>
            <legend>
                <h4><b>About professional sphere</b></h4>
            </legend>
            <table border="0" cellpadding="0" cellspacing="2">
    
                <tr>
                    <td width="30"><b>1/0</b></td>
                    <td width="25"><b>id</b></td>
                    <td width="310"><b>Active criteria</b></td>
                    <td width="25">Points</td>
                    <td width="35"></td>
                    <td width="450"><b>Main Comments</b></td>
                    <td width="150"></td>
                </tr>
                <tr>
                    <td width="30"><label>
                        <input type="checkbox" value="checkboxValue" name="checkboxName" checked>
                    </label>
                    </td>
                    <td width="25">11</td>
                    <td width="310">Studies and and experience to assume this function:<br>
                    </td>
                    <td width="25"><?php echo getNumber($selection_arr[25]); ?></td>    
                    <td width="35"><img src="img/<?php echo getImages($selection_arr[25]);?>" width="16" height="16"
                                                                  border="0"></td>
                    <td width="450">
                        <div align="left">
                            <?php echo $selection_arr[25];?>
                        </div>
                    </td>
                    <td rowspan="13" width="150">
                        <div id="graph"> 
                            <div align="left">
                                <table>
                                    <caption>Display mode of the test result</h2></caption>
                                    <tr>
                                        <td colspan="2"><input type="radio" name="typeView"> <span class="small-text">Quick</span></td
                                    </tr>
                                    <tr>
                                        <td width = "82px"><input type="radio" name="typeView"> <span class="small-text">Documented</span></td>
                                        <td><input type="checkbox"> <span class="small-text">More</span></td>
                                    </tr>
                                    <tr rowspan="5">
                                        <td>
                                            <div id="grad1">
                                                <div id="bar">
                                                    <div id ="status"></div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <button type="button" onclick="myFunction(<?php echo $param;?>)" >Get result</button>
                                
                                <h2>In Summary</h2>
                                
                        </div>
                        <table>
                            <ul>
                                <li class="for-chek">
                                    <span class="chek-mark myMarg"> &#10004;</span>
                                    <div class="square-green"></div>
                                    <span class="small-text">from 52 to 80</span>
                                </li>
                                <li class="for-chek">
                                    <span class="chek-mark hidden"> &#10004;</span>
                                    <div class="square-yellow"></div> 
                                    <span class="small-text">from 35 to 51</span>
                                </li>
                                <li class="for-chek">
                                    <span class="chek-mark hidden"> &#10004;</span>
                                    <div class="square-red"></div> 
                                    <span class="small-text">from 1 to 34</span>
                                </li>
                            </ul>
                        </table>
                                
                    </td>
                </tr>
                <tr>
                    <td width="30"><label>
                        <input type="checkbox" value="checkboxValue" name="checkboxName" checked>
                    </label>
                    </td>
                    <td width="25">12</td>
                    <td width="310">Naturalness in safety matter:</td>
                    <td width="25"><?php echo getNumber($selection_arr[26]);?></td>
                    <td width="35"><img src="img/<?php echo getImages($selection_arr[26]);?>" width="16" height="16"
                                                                  border="0"></td>
                    <td width="450">
                        <div align="left">
                            <?php echo $selection_arr[26];?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="30"><label>
                        <input type="checkbox" value="checkboxValue" name="checkboxName" checked>
                    </label>
                    </td>
                    <td width="25">13</td>
                    <td width="310">Quality of the work</td>
                    <td width="25"><?php echo getNumber($selection_arr[27]);?></td>
                    <td width="35"><img src="img/<?php echo getImages($selection_arr[27]);?>" width="16" height="16"
                                                                  border="0"></td>
                    <td width="450">
                        <div align="left">
                            <?php echo $selection_arr[27];?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="30"><label>
                        <input type="checkbox" value="checkboxValue" name="checkboxName" checked>
                    </label>
                    </td>
                    <td width="25">14</td>
                    <td width="310">Natural sense of organization:</td>
                    <td width="25"><?php echo getNumber($selection_arr[28]);?></td>
                    <td width="35"><img src="img/<?php echo getImages($selection_arr[28]);?>" width="16" height="16"
                                                                  border="0"></td>
                    <td width="450">
                        <div align="left">
                            <?php echo $selection_arr[28];?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="30"><label>
                        <input type="checkbox" value="checkboxValue" name="checkboxName" checked>
                    </label>
                    </td>
                    <td width="25">15</td>
                    <td width="310">Naturalness in terms of work rate:</td>
                    <td width="25"><?php echo getNumber($selection_arr[29]);?></td>
                    <td width="35"><img src="img/<?php echo getImages($selection_arr[29]);?>" width="16" height="16"
                                                                  border="0"></td>
                    <td width="450">
                        <div align="left">
                            <?php echo $selection_arr[29];?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="30"><label>
                        <input type="checkbox" value="checkboxValue" name="checkboxName" checked>
                    </label>
                    </td>
                    <td width="25">16</td>
                    <td width="310">Naturalness in responsibilities:</td>
                    <td width="25"><?php echo getNumber($selection_arr[30]);?></td>
                    <td width="35"><img src="img/<?php echo getImages($selection_arr[30]);?>" width="16" height="16"
                                                                  border="0"></td>
                    <td width="450">
                        <div align="left">
                            <?php echo $selection_arr[30];?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="30"><label>
                        <input type="checkbox" value="checkboxValue" name="checkboxName" checked>
                    </label>
                    </td>
                    <td width="25">17</td>
                    <td width="310">Naturalness for initiative:</td>
                    <td width="25"><?php echo getNumber($selection_arr[31]);?></td>
                    <td width="35"><img src="img/<?php echo getImages($selection_arr[31]);?>" width="16" height="16"
                                                                  border="0"></td>
                    <td width="450">
                        <div align="left">
                            <?php echo $selection_arr[31];?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="30"><label>
                        <input type="checkbox" value="checkboxValue" name="checkboxName" checked>
                    </label>
                    </td>
                    <td width="25">18</td>
                    <td width="310">Naturalness in social behavior:</td>
                    <td width="25"><?php echo getNumber($selection_arr[32]);?></td>
                    <td width="35"><img src="img/<?php echo getImages($selection_arr[32]);?>" width="16" height="16"
                                                                  border="0"></td>
                    <td width="450">
                        <div align="left">
                            <?php echo $selection_arr[32];?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="30"><label>
                        <input type="checkbox" value="checkboxValue" name="checkboxName" checked>
                    </label>
                    </td>
                    <td width="25">19</td>
                    <td width="310">Motivation and interest in investing in this function:</td>
                    <td width="25"><?php echo getNumber($selection_arr[33]);?></td>
                    <td width="35"><img src="img/<?php echo getImages($selection_arr[33]);?>" width="16" height="16"
                                                                  border="0"></td>
                    <td width="450">
                        <div align="left">
                            <?php echo $selection_arr[33];?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="30"><label>
                        <input type="checkbox" value="checkboxValue" name="checkboxName" checked>
                    </label>
                    </td>
                    <td width="25">20</td>
                    <td width="310">Naturalness in terms of professional availability:</td>
                    <td width="25"><?php echo getNumber($selection_arr[34]);?></td>
                    <td width="35"><img src="img/<?php echo getImages($selection_arr[34]);?>" width="16" height="16"
                                                                  border="0"></td>
                    <td width="450">
                        <div align="left">
                            <?php echo $selection_arr[34];?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="30"><label>
                        <input type="checkbox" value="checkboxValue" name="checkboxName" checked>
                    </label>
                    </td>
                    <td width="25">21</td>
                    <td width="310">Naturalness in attendance and punctuality at work:</td>
                    <td width="25"><?php echo getNumber($selection_arr[35]);?></td>
                    <td width="35"><img src="img/<?php echo getImages($selection_arr[35]);?>" width="16" height="16"
                                                                  border="0"></td>
                    <td width="450">
                        <div align="left">
                            <?php echo $selection_arr[35];?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="30"><label>
                        <input type="checkbox" value="checkboxValue" name="checkboxName" checked>
                    </label>
                    </td>
                    <td width="25">22</td>
                    <td width="310">Natural aptitude for training:</td>
                    <td width="25"><?php echo getNumber($selection_arr[36]);?></td>
                    <td width="35"><img src="img/<?php echo getImages($selection_arr[36]);?>" width="16" height="16"
                                                                  border="0"></td>
                    <td width="450">
                        <div align="left">
                            <?php echo $selection_arr[36];?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="30"><label>
                        <input type="checkbox" value="checkboxValue" name="checkboxName" checked>
                    </label>
                    </td>
                    <td width="25">23</td>
                    <td width="310">Natural ability for command:</td>
                    <td width="25"><?php echo getNumber($selection_arr[37]);?></td>
                    <td width="35"><img src="img/<?php echo getImages($selection_arr[37]);?>" width="16" height="16"
                                                                  border="0"></td>
                    <td width="450">
                        <div align="left">
                            <?php echo $selection_arr[37];?>
                        </div>
                    </td>
                </tr>
    
            </table>
        </fieldset>
    
    </div>
     <script>
        
        $(document).ready(function() {
            var node = document.doctype;
            var doctypeHtml = "<!DOCTYPE "
             + node.name
             + (node.publicId ? ' PUBLIC "' + node.publicId + '"' : '')
             + (!node.publicId && node.systemId ? ' SYSTEM' : '') 
             + (node.systemId ? ' "' + node.systemId + '"' : '')
             + '>';
             
            var result = doctypeHtml + document.documentElement.outerHTML;
            
            var page = result;
            var email = '<?php echo $selection_arr[39];?>';
            //alert (page);
            //alert(email);
            $("#send").click(function() {
                
                $.ajax({
                    type: "POST",
                    url: 'senderTests.php',
                    data: {
                        message: page,
                        email: email
                    },
                    success: function(data)
                    {
                        document.location.href = "senderTests.php";
                    }
                });
            });
        });

    </script>
    <button id="send">
        Send result
    </button>
   
    <?php
        if(isset($_POST['email']))
        {
            echo "<pre>";
                print_r($_POST['message']);
                print_r($_POST['email']);
            echo "<pre>";
             
            $uid = $_POST['userID'];

        // Do whatever you want with the $uid
        }
    
    
        }
        else
        {
            echo "Error in query ". $mysqli->errno();
        }
        
    
    
?>
</body>

</html>





    
    
 
