<?php include('../confing.php');
if (isset($_REQUEST['idpost'])  && isset($_REQUEST['idchat']) && isset($_SESSION['iduser'])) {
    $idchat = sqi($_REQUEST['idchat']);
    $idpost = sqi($_REQUEST['idpost']);

    addrecored('tblmessage', array('idchat' => $idchat, 'iduser' => $iduser, 'ispost' => true, 'idpost' => $idpost));
    echo "true";
    return;
}
echo "$_REQUEST[idchat]";
