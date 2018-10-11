function goHiring() {
    window.location = "selection.php"
}

function goProff() {
    window.location = "reconversion.php"
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
                        <td bgcolor="#ffffcc" width="222"><input type="text" name="family_name[${tr_num}]" size="30"></td>
                        <td bgcolor="#ffffcc" width="222"><input type="text" name="first_name[${tr_num}]" size="30"></td>
                        <td bgcolor="#ffffcc" width="50"><input name="born_date[${tr_num}]" type="date"></td>
                        <td bgcolor="#ffffcc" width="45"><input type="radio" name="gender[${tr_num}]" value="M">M
                        <input type="radio" name="gender[${tr_num}]" value="F">F</td></tr>`;

    document.getElementById('add_line').insertAdjacentHTML("beforeend", template);

    tr_num++ ;
    id_tr++;

}
