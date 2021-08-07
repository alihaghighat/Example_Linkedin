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
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="page-header">
                <div class="page-title">
                    <h3>افزودن پست</h3>
                </div>
            </div>



                <div class="widget-content widget-content-area">
                    <form id='form' method="post" action="function/addPost.php" enctype="multipart/form-data">


                            <div class='col-lg-8 col-12 mt-3 form-group'>
                                <lable class='label'> توضیحات </lable>
                                <textarea class="form-control description-textarea" name='post-description' id='product-description'></textarea>
                            </div>


                            <div class='form-group mb-4'>
                                <label for="file1" class="btn btn-secondary"> انتخاب عکس <svg class='bi' width='20' height='20' fill='currentColor'>
                                        <use xlink:href='../bootstrap/ic/bootstrap-icons.svg#image' />
                                    </svg></label>
                                <input id='file1' type="file" style="display:none;" name="file1" />
                                <div id='photo-url'></div>
                            </div>
                            <div class='form-group mb-4'></div>
                            <div class='form-group mb-4'>
                                <button type="submit" class="btn btn-light secondary-color-text btn-block add-pbtn mb-4">
                                    افزودن پست
                                    <svg class='bi' width='30' height='30' fill='currentColor'>
                                        <use xlink:href='../bootstrap/ic/bootstrap-icons.svg#plus' />
                                    </svg>
                                </button>
                            </div>
                            <div class='col-12 text-danger' id='error-erea'></div>

                    </form>
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
