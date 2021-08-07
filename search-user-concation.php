<?php
include("confing.php");
if(!isset($_SESSION['iduser'])){
    echo '<script>location.replace("../")</script>';
}else{
    $iduser=$_SESSION['iduser'];
    $result=0;


    $value=$_REQUEST['value'];
    $i=0;
    $Location=0;$Current_company=0;$Profile_language=0;
    $where="";
    if(isset($_REQUEST['Location']) or isset($_REQUEST['Current_company']) or $_REQUEST['Profile_language'] ){
        $result=1;
        $where="";
        if(isset($_REQUEST['Location']) and isset($_REQUEST['LocationC'])){
            $Location=1;
            $value=sqi($_REQUEST['Location']);

            $where=$where."Location LIKE '%$value%'";
            $i++;
        }
        if(isset($_REQUEST['Current_company']) and isset($_REQUEST['Current_companyC'])){
            $Current_company=1;
            $value=sqi($_REQUEST['Current_company']);
            if($i!=0){
                $where=$where." OR Current_company LIKE '%$value%'";
            }else{
                $where=$where."Current_company LIKE '%$value%'";
                $i++;
            }

        }
        if(isset($_REQUEST['Profile_language']) and isset($_REQUEST['Profile_languageC'])){
            $Profile_language=1;
            $value=sqi($_REQUEST['Profile_language']);
            if($i!=0){
                $where=$where." OR Profile_language LIKE '%$value%'";
            }else{
                $where=$where."Profile_language '%$value%'";

            }

        }
        $where="tbluser.iduser!=$iduser  and tbluser.iduser=tblUserDetail.iduser and ($where)";




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
                    <h3>جستجو بر اساس مکان ، شرکت فعلی و .... </h3>
                </div>
            </div>
            <div class="row layout-top-spacing">
                <div class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>جستجو بر اساس مکان ، شرکت فعلی و ....</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form method="post" >
                                <div class="form-group mb-4">
                                    <h6 for="exampleFormControlInput2">:جستجو بر اساس</h6>

                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="checkbox" <?php if($Location==1) echo "checked"; ?> id="customRadioInline1" name="LocationC"  class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioInline1">Location</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="checkbox"  <?php if($Profile_language==1) echo "checked"; ?> id="customRadioInline2"  name="Profile_languageC" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioInline2">Profile language</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="checkbox"  <?php if($Current_company==1) echo "checked"; ?> id="customRadioInline3"  name="Current_companyC" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioInline3">Current company</label>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="exampleFormControlInput2">جستجو بر اساس مکان </label>
                                    <input type="text" class="form-control"  value="" name="Location" placeholder="کلمه مورد نظر خود را وارد کنید">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="exampleFormControlInput2">جستجو بر اساس شرکت فعلی </label>
                                    <input type="text" class="form-control"  value=""  name="Profile_language" placeholder="کلمه مورد نظر خود را وارد کنید">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="exampleFormControlInput2">جستجو بر زبان نمایه </label>
                                    <input type="text" class="form-control"  value="" name="Current_company"  placeholder="کلمه مورد نظر خود را وارد کنید">
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
            <div class="row layout-top-spacing"  <?php if($result==0) echo 'style="display: none"'?>>
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="table-responsive mb-4 mt-4">
                            <table id="zero-config" class="table table-hover" >
                                <thead>
                                <tr>
                                    <th>کد اختصاصی</th>
                                    <th> نام و نام خانوادگی </th>

                                    <th>نام کاربری</th>

                                    <th>مکان</th>

                                    <th>شرکت فعلی</th>
                                    <th>زبان نمایه</th>

                                    <th>عملیات</th>



                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i=1;
                                if($result==1){
                                    $get=runsql("SELECT * FROM tbluser,tblUserDetail where $where");





                                    foreach($get as $key){


                                        echo '
                                  <tr>
                                    <td>'.$i.'</td>
                                    <td>'.$key['name'].' '.$key['lastname'].'</td>
                                     <td>'.$key['username'].'</td>
                                     <td>'.$key['Location'].'</td>
                                     <td>'.$key['Current_company'].'</td>
                                     <td>'.$key['Profile_language'].'</td>
                                    
                                    <td><a class="btn btn-primary" target=_blank href="connect?iduser='.$key['iduser'].' " >درخواست</a>
           
                                    </td>
                                </tr>' ;


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

                                    <th>مکان</th>

                                    <th>شرکت فعلی</th>
                                    <th>زبان نمایه</th>

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
