<?php
include("confing.php");
if (!isset($_SESSION['iduser'])) {
    echo '<script>location.replace("../")</script>';
} else {
    $iduser = $_SESSION['iduser'];
    $result = 1;



    if (isset($_REQUEST['idchat'])) {
        $idchat = sqi($_REQUEST['idchat']);
        $d = delet_recorc("tblchat", "idchat=$idchat");
        if ($d) {
            echo '<script>alert("با موفقیت حذف شد.");location.replace("../chats")</script>';
        } else {
            echo '<script>alert("مشکی پیش امده");location.replace("../chats")</script>';
        }
    }
    if (isset($_REQUEST['idchat_archive'])) {
        $idchat = sqi($_REQUEST['idchat_archive']);
        $d = updaterecord("tblchat", array("archive" => 1), "idchat=$idchat");
        if ($d) {
            echo '<script>alert("با موفقیت ارشیو شد.");location.replace("../chats")</script>';
        } else {
            echo '<script>alert("مشکی پیش امده");location.replace("../chats")</script>';
        }
    }
    if (isset($_REQUEST['idchat_unarchive'])) {
        $idchat = sqi($_REQUEST['idchat_unarchive']);
        $d = updaterecord("tblchat", array("archive" => 0), "idchat=$idchat");
        if ($d) {
            echo '<script>alert("با موفقیت از ارشیو خارج شد.");location.replace("../chats")</script>';
        } else {
            echo '<script>alert("مشکی پیش امده");location.replace("../chats")</script>';
        }
    }
    if (isset($_REQUEST['filterArshive'])) {
        if ($_SESSION['archive'] == 1) {
            $_SESSION['archive'] = 0;
        } else {
            $_SESSION['archive'] = 1;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>DataBase Project| search user </title>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/structure.css" rel="stylesheet" type="text/css" class="structure" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>


<?php include("_incloud.php"); ?>

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">


        <div class="page-header">
            <div class="page-title">
                <h3> نتیجه جستجو</h3>
                <?php
                if ($_SESSION['archive'] == 1) {
                    echo ' <a class="btn btn-warning" href="chats?filterArshive=1">فیلتر بر اساس ارشیو بودن</a>';
                } else {
                    echo ' <a class="btn btn-primary" href="chats?filterArshive=1">فیلتر بر اساس ارشیو نبودن</a>';
                }


                ?>

            </div>
        </div>
        <div class="row layout-top-spacing" <?php if ($result == 0) echo 'style="display: none"' ?>>
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive mb-4 mt-4">
                        <table id="zero-config" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>کد اختصاصی</th>
                                    <th> نام و نام خانوادگی </th>

                                    <th>نام کاربری</th>



                                    <th>عملیات</th>



                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                if ($result == 1) {
                                    $archive = $_SESSION['archive'];

                                    //chat ha ke ma dar an hastim bedoon tekrar
                                    $get = runsql("SELECT * FROM tblchat,tbluser WHERE (tblchat.iduser1 = tbluser.iduser OR tblchat.iduser2 = tbluser.iduser) AND tblchat.Delete_chat!=1 AND tbluser.iduser != $iduser AND tblchat.archive!=$archive AND (tblchat.iduser1 = $iduser OR tblchat.iduser2 = $iduser)");

                                    foreach ($get as $key) {
                                        if ($_SESSION['archive'] == 1) {
                                            $archive_unarchive = '<a class="btn btn-warning" href="chats?idchat_archive=' . $key['idchat'] . ' " >ارشیو کردن</a>';
                                        } else {
                                            $archive_unarchive = '<a class="btn btn-primary" href="chats?idchat_unarchive=' . $key['idchat'] . ' " >بیرون اوردن از ارشیو</a>';
                                        }
                                        $isRead = runsql("SELECT * FROM tblmessage WHERE idchat = $key[idchat] AND iduser != $iduser AND messageRead = 0");
                                        if ($isRead == false) {
                                            $str = " ";
                                        } else {
                                            $str = "<div style='color : red; font-size : 30px;display:inline-block;margin-top:20px;'> 	&#8226</div>";
                                        }


                                        echo '
                                  <tr>
                                    <td>' . $i . $str . '</td>
                                    <td>' . $key['name'] . ' ' . $key['lastname'] . '</td>
                                     <td>' . $key['username'] . '</td>
                                    
                                    <td><a class="btn btn-primary" href="chat?iduser=' . $key['iduser'] . ' " >ارسال پیام</a>
                                        <a class="btn btn-danger" href="chats?idchat=' . $key['idchat'] . ' " >حذف مکالمه</a>
                                        <button class="btn btn-info" onclick="markAsUnread(' . $key['idchat'] . ')">پیام نخوانده شده</button>
                                        ' . $archive_unarchive . '
                                    </td>
                                </tr>';


                                        $i++;
                                    }
                                }
                                ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>کد اختصاصی</th>
                                    <th> نام و نام خانوادگی </th>

                                    <th>نام کاربری</th>



                                    <th>عملیات</th>

                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>



</div>
<!--  END CONTENT AREA  -->


</div>
<!-- END MAIN CONTAINER -->

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

    function markAsUnread(idchat) {
        $.ajax({
            url: 'function/markAsUnread.php',
            type: 'post',
            data: {
                'idchat': idchat
            },
            success: function(data) {
                if (data == 'true') {
                    location.reload();
                } else {
                    alert(data);
                }
            }
        })
    }
</script>

</body>

</html>