<?php
$login = true;
include("../confing.php");
if (isset($_REQUEST['username']) and isset($_REQUEST['password'])) {
    $username = sqi($_REQUEST['username']);
    $password = md5(sqi($_REQUEST['password']));
    $r = getrecord('tbluser', "username='$username' and password='$password'");
    if (count($r) > 0) {
        $_SESSION['iduser'] = $r[0]['iduser'];
        //check tvalod
        $iduser=$r[0]['iduser'];
        $date=date("m-d");
        $getallconections=runsql(" SELECT tbluser.iduser,tbluser.name,tbluser.lastname FROM tbluser,tblUserDetail where tbluser.iduser!=$iduser and tbluser.iduser=tblUserDetail.iduser and tblUserDetail.tvalod like '%$date%' and tbluser.iduser IN (SELECT  iduser1  FROM tblconnection where iduser1=$iduser or iduser2=$iduser  UNION SELECT  iduser2  FROM tblconnection where iduser1=$iduser or iduser2=$iduser ) ");
        foreach ($getallconections as $key){
            $idkind=$key['iduser'];
            $getnotficatin=runsql("SELECT COUNT(*) as Tedad FROM tblNotification where iduser=$iduser and kind=1 and idkind=$idkind  and status=0 ");
            if($getnotficatin[0]['Tedad']==0){
                $notfcations=$key['name'].' '.$key['lastname'].'در این روز متولد شده است.';
                addrecored("tblNotification",array("iduser"=>$iduser,"kind"=>1,"idkind"=>$key['iduser'],"vlaue"=>$notfcations,"status"=>0));

            }

        }
        echo 1;
    } else {
        echo 'Username or password is incorrect';
    }
} else {
    echo 0;
}
