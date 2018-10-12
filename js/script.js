function goHiring() {
    window.location = "selection.php"
}

function goProff() {
    window.location = "reconversion_form.php"
}

function manual() {
    window.location = "config/manual_config.php"
}

function expert() {
    window.location = "config/expert_config.php"
}


var tr_num = 1;
var id_tr = 2;

function add_candidat_line() {
    var template = `<tr><td bgcolor="#ffffcc">${id_tr}</td>
                        <td bgcolor="#ffffcc" width="222"><input type="text" name="family_name[${tr_num}]" required size="30"></td>
                        <td bgcolor="#ffffcc" width="222"><input type="text" name="first_name[${tr_num}]" required size="30"></td>
                        <td bgcolor="#ffffcc" width="50"><input name="born_date[${tr_num}]" required type="date"></td>
                        <td bgcolor="#ffffcc" width="45"><input type="radio" name="gender[${tr_num}]" value="Male">M
                        <input type="radio" name="gender[${tr_num}]" value="Female">F</td></tr>`;

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
                                                    <option value="manager">Manager</option>
                                                    <option value="midle_management">Middle management</option>
                                                    <option value="Employee">Employee</option>
                                                    <option value="Salaried">Salaried</option>

                                                </select></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </fieldset>
                            </td>
                        </tr>`;

    document.getElementById('add_job').insertAdjacentHTML("beforeend", template);

    id_field++;
    id_job++;

}
