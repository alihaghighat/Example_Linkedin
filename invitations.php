<?php
include("confing.php");
if(!isset($_SESSION['iduser'])){
    echo '<script>location.replace("../")</script>';
}else{
    $iduser=$_SESSION['iduser'];
    $getinvation=runsql("SELECT * FROM tbluser,tblinvitation where tbluser.iduser=$iduser  and tbluser.iduser=tblinvitation.iduser_get  order by idinvitation desc");

    if(isset($_REQUEST['id']) and isset($_REQUEST['actions'])){
        $idinvitation=sqi($_REQUEST['id']);
        $getinvation=getrecord("tblinvitation","idinvitation=$idinvitation");
        $iduser2=$getinvation[0]['iduser_send'];
        if($_REQUEST['actions']=='accept'){
            updaterecord("tblinvitation",array("status"=>1),"idinvitation=$idinvitation");
            addrecored("tblconnection",array("iduser1"=>$iduser,"iduser2"=>$iduser2));
            echo '<script>location.replace("invitations")</script>';
        }else{
            updaterecord("tblinvitation",array("status"=>-1),"idinvitation=$idinvitation");
            echo '<script>location.replace("invitations")</script>';
        }

    }else{

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
                <h3>مشخصات</h3>
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
                                <th> نام و نام خانوادگی </th>
                                <th>نام کاربری</th>

                                <th>متن درخواست</th>
                                <th>عملیات</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            foreach ($getinvation as $key) {
                                $id_sender=$key['iduser_send'];
                                $get_name_sender=getrecord("tbluser","iduser=$id_sender")[0];

                                echo '
                                  <tr>
                                    <td>'.$i.'</td>
                                    <td>'.$get_name_sender['name'].' '.$get_name_sender[0]['lastname'].'</td>
                                     <td>'.$get_name_sender['username'].'</td>
                                     
                                     <td>'.$key['value'].'</td>
                                    <td>';

                                    if($key['status']==0){
                                        echo '<a href="invitations?actions=accept&id='.$key['idinvitation'].'" class="btn btn-success">قبول</a>
                                    <a href="invitations?actions=reject&id='.$key['idinvitation'].'" class="btn btn-danger">رد</a>';
                                    }
                                    if($key['status']==1){
                                        echo 'accept';
                                    }
                                    if($key['status']==-1){
                                        echo 'reject';
                                    }
                                    
                                   echo' <td>
                                    </td>
                                </tr>' ;
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
