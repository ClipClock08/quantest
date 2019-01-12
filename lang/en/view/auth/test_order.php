<?php
/**
 * Created by PhpStorm.
 * User: alexdev
 * Date: 08.10.18
 * Time: 11:21
 */
include("../header_q.php");
if (!isset($_SESSION["email"]) && empty($_SESSION["password"])) {
    exit("<p><strong>Oops!</strong> The requested page can not be viewed offline. Please visit the <a href=" . $address_site . ">home page</a> to login or register.</p>");
} else {

    ?>
    <div id="modal"></div>
    <div class="modalBody">
        <h2>
            Hello, <?php echo $_SESSION['name'] ?><br/>
            Do not be shy, order a test!
        </h2>
        <hr>
        <div class="select-style">
            <select name="test" id="viewSelector">
                <option value="0">Select a test</option>
                <option value="1">Recruitment</option>
                <option value="2">Reconversion</option>
            </select>
        </div>
        <div id="view1" class="select-style">
            <!--output candidates-->
        </div>
        <div id="cand_jobs" class="select-style">
            <!--output candidates-->
        </div>
        <div id="view3" class="select-style">
            <!--output jobs-->
        </div>

        <div id="reclassified" class="select-style">
            <!--output candidates-->
        </div>
        <p> Your comment(not required)
            <textarea placeholder="message..."></textarea>
        </p>
        <a class="btn-modal" href="#">Send</a>
        <hr>
    </div>

    <script>
        //id for getting info from current company selection
        $('#viewSelector').on('change', function () {
            $("cand_jobs").show();
            $("#candidat").empty(); // clear last select
            var test_type = $("#viewSelector option:selected").val();
            var id_client = '<?php echo $_SESSION['id']; ?>';
            $.ajax({
                method: 'POST',
                url: '../../ajax/candidates_list.php',
                data: {
                    test_type: test_type,
                    id_client: id_client
                },
                dataType: 'html',
            }).done(function (response) {

                $('#view1').html(response);

                // for getting info for candidates job
                $('#candidat').on('change', function () {
                    var candidate = $("#candidat option:selected").val();
                    //alert(candidate);
                    var id_client = '<?php echo $_SESSION['id']; ?>';
                    $.ajax({
                        method: 'POST',
                        url: '../../ajax/candidate_jobs.php',
                        data: {
                            candidate: candidate,
                            id_client: id_client
                        },
                        dataType: 'html',
                    }).done(function (response) {

                        $('#cand_jobs').html(response);
                    });
                });
            });
        });


        //id for getting info from current company for reconversion
        $('#viewSelector').on('change', function () {
            var test_type = $("#viewSelector option:selected").val();
            var id_client = '<?php echo $_SESSION['id']; ?>';
            $.ajax({
                method: 'POST',
                url: '../../ajax/jobs_list.php',
                data: {
                    test_type: test_type,
                    id_client: id_client
                },
                dataType: 'html',
            }).done(function (response) {

                $('#view3').html(response);

                // for getting info for candidates job
                $('#reclass').on('change', function () {
                    var job = $("#reclass option:selected").val();
                    alert(job);
                    var id_client = '<?php echo $_SESSION['id']; ?>';
                    $.ajax({
                        method: 'POST',
                        url: '../../ajax/reclass.php',
                        data: {
                            job: job,
                            id_client: id_client
                        },
                        dataType: 'html',
                    }).done(function (response) {

                        $('#reclassified').html(response);
                    });
                });
            });
        });
    </script>

    <?php
}
include_once("../footer.php");
