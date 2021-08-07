<?php
include("confing.php");
if(!isset($_SESSION['iduser'])){
    echo '<script>location.replace("../")</script>';
}else{
    $iduser=$_SESSION['iduser'];
    if(isset($_REQUEST['idpost']) and isset($_REQUEST['idcomment'])){
        $idpost=sqi($_REQUEST['idpost']);
        $idcommenttorplay=sqi($_REQUEST['idcomment']);
        $getcommenttprepl=runsql("SELECT  tbluser.iduser,tbluser.username,tblcomment.idcomment,tblcomment.text FROM tbluser,tblcomment where tblcomment.idpost=$idpost  and tbluser.iduser=tblcomment.iduser and tblcomment.idcomment=$idcommenttorplay  " );
        $getPost=getrecord("tblPost","postId=$idpost");
        $postiduser=$getPost[0]['iduser'];
        if(count($getPost)>0){
            if(isset($_REQUEST['action'])){
                if($_REQUEST['action']=='unlike'){
                    delet_recorc("tblLikePost","iduser=$iduser and idpost=$idpost");
                    echo '<script>location.replace("../Post-see?idpost='.$idpost.'")</script>';
                }
                if($_REQUEST['action']=='like'){
                    addrecored("tblLikePost",array("iduser"=>$iduser,"idpost"=>$idpost));
                    echo '<script>location.replace("../Post-see?idpost='.$idpost.'")</script>';
                }
                if($_REQUEST['action']=='like-comment'){
                    if(isset($_REQUEST['idcomment'])){
                        $idcomment=sqi($_REQUEST['idcomment']);
                        $getcountcommentlik=runsql("SELECT  Count(*) as Tedad  FROM tblcommenLike where idcomment=$idcomment and iduser=$iduser");
                        if($getcountcommentlik[0]['Tedad']>0){
                            delet_recorc("tblcommenLike","iduser=$iduser and idcomment=$idcomment");
                            echo '<script>location.replace("../Post-see?idpost='.$idpost.'")</script>';
                        }else{
                            addrecored("tblcommenLike",array("iduser"=>$iduser,"idcomment"=>$idcomment));
                            $idcommentrplay=$getcommenttprepl[0]['iduser'];
                            if($iduser!=$idcommentrplay){

                                $getuser=getrecord("tbluser","iduser=$iduser");
                                $notfcations=$getuser[0]['name'].' '.$getuser[0]['lastname'].'کامنت که ریپلای کرده بودید  را پسندید';
                                addrecored("tblNotification",array("iduser"=>$idcommentrplay,"kind"=>5,"idkind"=>$iduser,"vlaue"=>$notfcations,"status"=>0));
                            }
                            echo '<script>location.replace("../Post-see?idpost='.$idpost.'")</script>';
                        }
                    }else{
                        echo '<script>alert("پارمتر های ارسالی درست نمی باشد.");location.replace("../Post-see?idpost='.$idpost.'")</script>';
                    }
                }
            }
            else{
                if(isset($_REQUEST['comment']) and $_REQUEST['comment']!=''){
                    $comment=sqi($_REQUEST['comment']);
                    addrecored("tblcomment",array("text"=>$comment,"iduser"=>$iduser,"idpost"=>$idpost,"sub"=>$idcommenttorplay));
                    echo '<script>location.replace("../Post-see?idpost='.$idpost.'")</script>';
                    $idcommentrplay=$getcommenttprepl[0]['iduser'];
                    if($iduser!=$idcommentrplay){

                        $getuser=getrecord("tbluser","iduser=$iduser");
                        $notfcations=$getuser[0]['name'].' '.$getuser[0]['lastname'].'کامنت شما راریپلای کرد';
                        addrecored("tblNotification",array("iduser"=>$idcommentrplay,"kind"=>5,"idkind"=>$iduser,"vlaue"=>$notfcations,"status"=>0));
                    }
                }else{
                }
            }
        }else{
            echo '<script>alert("پارمتر های ارسالی درست نمی باشد.");location.replace("../POST_MYNETWORK")</script>';
        }

    }else{
        echo '<script>alert("تارنمای ارسالی درست نمی باشد");location.replace("../POST_MYNETWORK")</script>';
    }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>DataBase Project| Post of <?php echo $getPost[0]['text']; ?> </title>
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
                    <h3>Post of <?php $array=array_map('strval', explode(' ',$getPost[0]['text'])); echo $array[0].' '.$array[1].' '.$array[3] ; ?> ...</h3>
                </div>
            </div>

            <div class="row layout-top-spacing">





                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <?php
                    foreach ($getPost as $key){
                        $countoflikel=runsql("SELECT  Count(*) as Tedad  FROM tblLikePost where idpost=$idpost ");
                        $getLiketisuser=runsql("SELECT  Count(*) as Tedad  FROM tblLikePost where idpost=$idpost and iduser=$iduser " );
                        $getcountcomment=runsql("SELECT  Count(*) as Tedad  FROM tblcomment where idpost=$idpost  " );
                        if($getLiketisuser[0]['Tedad']>0){
                            $like=' <a href="Post-see?idpost='.$key['postId'].'&action=unlike" class="btn btn-danger">like</a> تعداد لایک:'.$countoflikel[0]['Tedad'].' تعداد کامنت:'.$getcountcomment[0]['Tedad'];
                        }
                        if($getLiketisuser[0]['Tedad']==0){
                            $like=' <a href="Post-see?idpost='.$key['postId'].'&action=like" class="btn btn-primary">like</a> تعداد لایک :'.$countoflikel[0]['Tedad'].'  تعداد کامنت:'.$getcountcomment[0]['Tedad'];
                        }




                        echo '<div class="col-xl-12 col-lg-9 col-md-9 col-sm-9 col-12">
                            <div class="card component-card_2">';
                        if($key['url']!=NULL){
                            echo '<img src="'.$key['url'].'" class="card-img-top " style="width: 50%;" alt="widget-card-2">';
                        }
                        $array=array_map('strval', explode(' ',$key['text']));
                        echo ' <div class="card-body" >
                                    <h6 class="card-title">'.$key['name'].' '.$key['lastname'].'</h6>
                                    <p class="card-text">'.$array[0].' '.$array[1].' '.$array[3].'</p>
                  
                                    '.$like.'  
                                </div>
                                 <div class=" col-xl-12 col-lg-9 col-md-9 col-sm-9 col-12 mb-5"><ul class="list-group ">';

                        echo '
                            <form >
                            شما در حال ریپلای کرد کامنت زیر می باشید
                            <a class="btn btn-danger" href="Post-see?idpost='.$idpost.'"> بازگشت</a> 
                            <br>
                            '.$getcommenttprepl[0]['username'].' : '.$getcommenttprepl[0]['text'].'

                             
                                <div class="form-group mb-4">
                                    <p>نظر شما در مورد کامنت بالا</p>
                                    <textarea name="comment" id="exampleFormControlInput2"  cols="150" ></textarea>
                                    <input name="idpost" value="'.$idpost.'" type="hidden" >
                                    <input name="idcomment" value="'.$idcommenttorplay.'" type="hidden" >
                                    
                                </div>
                               

                                <button type="submit" value="'.$idpost.'" class="mt-4 mb-4 btn btn-primary">ثبت  </button>
                            </form>
                        ';
                        if($getcountcomment[0]['Tedad']>0){
                            $getcomment=runsql("SELECT  tbluser.iduser,tbluser.username,tblcomment.idcomment,tblcomment.text FROM tbluser,tblcomment where tblcomment.idpost=$idpost    and tbluser.iduser=tblcomment.iduser and tblcomment.sub=0 order by idcomment desc " );
                            foreach ($getcomment as $ckey){
                                $idcomment=$ckey['idcomment'];
                                $getcountcommentlikall=runsql("SELECT  Count(*) as Tedad  FROM tblcommenLike where idcomment=$idcomment");
                                if($getcountcommentlik[0]['Tedad']>0){
                                    $likec='<a href="Post-see?idpost='.$key['postId'].'&action=like-comment&idcomment='.$ckey['idcomment'].'" class="btn btn-danger ml-3" >لایک</a>تعداد لایک:'.$getcountcommentlikall[0]['Tedad'];
                                }else{
                                    $likec='<a href="Post-see?idpost='.$key['postId'].'&action=like-comment&idcomment='.$ckey['idcomment'].'" class="btn btn-primary ml-3" >لایک</a> تعداد لایک:'.$getcountcommentlikall[0]['Tedad'];
                                }

                                echo'  
                                    
                                        <li class="list-group-item"> 
                                       '.$ckey['username'].' : '.$ckey['text'].' 
                                       '.$likec.'
                                        <a href="comment-replay?idpost='.$key['postId'].'&idcomment='.$ckey['idcomment'].'"  class="btn btn-primary ml-3" >ریپلای</a>
                                        
                                        </li>';
                                $sub=$ckey['idcomment'];
                                $getcomment1=runsql("SELECT  tbluser.iduser,tbluser.username,tblcomment.idcomment,tblcomment.text FROM tbluser,tblcomment where tblcomment.idpost=$idpost  and tbluser.iduser=tblcomment.iduser and tblcomment.sub=$sub order by idcomment desc " );

                                foreach ($getcomment1 as $cskey){
                                    $idcomment=$cskey['idcomment'];
                                    $getcountcommentlik=runsql("SELECT  Count(*) as Tedad  FROM tblcommenLike where idcomment=$idcomment and iduser=$iduser");
                                    $getcountcommentlikall=runsql("SELECT  Count(*) as Tedad  FROM tblcommenLike where idcomment=$idcomment");

                                    if($getcountcommentlik[0]['Tedad']>0){
                                        $likec='<a href="Post-see?idpost='.$key['postId'].'&action=like-comment&idcomment='.$cskey['idcomment'].'" class="btn btn-danger ml-3" >لایک</a> تعداد لایک:'.$getcountcommentlikall[0]['Tedad'];
                                    }else{
                                        $likec='<a href="Post-see?idpost='.$key['postId'].'&action=like-comment&idcomment='.$cskey['idcomment'].'" class="btn btn-primary ml-3" >لایک</a>تعداد لایک:'.$getcountcommentlikall[0]['Tedad'];
                                    }
                                    echo'
                                        <li class="list-group-item" style="margin-right: 50px">
                                        '.$cskey['username'].' : '.$cskey['text'].'
                                             '.$likec.'
                                         </li>
                                    ';
                                }





                            }

                        }


                        echo '</ul></div></div>
                            
                        </div>';
                        echo '
                            
                        ';
                    }
                    ?>

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
