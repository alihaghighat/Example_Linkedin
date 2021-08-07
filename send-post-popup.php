<?php include("confing.php");
if (!isset($_SESSION['iduser']) && isset($_REQUEST['idpost'])) {
    echo '<script>location.replace("../")</script>';
} else {
    $iduser = $_SESSION['iduser'];
    $result = 1;
}
?>
<script>
    function sendPost(idpost, idchat) {

        $.ajax({
            url: 'function/sendPost.php',
            type: 'post',
            data: {
                'idpost': idpost,
                'idchat': idchat,
            },
            success: function(data) {
                location.reload();
            }
        });
    }
</script>
<div class="layout-px-spacing">


    <div class="page-header">
        <div class="page-title">
            <h3> نتیجه جستجو</h3>
        </div>
    </div>
    <div class="row layout-top-spacing" <?php if ($result == 0) echo 'style="display: none"' ?>>
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">
                    <table id="zero-config" class="table table-hover">
                        <thead>
                            <tr>
                                <th>کد اختصاصی</th>
                                <th> نام و نام خانوادگی </th>

                                <th>نام کاربری</th>



                                <th>عملیات</th>



                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            if ($result == 1) {

                                //chat ha ke ma dar an hastim bedoon tekrar
                                $get = runsql("SELECT * FROM tblchat,tbluser WHERE (tblchat.iduser1 = tbluser.iduser OR tblchat.iduser2 = tbluser.iduser) AND tbluser.iduser != $iduser AND (tblchat.iduser1 = $iduser OR tblchat.iduser2 = $iduser)");





                                foreach ($get as $key) {


                                    echo '
                          <tr>
                            <td>' . $i . '</td>
                            <td>' . $key['name'] . ' ' . $key['lastname'] . '</td>
                             <td>' . $key['username'] . '</td>
                            
                            <td><a class="btn btn-primary" onclick="sendPost(' . $_REQUEST['idpost'] . ',' . $key['idchat'] . ')" >ارسال پست</a>
   
                            </td>
                        </tr>';


                                    $i++;
                                }
                            }
                            ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>کد اختصاصی</th>
                                <th> نام و نام خانوادگی </th>

                                <th>نام کاربری</th>



                                <th>عملیات</th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>