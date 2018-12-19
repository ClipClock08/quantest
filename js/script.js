function goHiring() {
    window.location = "selection.php";
}

function goProff() {
    window.location = "reconversion_form.php";
}

function manual() {
    window.location = "config/manual_config.php";
}

function expert() {
    window.location = "config/expert_config.php";
}


var tr_num = 1;
var id_tr = 2;

function add_candidat_line() {
    var template = `<tr>
                        <td bgcolor="#ffffcc">${id_tr}</td>
                        <td bgcolor="#ffffcc" width="222">
                            <input type="text" name="family_name[${tr_num}]" required size="30">
                        </td>
                        <td bgcolor="#ffffcc" width="222">
                            <input type="text" name="first_name[${tr_num}]" required size="30">
                        </td>
                        <td bgcolor="#ffffcc" width="50">
                            <input name="born_date[${tr_num}]" required type="date">
                        </td>
                        <td bgcolor="#ffffcc" width="45">
                            <input type="radio" name="gender[${tr_num}]" value="Male" required>M
                            <input type="radio" name="gender[${tr_num}]" value="Female">F
                        </td>
                        
                    </tr> 
                    <tr><span class="cancel"> x </span</tr>`;

    document.getElementById('add_line').insertAdjacentHTML("beforeend", template);

    tr_num++;
    id_tr++;

}


var id_field = 2;
var id_job = 3;

function add_job() {
    var template = `<tr>
                            <td colspan="2">
                                <fieldset>
                                    <legend><b>Generalities of the option of JOB ${id_job}</b></legend>
                                    <table border="0" cellspacing="2" cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td valign="middle" width="241">
                                                <div align="left">
                                                    Title of Job ${id_job}:</div>
                                            </td>
                                            <td width="437"><input name="job[${id_field}]" size="50" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td valign="top" width="241">
                                                <div align="left">Not the same service? <br>Type it:</div>
                                            </td>
                                            <td valign="bottom" width="437"><input name="service_name[${id_field}]" size="50" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td valign="middle" width="241">
                                                <div align="left">
                                                    Specify the function:</div>
                                            </td>
                                            <td width="437"><select id="fonction" name="service_name[${id_field}]">
                                                    <option value="1">select...</option>
                                                    <option value="2">Manager</option>
                                                    <option value="3">Middle management</option>
                                                    <option value="4">Employee</option>
                                                    <option value="5">Salaried</option>

                                                </select></td>
                                        </tr>
                                        
                                        </tbody>
                                    </table>
                                </fieldset>
                            </td>
                            <tr><span class="cancel"> x </span</tr>
                        </tr>`;

    document.getElementById('add_job').insertAdjacentHTML("beforeend", template);

    id_field++;
    id_job++;

}

// progressbar
function myFunction(h){
    if (h>80){
        our_var = 80;
    } else if(h<1){
        our_var = 1;
    }
    else {our_var=h;}
    document.getElementById("status").style.height = our_var*2 + 17 + "px";
    document.getElementById("status").innerHTML = Math.floor(our_var) + "/80";

}