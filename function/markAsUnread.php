<?php include('../confing.php');
$iduser = sqi($_SESSION['iduser']);

if (!isset($_SESSION['iduser'])) {
    echo "false";
    return;
}
if (isset($_REQUEST['idchat'])) {
    $idchat = sqi($_REQUEST['idchat']);
    updaterecord("tblmessage", array('messageRead' => 0), "idchat = $idchat ANd iduser != $iduser");
    echo "true";
    return;
}
