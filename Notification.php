<?php
include("confing.php");
if(!isset($_SESSION['iduser'])){
    echo '<script>location.replace("../")</script>';
}else{
    $iduser=$_SESSION['iduser'];

    if(isset($_REQUEST['id']) ){
        $id=sqi($_REQUEST['id']);
        $getnotficatin=runsql("SELECT * FROM tblNotification where iduser=$iduser   and status=0 order by idNotification desc LIMIT 4");
        updaterecord("tblNotification",array("status"=>1),"iduser=$iduser and idNotification=$id");
        echo '<script>location.replace("../Notification")</script>';

    }else{
        if(isset($_REQUEST['action']) and $_REQUEST['action']=='all' ){
            $id=sqi($_REQUEST['id']);
            $getnotficatin=runsql("SELECT * FROM tblNotification where iduser=$iduser   and status=0 order by idNotification desc LIMIT 4");
            updaterecord("tblNotification",array("status"=>1),"iduser=$iduser ");
            echo '<script>location.replace("../Notification")</script>';

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
    <title>DataBase Project| invitations </title>
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

<?php include("_incloud.php");?>
<!--  END SIDEBAR  -->

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="page-header">
        <div class="page-title">
            <h3>نوتفکیشن ها</h3><a href="Notification?action=all" class="btn btn-danger">خوانده شدن همه</a>
        </div>
    </div>
    <div class="row layout-top-spacing"  >
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">
                    <table id="zero-config" class="table table-hover" >
                        <thead>
                        <tr>
                            <th>کد اختصاصی</th>
                            <th> متن </th>
                            <th>وضعیت</th>

                            <th>عملیات</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=1;
                        $getnotficatin=runsql("SELECT * FROM tblNotification where iduser=$iduser    order by idNotification desc LIMIT 4");

                        foreach ($getnotficatin as $key) {
                            if($key['status']==0){
                                $status='خوانده نشده';
                            }else{
                                $status='خوانده شده';
                            }
                            echo '
                                  <tr>
                                    <td>'.$i.'</td>
                                    <td>'.$key['vlaue'].'</td>
                                     <td>'.$status.'</td>';
                            if($key['status']==0){
                                echo '<td><a href="Notification?id='.$key['idNotification'].'" class="btn btn-primary">تغییر وضعیت </a></td>';
                            }else{
                                echo '<td></td>';

                            }
                                     


                               echo' </tr>' ;
                            $i++;
                        }



                        ?>

                        </tbody>





                    </table>
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
