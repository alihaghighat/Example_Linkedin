<?php include('../confing.php');
if (isset($_REQUEST['text'])  && isset($_REQUEST['idchat']) && isset($_SESSION['iduser'])) {
    $idchat = sqi($_REQUEST['idchat']);
    $text = sqi($_REQUEST['text']);

    addrecored('tblmessage', array('idchat' => $idchat, 'iduser' => $iduser, 'text' => $text));
    echo "true";
    return;
}
echo "$_REQUEST[idchat]";
