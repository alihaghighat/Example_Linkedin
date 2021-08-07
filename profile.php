<?php include("confing.php");
if (!isset($_SESSION['iduser'])) {
    echo '<script>location.replace("../")</script>';
} else {
    if (isset($_REQUEST['iduser'])) {
        $idusersee = sqi($_REQUEST['iduser']);
        $iduser = $_SESSION['iduser'];
        $date = date("Y-m-d  h:i:sa", time());
        $getuser = getrecord("tbluser", "iduser=$iduser");
        $notfcations = $getuser[0]['name'] . ' ' . $getuser[0]['lastname'] . 'از پروفایل شما در تاریخ' . $date . 'بازدید کرد. ';
        addrecored("tblNotification", array("iduser" => $idusersee, "kind" => 2, "idkind" => $iduser, "vlaue" => $notfcations, "status" => 0));
    } else {
        echo '<script>location.replace("search-user-sair")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>DataBase Project| connect </title>
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

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3>مشخصات</h3>
            </div>
        </div>
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive mb-4 mt-4">
                        <table id="zero-config" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>کد اختصاصی</th>
                                    <th> نام و نام خانوادگی </th>

                                    <th>نام کاربری</th>

                                    <th>مکان</th>

                                    <th>شرکت فعلی</th>
                                    <th>زبان نمایه</th>





                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;

                                $get = runsql("SELECT * FROM tbluser,tblUserDetail where tbluser.iduser=$idusersee and tblUserDetail.iduser=tbluser.iduser");

                                echo '
                                  <tr>
                                    <td>' . $i . '</td>
                                    <td>' . $get[0]['name'] . ' ' . $get[0]['lastname'] . '</td>
                                     <td>' . $get[0]['username'] . '</td>
                                     <td>' . $get[0]['Location'] . '</td>
                                     <td>' . $get[0]['Current_company'] . '</td>
                                     <td>' . $get[0]['Profile_language'] . '</td>
                                    
                                    
           
                                    </td>
                                </tr>';





                                ?>

                            </tbody>
                            <thead>
                                <tr>
                                    <th>اطلاعات</th>
                                    <th>دستاوردها</th>
                                    <th> زمینه </th>

                                    <th>ویژه</th>

                                    <th>درباره</th>

                                    <th>معرفی</th>




                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;

                                $get = runsql("SELECT * FROM tbluser,tblUserDetail where tbluser.iduser=$idusersee and tblUserDetail.iduser=tbluser.iduser");








                                echo '
                                  <tr>
                                  <td>' . $get[0]['information'] . '</a>
                                    <td>' . $get[0]['Accomplishments'] . '</td>
                                    <td>' . $get[0]['Background'] . '</td>
                                     <td>' . $get[0]['Featured'] . '</td>
                                     <td>' . $get[0]['About'] . '</td>
                                     <td>' . $get[0]['Intro'] . '</td>
                                    
           
                                    </td>
                                </tr>';





                                ?>

                            </tbody>
                            <thead>
                                <tr>
                                    <th>ردیف </th>
                                    <th>نام مهارت </th>
                                    <th>تایید شده</th>
                                    <th>افراد تایید کننده</th>
                                    <th>عملیات </th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $getskil = getrecord("tblSkill", "iduser=$idusersee and kind=1");
                                $i = 0;
                                foreach ($getskil as $key) {
                                    $idskie = $key['idSkile'];
                                    $getaver = runsql(" SELECT  AVG (star) as avg1 FROM tblendorse,tbluser where idskill=$idskie and tbluser.iduser=tblendorse.iduser");

                                    $getaver1 = runsql(" SELECT tbluser.name,tbluser.lastname FROM tbluser,tblendorse where idskill=$idskie and tbluser.iduser=tblendorse.iduser");
                                    $getcont = runsql(" SELECT COUNT(*) as Tedad FROM tbluser,tblendorse where idskill=$idskie and tbluser.iduser=tblendorse.iduser");
                                    $i++;

                                    echo '
                                  <tr>
                                  <td>' . $i . '</a>
                                    <td>' . $key['value'] . '</td>
                                    <td>' . round($getaver[0]['avg1'], 1) . '</td>';
                                    if ($getcont[0]['Tedad'] > 0) {
                                        echo '<td>' . $getaver1[0]['name'] . ' ' . $getaver1[0]['lastname'] . ' و ' . ($getcont[0]['Tedad'] - 1) . ' دیگر</td>';
                                    } else {
                                        echo '<td></td>';
                                    }
                                    echo '  <td><a class="btn btn-primary" href="endorse?idskill=' . $key['idSkile'] . '">endorse</a></td>
                                     
           
                                   
                                </tr>';
                                }



                                ?>

                            </tbody>
                            <thead>
                                <tr>
                                    <th>ردیف </th>
                                    <th>نام زبان </th>

                                    <th>عملیات </th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $getskil = getrecord("tbllanguages", "iduser=$idusersee and kind=1");
                                $i = 0;
                                foreach ($getskil as $key) {
                                    $i++;
                                    echo '
                                  <tr>
                                  <td>' . $i . '</a>
                                    <td>' . $key['value'] . '</td>
                                    <td></td>
                                     
           
                                   
                                </tr>';
                                }



                                ?>

                            </tbody>



                        </table>
                    </div>
                </div>
            </div>

        </div>

        <?php

        if (runsql("SELECT * FROM tblconnection WHERE (iduser1 = $iduser AND iduser2 = $idusersee) OR (iduser2 = $iduser AND iduser1 = $idusersee)")) {
            echo '
            <div class="page-header">
            <div class="page-title">
                <h3>ارسال پیام</h3>
            </div>
        </div>
        <div class="row layout-top-spacing">
            <div class="col-lg-12 col-12 layout-spacing">
                <div class="statbox widget box box-shadow">

                    <div class="widget-content widget-content-area">

                        <a href="chat?iduser=' . $idusersee . '" class="btn btn-info">ارسال پیام</a>

                    </div>
                </div>
            </div>

        </div>';
        }
        ?>

        <div class="row layout-top-spacing">
            <div class="col-lg-12 col-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>پست ها </h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">


                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">

                            <div class="row widget-statistic">
                                <?php
                                $get = runsql("SELECT * FROM tblPost,tbluser WHERE tbluser.iduser=tblPost.iduser and tblPost.iduser = $idusersee");
                                foreach ($get as $key) {
                                    echo '<div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="card component-card_2">';
                                    if ($key['url'] != NULL) {
                                        echo '<img src="' . $key['url'] . '" class="card-img-top" alt="widget-card-2">';
                                    } else {
                                        echo '<img src="postPhotos/download.png" class="card-img-top" alt="widget-card-2">';
                                    }
                                    $array = array_map('strval', explode(' ', $key['text']));
                                    echo ' <div class="card-body">
                                    <h6 class="card-title">' . $key['name'] . ' ' . $key['lastname'] . '</h6>
                                    <p class="card-text">' . $array[0] . ' ' . $array[1] . ' ' . $array[3] . '</p>
                                    <a href="Post-see?idpost=' . $key['postId'] . ' " class="btn btn-primary">بیشتر</a>
                                </div>
                            </div>
                        </div>';
                                }
                                ?>







                            </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>


    </div>



</div>
<!--  END CONTENT AREA  -->


</div>
<!-- END MAIN CONTAINER -->

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
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

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="plugins/apex/apexcharts.min.js"></script>
<script src="assets/js/dashboard/dash_1.js"></script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

</body>

</html>

<style>
    .card-img-top {
        height: 300px;
    }
</style>