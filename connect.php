<?php
include("confing.php");
if(!isset($_SESSION['iduser'])){
    echo '<script>location.replace("../")</script>';
}else{
    if(isset($_REQUEST['iduser'])){
        $idusersee=sqi($_REQUEST['iduser']);
        $iduser=$_SESSION['iduser'];
        $getinvation=getrecord("tblinvitation","iduser_send=$iduser and iduser_get=$idusersee");
        if(isset($_REQUEST['value'])){
            $value=sqi($_REQUEST['value']);
            if(count($getinvation)>0){

            }else{
                addrecored("tblinvitation",array("iduser_send"=>$iduser,"iduser_get"=>$idusersee,"status"=>0,"value"=>$value));
            }

        }
    }else{
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

<?php include("_incloud.php");?>
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="page-header">
                <div class="page-title">
                    <h3>????????????</h3>
                </div>
            </div>
            <div class="row layout-top-spacing"  >
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="table-responsive mb-4 mt-4">
                            <table id="zero-config" class="table table-hover" >
                                <thead>
                                <tr>
                                    <th>???? ??????????????</th>
                                    <th> ?????? ?? ?????? ???????????????? </th>

                                    <th>?????? ????????????</th>

                                    <th>????????</th>

                                    <th>???????? ????????</th>
                                    <th>???????? ??????????</th>





                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i=1;

                                $get=runsql("SELECT * FROM tbluser,tblUserDetail where tbluser.iduser=$idusersee and tblUserDetail.iduser=tbluser.iduser");








                                    echo '
                                  <tr>
                                    <td>'.$i.'</td>
                                    <td>'.$get[0]['name'].' '.$get[0]['lastname'].'</td>
                                     <td>'.$get[0]['username'].'</td>
                                     <td>'.$get[0]['Location'].'</td>
                                     <td>'.$get[0]['Current_company'].'</td>
                                     <td>'.$get[0]['Profile_language'].'</td>
                                    
                                    
           
                                    </td>
                                </tr>' ;





                                ?>

                                </tbody>
                                <thead>
                                <tr>
                                    <th>information</th>
                                    <th>Accomplishments</th>
                                    <th> Background </th>

                                    <th>Featured</th>

                                    <th>About</th>

                                    <th>Intro</th>




                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i=1;

                                $get=runsql("SELECT * FROM tbluser,tblUserDetail where tbluser.iduser=$idusersee and tblUserDetail.iduser=tbluser.iduser");








                                echo '
                                  <tr>
                                  <td>'.$get[0]['information'].'</a>
                                    <td>'.$get[0]['Accomplishments'].'</td>
                                    <td>'.$get[0]['Background'].'</td>
                                     <td>'.$get[0]['Featured'].'</td>
                                     <td>'.$get[0]['About'].'</td>
                                     <td>'.$get[0]['Intro'].'</td>
                                    
           
                                    </td>
                                </tr>' ;





                                ?>

                                </tbody>


                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="page-header">
                <div class="page-title">
                    <h3>?????????? ??????????????</h3>
                </div>
            </div>
            <div class="row layout-top-spacing">
                <div class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>??????????????</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form method="post" action="connect?iduser=<?php echo $idusersee?>" >
                                <?php
                                $getinvation=getrecord("tblinvitation","iduser_send=$iduser and iduser_get=$idusersee");
                                    if(count($getinvation)>0){
                                        echo '?????? ???????? ?????????????? ?????????? ???????? ??????????';
                                    }else{
                                        echo '<div class="form-group mb-4">
                                    <label for="exampleFormControlInput2">?????? ?????????????? </label>
                                    <input type="text" class="form-control"  value="" name="value" placeholder="">
                                </div>
                                

                                <button onclick="" id="btnSubmit" class="mt-4 mb-4 btn btn-primary">?????????? </button>';
                                    }

                                ?>


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
