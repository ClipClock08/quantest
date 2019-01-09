<script>
    window.onload = function () {
        document.getElementById('add_job').addEventListener('click', delItem);

        function delItem(e) {
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
include("header_q.php");

?>
<div class="block_for_messages">
    <?php
    //If there are error messages in the session, then output them
    if (isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])) {
        echo $_SESSION["error_messages"];

        //Destroy the error_messages cell so that error messages do not reappear when the page is updated.
        unset($_SESSION["error_messages"]);
    }

    //If there are joyful messages in the session, then output them
    if (isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])) {
        echo $_SESSION["success_messages"];

        //Destroy the success_messages cell so that messages do not reappear when the page is updated.
        unset($_SESSION["success_messages"]);
    }

    ?>
</div>
<h1>Calculate the price and order your tests? Nothing's easier! </h1>
<table border="0" width="700" cellspacing="2" cellpadding="2" id="add_job">
    <form action="quotationRecruitment.php" method="post" name="exigences"></form>
    <tbody>
    <tr>
        <td colspan="2">
            <fieldset>
                <legend><b>QUOTE for a RECRUITMENT TEST</b></legend>
                <table border="0" cellspacing="2" cellpadding="0">
                    <tbody>
                    <tr>
                        <td valign="middle" width="185">
                            <div align="left">
                                Title of the position:
                            </div>
                        </td>
                        <td><input name="job[0]" placeholder="example: commercial director" size="50" type="text"></td>
                    </tr>
                    <tr>
                        <td valign="top" width="185">
                            <div align="left">
                                Position status:
                            </div>
                        </td>
                        <td><select name="experience" id="experience">
                                <option value="1">select...</option>
                                <option value="2">Senior manager</option>
                                <option value="3">Middle manager</option>
                                <option value="4">Employee</option>
                                <option value="5">Worker</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td valign="top" width="185">
                            <div align="left">
                                Candidates to test:
                            </div>
                        </td>
                        <td><input type="text" placeholder="1,2,3,.." id="nbCandidats" name="nbCandidates" size="4">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </fieldset>
        </td>
        <td>Net <b>PRICE</b> <input type="text" name="textfieldName" size="4"> <br>
            <br>
            <button class="button">Order now!</button>
        </td>
    </tr>
    </form>
    </tbody>
</table>
<p></p><p><?php
    if (!isset($_SESSION["email"]) && empty($_SESSION["password"])) {
        echo "<div valign='top'><a class='buttonuch' href='#popup1'>Calculate the price</a></div>";
    } else {
        echo "<div valign='top'><input name='save01' type='submit' value='Calculate the price'></div>";
    }
    ?><br>
<table border="0" width="700" cellspacing="2" cellpadding="2" id="add_job">
    <form action="quotationRecruitment.php" method="post" name="exigences"></form>
    <tbody>
    <tr>
        <td colspan="2">
            <fieldset>
                <legend><b>QUOTE for a RECONVERSION TEST</b></legend>
                <table border="0" cellspacing="2" cellpadding="0">
                    <tbody>
                    <tr>
                        <td valign="top" width="318">
                            <div align="left">
                                Collaborator(s) to reclassify:
                            </div>
                        </td>
                        <td width="107"><input type="text" placeholder="1,2,3,.." id="nbCandidates"
                                               name="specification_cap" size="4"></td>
                    </tr>
                    <tr>
                        <td valign="top" width="318">
                            <div align="left">
                                Reclassification options:
                            </div>
                        </td>
                        <td width="107"><input type="text" placeholder="1,2,3,.." id="nbCandidates"
                                               name="specification_cap" size="4"></td>
                    </tr>
                    </tbody>
                </table>
            </fieldset>
        </td>
        <td>Net <b>PRICE</b> <input type="text" name="textfieldName" size="4"><br>
            <br>
            <button class="button">Order now!</button>
        </td>
        </td>
    </tr>
    </form>
    </tbody>
</table>
<br>
<b>Collaborator (s) to reclassify</b> = number of people to be tested for the same position (s).
Example: preview the skills of 4 people on 6 positions. We test each of the 4 people on the 6 possible reclassification options. Simple and fast, please order a separate test for each of your combinations.
<p><?php
    if (!isset($_SESSION["email"]) && empty($_SESSION["password"])) {
        echo "<div valign='top'><a class='buttonuch' href='#popup1'>Calculate the price</a></div>";
    } else {
        echo "<div valign='top'><input name='save01' type='submit' value='Calculate the price'></div>";
    }
    ?>
    <div id="popup1" class="overlay">
        <div class="popup">
            <h2>Dear User,</h2>
            <a class="close" href="#">&times;</a>
            <div class="content">
<p>This feature is active when you are connected. Please, <a
            href="<?php echo $address_site;?>lang/en/form_auth.php">connect</a> or <a
            href="<?php echo $address_site;?>lang/en/form_register.php">register</a></p>
</div>
</div>
</div>

</div>
</form><?php


include_once("footer.php");

