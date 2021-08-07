<?php
include("confing.php");
if(!isset($_SESSION['iduser'])){
    echo '<script>location.replace("../")</script>';
}else{
    $iduser=$_SESSION['iduser'];
    $result=0
    ;
    if(isset($_REQUEST['value'])){
        $result=1;
        $value=sqi($_REQUEST['value']);
        $get = runsql("SELECT DISTINCT * FROM tblchat,tblmessage WHERE tblmessage.idchat=tblchat.idchat and tblmessage.text like '%$value%' and tblchat.idchat IN(SELECT tblchat.idchat FROM tblchat,tbluser WHERE (tblchat.iduser1 = tbluser.iduser OR tblchat.iduser2 = tbluser.iduser) AND tbluser.iduser != $iduser AND (tblchat.iduser1 = $iduser OR tblchat.iduser2 = $iduser))  ");
       
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>DataBase Project| search user </title>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/structure.css" rel="stylesheet" type="text/css" class="structure" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>


<?php include("_incloud.php");?>

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="page-header">
                <div class="page-title">
                    <h3>جستجو در مکالمات </h3>
                </div>
            </div>
            <div class="row layout-top-spacing">
                <div class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>جستجو در مکالمات</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form method="post" >
                                <div class="form-group mb-4">
                                    <h6 for="exampleFormControlInput2">:جستجو بر اساس</h6>

                                </div>



                                <div class="form-group mb-4">
                                    <label for="exampleFormControlInput2">جستجو  </label>
                                    <input type="text" class="form-control"  value="" name="value" placeholder="کلمه مورد نظر خود را وارد کنید">
                                </div>



                                <button onclick="" id="btnSubmit" class="mt-4 mb-4 btn btn-primary">جستجو </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
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
                                    <th>نام گیرنده</th>

                                    <th>متن</th>



                                    <th>عملیات</th>



                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                if ($result == 1) {

                                    //chat ha ke ma dar an hastim bedoon tekrar

                                    foreach ($get as $key) {


                                        echo '
                                  <tr>
                                    <td>' . $i . '</td>
                                   
                                     <td>' . $key['text'] . '</td>
                                    
                                    <td><a class="btn btn-primary" href="chat?iduser=' . $key['iduser'] . ' " >دیدن مکالمه</a>
           
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


                                    <th>متن</th>



                                    <th>عملیات</th>



                                    <th>عملیات</th>

                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
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

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="plugins/table/datatable/datatables.js"></script>
<script>
    $('#zero-config').DataTable({
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>' },
            "sInfo": "صفحه _PAGE_ از _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "جستجو کنید...",
            "sLengthMenu": "نتایج :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 7
    });
</script>

</body>
</html>
