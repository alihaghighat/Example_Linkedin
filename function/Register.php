<?php
include("../confing.php");
if (isset($_REQUEST['username']) and isset($_REQUEST['password']) and isset($_REQUEST['name']) and isset($_REQUEST['lastname'])
    and isset($_REQUEST['email'])and isset($_REQUEST['tvalod'])) {
    $username = sqi($_REQUEST['username']);
    $name = sqi($_REQUEST['name']);
    $lastname = sqi($_REQUEST['lastname']);
    $email = sqi($_REQUEST['email']);
    $tvalod = sqi($_REQUEST['tvalod']);
    $password = md5(sqi($_REQUEST['password']));
    $getuser=runsql(" SELECT  COUNT(*) as Tedad FROM tbluser where username='$username'");

    if($getuser[0]['Tedad']>0){
        echo 'نام کاربری موجود می باشد';
    }else{
        $d=addrecored("tbluser",array("name"=>$name,"lastname"=>$lastname,"username"=>$username,"email"=>$email,"password"=>$password));
        if($d){
            $getuser=getrecord('tbluser', "username='$username' and password='$password'");
            $iduser=$getuser[0]['iduser'];
            addrecored("tblUserDetail",array("Intro"=>'',
                "About"=>'',
                "Featured"=>'',
                "Background"=>'',
                "Accomplishments"=>'',
                "information"=>'',
                "Location"=>'',
                "Profile_language"=>'',
                "Current_company"=>'',
                "tvalod"=>$tvalod,
                "iduser"=>$iduser
            ));
            echo 'با موفقیت ثبت نام شدید ';
        }else{
            echo 'مشکل در اضافه کردن اتفاق افتاده';
        }
    }


} else {
    echo 0;
}
