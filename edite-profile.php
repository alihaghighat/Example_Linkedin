<?php
include("confing.php");
if(!isset($_SESSION['iduser'])){
    echo '<script>location.replace("../")</script>';
}else{

    $iduser=$_SESSION['iduser'];
    $getuserdatile=getrecord("tblUserDetail","iduser=$iduser");
    $getuser=getrecord("tbluser","iduser=$iduser");
    $getskilcount=runsql(" SELECT  COUNT(*) as Tedad FROM tblSkill where iduser=$iduser");
    $getlanguagescount=runsql(" SELECT  COUNT(*) as Tedad FROM tbllanguages where iduser=$iduser");



    if(isset($_REQUEST['skil']) and isset($_REQUEST['languages']) and isset($_REQUEST['information']) and isset($_REQUEST['Accomplishments'])
    and isset($_REQUEST['Background']) and isset($_REQUEST['Featured']) and isset($_REQUEST['About']) and isset($_REQUEST['Intro'])){
        $Intro=sqi($_REQUEST['Intro']);
        $About=sqi($_REQUEST['About']);
        $Featured=sqi($_REQUEST['Featured']);
        $Background=sqi($_REQUEST['Background']);
        $Accomplishments=sqi($_REQUEST['Accomplishments']);
        $information=sqi($_REQUEST['information']);
        $languages=sqi($_REQUEST['languages']);
        $skil=sqi($_REQUEST['skil']);
        $Location=sqi($_REQUEST['Location']);
        $Profile_language=sqi($_REQUEST['Profile_language']);
        $Current_company=sqi($_REQUEST['Current_company']);





        if($getuserdatile[0]['Current_company']==$Current_company){

        }else{
            $getallconections=runsql(" SELECT  iduser  FROM tbluser where iduser!=$iduser and iduser IN (SELECT  iduser1  FROM tblconnection where iduser1=$iduser or iduser2=$iduser  UNION SELECT  iduser2  FROM tblconnection where iduser1=$iduser or iduser2=$iduser ) ");
            foreach ($getallconections as $key){


                    $notfcations=$getuser[0]['name'].' '.$getuser[0]['lastname'].'موقعیت شغلیش را عوض کرد';
                    addrecored("tblNotification",array("iduser"=>$key['iduser'],"kind"=>7,"idkind"=>$iduser,"vlaue"=>$notfcations,"status"=>0));

            }
        }
        updaterecord("tblUserDetail",array("Intro"=>$Intro,
            "About"=>$About,
            "Featured"=>$Featured,
            "Background"=>$Background,
            "Accomplishments"=>$Accomplishments,
            "information"=>$information,
            "Location"=>$Location,
            "Profile_language"=>$Profile_language,
            "Current_company"=>$Current_company,
            ),"iduser=$iduser");



        if($getskilcount[0]['Tedad']>0){
            updaterecord("tblSkill",array("kind"=>0),"iduser=$iduser");
            $array=array_map('strval', explode('!',$skil));
            foreach ($array as $key){
                $getskil2=getrecord("tblSkill","iduser=$iduser and value like '%$key%' ");
                if(count($getskil2)>0){
                    $id=$getskil2[0]['idSkile'];
                    updaterecord("tblSkill",array("kind"=>1),"idSkile=$id");
                }else{
                    addrecored("tblSkill",array("iduser"=>$iduser,"value"=>$key));
                }


            }


        }
        if($getskilcount[0]['Tedad']==0){
            $array=array_map('strval', explode('!',$skil));
            foreach ($array as $key){
                addrecored("tblSkill",array("iduser"=>$iduser,"value"=>$key));
            }
        }
        if($getlanguagescount[0]['Tedad']>0){
            updaterecord("tbllanguages",array("kind"=>0),"iduser=$iduser");
            $array=array_map('strval', explode('!',$languages));
            foreach ($array as $key){
                $getlanguages2=getrecord("tbllanguages","iduser=$iduser and value like '%$key%' ");
                if(count($getlanguages2)>0){
                    $id=$getlanguages2[0]['idlanguages'];
                    updaterecord("tbllanguages",array("kind"=>1),"idlanguages=$id");
                }else{
                    addrecored("tbllanguages",array("iduser"=>$iduser,"value"=>$key));
                }

            }


        }
        if($getlanguagescount[0]['Tedad']==0){
            $array=array_map('strval', explode('!',$languages));
            foreach ($array as $key){
                addrecored("tbllanguages",array("iduser"=>$iduser,"value"=>$key));
            }
        }
        echo '<script>alert("با موفقیت ثبت شد ");location.replace("edite-profile")</script>';

    }else{
        $skil='';
        $languages='';
        $getskilcount=runsql(" SELECT  COUNT(*) as Tedad FROM tblSkill where iduser=$iduser and kind=1");
        $getlanguagescount=runsql(" SELECT  COUNT(*) as Tedad FROM tbllanguages where iduser=$iduser and kind=1");
        $getskil=getrecord("tblSkill","iduser=$iduser and kind=1");
        $getlanguages=getrecord("tbllanguages","iduser=$iduser and kind=1");
        if($getskilcount[0]['Tedad']>0){
            $i=0;
            foreach ($getskil as $key){
                if($i==0){
                    $skil=$skil.''.$key['value'];
                }else{
                    $skil=$skil.'!'.$key['value'];
                }
                $i++;
            }

        }
        if($getlanguagescount[0]['Tedad']>0){
            $i=0;
            foreach ($getlanguages as $key){
                if($i==0){
                    $languages=$languages.''.$key['value'];
                }else{
                    $languages=$languages.'!'.$key['value'];
                }
                $i++;
            }

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
    <title>DataBase Project| Edite profile </title>
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
<body class="dashboard-analytics sidebar-noneoverflow">


    <!--  END SIDEBAR  -->
    <?php include("_incloud.php");?>
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="page-header">
                <div class="page-title">
                    <h3>ویرایش پروفایل</h3>
                </div>
            </div>
            <div class="row layout-top-spacing">
                <div class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>ویرایش پروفایل</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form >

                                <div class="form-group mb-4">
                                    <label for="exampleFormControlInput2">Intro</label>
                                    <input type="text" class="form-control" value="<?php echo $getuserdatile[0]['Intro'];?>" name="Intro" placeholder="">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="exampleFormControlInput2">About</label>
                                    <input type="text" class="form-control"  value="<?php echo $getuserdatile[0]['About'];?>" name="About" placeholder="">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="exampleFormControlInput2">Featured</label>
                                    <input type="text" class="form-control" value="<?php echo $getuserdatile[0]['Featured'];?>" name="Featured" placeholder="" >
                                </div>
                                <div class="form-group mb-4">
                                    <label for="exampleFormControlInput2">Background</label>
                                    <input type="text" class="form-control" value="<?php echo $getuserdatile[0]['Background'];?>" name="Background" placeholder="" >
                                </div>
                                <div class="form-group mb-4">
                                    <label for="exampleFormControlInput2">Accomplishments</label>
                                    <input type="text" class="form-control" value="<?php echo $getuserdatile[0]['Accomplishments'];?>" name="Accomplishments" placeholder="" >
                                </div>
                                <div class="form-group mb-4">
                                    <label for="exampleFormControlInput2">information</label>
                                    <input type="text" class="form-control"  value="<?php echo $getuserdatile[0]['information'];?>" name="information" placeholder="" >
                                </div>
                                <div class="form-group mb-4">
                                    <label for="exampleFormControlInput2">languages</label>
                                    <input type="text" class="form-control" name="languages"  value="<?php echo $languages;?>" placeholder="" >
                                </div>
                                <div class="form-group mb-4">
                                    <label for="exampleFormControlInput2">skil</label>
                                    <input type="text" class="form-control" value="<?php echo $skil;?>" name="skil" placeholder="" >
                                </div>
                                <div class="form-group mb-4">
                                    <label for="exampleFormControlInput2">Location</label>
                                    <input type="text" class="form-control" value="<?php echo $getuserdatile[0]['Location'];?>" name="Location" placeholder="" >
                                </div>
                                <div class="form-group mb-4">
                                    <label for="exampleFormControlInput2">Profile_language</label>
                                    <input type="text" class="form-control" value="<?php echo $getuserdatile[0]['Profile_language'];?>" name="Profile_language" placeholder="" >
                                </div>
                                <div class="form-group mb-4">
                                    <label for="exampleFormControlInput2">Current_company</label>
                                    <input type="text" class="form-control" value="<?php echo $getuserdatile[0]['Current_company'];?>" name="Current_company" placeholder="" >
                                </div>

                                <button onclick="" id="btnSubmit" class="mt-4 mb-4 btn btn-primary">ویرایش </button>
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
