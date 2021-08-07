<?php
include('../confing.php');
if (isset($_POST['post-description']) && isset($_SESSION['iduser'])) {
    $productCode = $_POST['product-code'];
    $iduser = $_SESSION['iduser'];

    if (isset($_FILES['file1']) && $_FILES['file1']['name'] != '' && $_FILES['file1']['size'] != 0) {
        $file_name = $_FILES['file1']['name'];
        $file_size = $_FILES['file1']['size'];
        $file_tmp = $_FILES['file1']['tmp_name'];
        $file_type = $_FILES['file1']['type'];
        $files = $_FILES['file1']['name'];
        $files = explode('.', $files);
        $file_ext = strtolower(end($files));
        $extensions = array("jpeg", "jpg", "png", "JPEG", "JPG", "PNG");

        if (in_array($file_ext, $extensions) === false) {
            $errors = "فایل انتخاب شده نا معتبر است";
        }

        if (empty($errors)) {
            $folder = "../postPhotos/";
            move_uploaded_file($file_tmp, $folder . $file_name);
            $photoUrl = "postPhotos/" . $file_name;
            addrecored('tblPost', array('text' => $_POST['post-description'], 'iduser' => $iduser, 'url' => $photoUrl));

            echo '<script>alert("با موفقیت اضافه شد");location.replace("../add-post");</script>';

        } else {

            echo '<script>alert('.$errors.');location.replace("../add-post");</script>';

        }
    } else {
        if ($_POST['post-description'] == '') {

            echo '<script>alert("باید یکی از فیلد ها را کامل کنید");location.replace("../add-post");</script>';

        }
        $a = addrecored('tblPost', array('text' => $_POST['post-description'], 'iduser' => $iduser));
        echo '<script>alert("با موفقیت اضافه شد");location.replace("../add-post");</script>';
        
    }


    return;
}
echo "false";
return;
