<?php
include("confing.php");
if(!isset($_SESSION['iduser'])){
    echo '<script>location.replace("../")</script>';
}else{
    $iduser=$_SESSION['iduser'];


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
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

<?php include("_incloud.php");?>

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="page-header">
                <div class="page-title">
                    <h3>داشبورد</h3>
                </div>
            </div>

            <div class="row layout-top-spacing">





                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="row">
                        <h4> پست هایي که توسط افرادی که در نتوورک شما آن ها را پسندیده اند. </h4>

                    </div>
                    <div class="row widget-statistic">
                        <?php
                        $get=runsql("SELECT DISTINCT  tblPost.postId,tblPost.url,tblPost.text,tbluser.name,tbluser.lastname FROM tbluser,tblPost,tblLikePost where tbluser.iduser=tblPost.iduser and tblLikePost.idpost=tblPost.postId  and  tbluser.iduser!=$iduser and
                               ((tbluser.iduser IN (SELECT DISTINCT iduser2 FROM tblconnection where iduser1=$iduser)) or (tbluser.iduser IN (SELECT DISTINCT iduser1 FROM tblconnection where iduser2=$iduser))   )  ORDER BY postId   ");
                        foreach ($get as $key){
                            echo '<div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="card component-card_2">';
                            if($key['url']!=NULL){
                                echo '<img src="'.$key['url'].'" class="card-img-top" alt="widget-card-2">';
                            }
                            $array=array_map('strval', explode(' ',$key['text']));
                            echo ' <div class="card-body">
                                    <h6 class="card-title">'.$key['name'].' '.$key['lastname'].'</h6>
                                    <p class="card-text">'.$array[0].' '.$array[1].' '.$array[3].'</p>
                                    <a href="Post-see?idpost='.$key['postId'].'" class="btn btn-primary">بیشتر</a>
                                </div>
                            </div>
                        </div>';
                        }
                        ?>







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

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="plugins/apex/apexcharts.min.js"></script>
<script src="assets/js/dashboard/dash_1.js"></script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

</body>
</html>
