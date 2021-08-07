<?php include('confing.php');
$iduser = $_SESSION['iduser'];

if (!isset($_REQUEST['iduser'])) {
    echo "<script>window.location = 'main'</script>";
    return;
}



//check that we have previous conversation or not
$chat = runsql("SELECT * FROM tblchat WHERE (iduser1 = $iduser OR iduser2 = $iduser) AND (iduser1 = $_REQUEST[iduser] OR iduser2 = $_REQUEST[iduser])");
if ($chat == false) {
    // create conversation between two users
    addrecored('tblchat', array('iduser1' => $iduser, 'iduser2' => $_REQUEST['iduser']));
}

//now we have conversation between these two
$chat = runsql("SELECT * FROM tblchat WHERE (iduser1 = $iduser OR iduser2 = $iduser) AND (iduser1 = $_REQUEST[iduser] OR iduser2 = $_REQUEST[iduser])")[0];
runsql("Update tblmessage Set messageRead = 1 Where idchat = $chat[idchat] AND iduser != $iduser");
?>

<head>
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>DataBase Project| Home </title>
    <link href="assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/loader.js"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/structure.css" rel="stylesheet" type="text/css" class="structure" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" class="dashboard-analytics" />

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>

<?php include("_incloud.php"); ?>
<!--  END SIDEBAR  -->

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="page-header">
            <div class="page-title">
                <h3>پیام ها </h3>
            </div>
        </div>

        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing" id="chat-messages" style="height: 700px !important; overflow-y:scroll">
                <div class="row">
                </div>
                <div class="row widget-statistic">
                    <?php
                    $get = runsql("SELECT * FROM tblmessage WHERE tblmessage.idchat = $chat[idchat]");
                    foreach ($get as $key) {
                        if ($key['iduser'] == $iduser) {
                            echo '<div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 col-9 my-3">
                            <div class="card component-card_2">';
                            if ($key['idpost'] != null) {
                                $post = runsql("SELECT * FROM tblPost,tbluser WHERE tblPost.postId = $key[idpost] AND tbluser.iduser = tblPost.iduser")[0];
                                $array = array_map('strval', explode(' ', $post['text']));
                                echo '<img src="' . $post['url'] . '" class="card-img-top" alt="widget-card-2">
                                <div class="card-body">
                                    <h6 class="card-title">' . $post['name'] . ' ' . $post['lastname'] . '</h6>
                                    <p class="card-text">' . $array[0] . ' ' . $array[1] . ' ' . $array[3] . '</p>
                                    <a href="Post-see?idpost=' . $post['postId'] . ' " class="btn btn-primary">بیشتر</a>
                                </div>';
                            } else {
                                echo "<div class='card-body'>
                                    $key[text];
                                </div>";
                            }

                            echo ' 
                            </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-8"></div>';
                        } else {
                            echo '<div class="col-xl-6 col-lg-5 col-md-5 col-sm-5 col-3"></div>';
                            echo '<div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 col-9 my-3">
                            <div class="card component-card_2">';
                            if ($key['idpost'] != null) {
                                $post = runsql("SELECT * FROM tblPost,tbluser WHERE tblPost.postId = $key[idpost] AND tbluser.iduser = tblPost.iduser")[0];
                                $array = array_map('strval', explode(' ', $post['text']));
                                echo '<img src="' . $post['url'] . '" class="card-img-top" alt="widget-card-2">
                                <div class="card-body">
                                    <h6 class="card-title">' . $post['name'] . ' ' . $post['lastname'] . '</h6>
                                    <p class="card-text">' . $array[0] . ' ' . $array[1] . ' ' . $array[3] . '</p>
                                    <a href="Post-see?idpost=' . $post['postId'] . ' " class="btn btn-primary">بیشتر</a>
                                </div>';
                            } else {
                                echo "<div class='card-body'>
                                    $key[text];
                                </div>";
                            }

                            echo ' 
                            </div>
                            </div>
                           ';
                        }
                    }
                    ?>

                </div>
            </div>
            <input type="search" class="form-control" onchange="sendMessage(<?php echo $chat['idchat']; ?>)" id="message-text" placeholder="تایپ کنید ..." aria-controls="zero-config">
            <script>
                $('#chat-messages').scrollTop($('#chat-messages')[0].scrollHeight);

                function sendMessage(idchat) {
                    var messageText = $('#message-text').val();
                    $.ajax({
                        url: 'function/sendMessage.php',
                        type: 'post',
                        data: {
                            'text': messageText,
                            'idchat': idchat

                        },
                        success: function(data) {

                            if (data == 'true') {
                                location.reload();
                            }
                        }
                    });

                }
            </script>


        </div>
    </div>


</div>
<!--  END CONTENT AREA  -->
<script src="assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="bootstrap/js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/js/app.js"></script>

<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="assets/js/custom.js"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="plugins/table/datatable/datatables.js"></script>
<script>
    $('#zero-config').DataTable({
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>'
            },
            "sInfo": "صفحه _PAGE_ از _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "جستجو کنید...",
            "sLengthMenu": "نتایج :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 7
    });
</script>

</div>
<!-- END MAIN CONTAINER -->