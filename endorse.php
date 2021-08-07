<?php
include("confing.php");
if(!isset($_SESSION['iduser'])){
    echo '<script>location.replace("../")</script>';
}else{
    $iduser=$_SESSION['iduser'];
    if(isset($_REQUEST['idskill'])){
        $idskill=sqi($_REQUEST['idskill']);
        $getundros=runsql("SELECT  COUNT(*) as Tedad FROM tblendorse where idSkill=$idskill and iduser=$iduser");
        if($getundros[0]['Tedad']>0){
            $idkine=1;
            $getskill=runsql("SELECT tbluser.name,tbluser.lastname,tblSkill.value,tbluser.iduser FROM tblSkill,tbluser where idSkile=$idskill and tbluser.iduser=tblSkill.iduser");
            if(isset($_REQUEST['action']) and $_REQUEST['action']=='getBack') {
                $getskill=runsql("SELECT tbluser.name,tbluser.lastname,tblSkill.value,tbluser.iduser FROM tblSkill,tbluser where idSkile=$idskill and tbluser.iduser=tblSkill.iduser");
                $idusersee=$getskill[0]['iduser'];
                delet_recorc("tblendorse","idSkill=$idskill and iduser=$iduser");
                echo '<script>alert("باموفقیت برگشت داده شد");location.replace("../profile?iduser='.$idusersee.'")</script>';

            }

        }else{
            $idkine=0;
            $getskillCount=runsql("SELECT  COUNT(*) as Tedad FROM tblSkill where idSkile=$idskill");
            if($getskillCount[0]['Tedad']>0){
                $getskill=runsql("SELECT tbluser.name,tbluser.lastname,tblSkill.value,tbluser.iduser FROM tblSkill,tbluser where idSkile=$idskill and tbluser.iduser=tblSkill.iduser");
                if(isset($_REQUEST['endorse']) and isset($_REQUEST['star'])){
                    $endorse=sqi($_REQUEST['endorse']);
                    $star=sqi($_REQUEST['star']);
                    $idusersee=$getskill[0]['iduser'];
                    if($idusersee!=$iduser){
                        $getuser=getrecord("tbluser","iduser=$iduser");
                        addrecored("tblendorse",array("value"=>$endorse,"idskill"=>$idskill,"iduser"=>$iduser,"star"=>$star));
                        $notfcations=$getuser[0]['name'].' '.$getuser[0]['lastname'].'مهارت شما را اندروس کرد.';
                        addrecored("tblNotification",array("iduser"=>$idusersee,"kind"=>2,"idkind"=>$iduser,"vlaue"=>$notfcations,"status"=>0));
                        echo '<script>alert("باموفقیت ثبت شد");location.replace("../profile?iduser='.$idusersee.'")</script>';
                    }else{
                        echo '<script>alert("شما نمی توانید مهارت خودتان را اندروس کنید");location.replace("../profile?iduser='.$idusersee.'")</script>';
                    }

                }else{

                }
            }else{
                echo '<script>alert("پارمتر های ارسالی درست نمی باشد").location.replace("../main")</script>';
            }
        }
    }else{
        echo '<script>alert("پارمتر های ارسالی درست نمی باشد").location.replace("../main")</script>';
    }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>DataBase Project| endorse </title>
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
                <h3>endorse </h3>
            </div>
        </div>



        <div class="widget-content widget-content-area">
            <?php
                if($idkine==0){
                    echo'
                     <h3>شما در حال اندروس کردن مهارت '. $getskill[0]['value'].'- '.$getskill[0]['name'].' '.$getskill[0]['lastname'].'</h3>
            <form id="form" method="get">


                <div class="col-lg-8 col-12 mt-3 form-group">
                    <lable class="label"> توضیحات </lable>
                    <textarea  class="form-control description-textarea" name="endorse" id="product-description"></textarea>

                    <input name="idskill" type="hidden" value="<?php echo $idskill?>">
                </div><div class="col-lg-8 col-12 mt-3 form-group">
                    <lable class="label"> چه حدی مورد تایید شما می باشد. </lable>
                    <input type="number" max="5" min="0" name="star">

                    <input name="idskill" type="hidden" value="'.$idskill.'">
                </div>
                <div class="col-lg-8 col-12 mt-3 form-group">
                    <button type="submit" class="btn btn-primary">ثبت</button>
                </div>






            </form>
                    ';
                }else{
                    echo' <h3>شما قبلا اندروس کردید مهارت '. $getskill[0]['value'].'- '.$getskill[0]['name'].' '.$getskill[0]['lastname'].'</h3>
                        <a class="btn btn-danger" href="endorse?idskill='.$idskill.'&action=getBack">پس گرفتن</a>';
                }
            ?>

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
