<?php

$login=true;
include("confing.php");

if(isset($_REQUEST['action'])){

    $action=$_REQUEST['action'];

    if($action=='signout'){

        session_destroy();

        echo '<script type="text/javascript">
           window.location = "https://psxstore.net/admin/login"
      			</script>';

        exit();

    }

}

if(isset($_SESSION['iduser'])){
    echo '<script type="text/javascript">
           window.location = "https://psxstore.net/admin/dashbord"
      			</script>';


}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>DataBase Project| Register </title>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/structure.css" rel="stylesheet" type="text/css" class="structure" />
    <link href="assets/css/authentication/form-2.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
</head>
<body class="form">


<div class="form-container outer">
    <div class="form-form">
        <div class="form-form-wrap">
            <div class="form-container">
                <div class="form-content">

                    <h1 class="">ثبت نام</h1>
                    <p class="">برای ثبت نام اطلاعات خواسته شده را وارد کنید</p>

                    <form class="text-left" onsubmit = "event.preventDefault(); mywork();">
                        <div class="form">
                            <div id="username-field" class="field-wrapper input">
                                <label for="username">نام</label>
                                <input id="name" name="username" type="text" class="form-control" placeholder="نام">
                            </div>
                            <div id="username-field" class="field-wrapper input">
                                <label for="username">نام خانوادگی</label>
                                <input id="lastname" name="username" type="text" class="form-control" placeholder="نام خانوادگی">
                            </div>
                            <div id="username-field" class="field-wrapper input">
                                <label for="username">تاریخ تولد</label>
                                <input id="tvalod" name="username" type="date" class="form-control" placeholder="">
                            </div>
                            <div id="username-field" class="field-wrapper input">
                                <label for="username">ایمیل</label>
                                <input id="email" name="username" type="email" class="form-control" placeholder="ایمیل">
                            </div>


                            <div id="username-field" class="field-wrapper input">
                                <label for="username">نام کاربری</label>
                                <input id="username" name="username" type="text" class="form-control" placeholder="نام کاربری">
                            </div>

                            <div id="password-field" class="field-wrapper input mb-2">
                                <div class="d-flex justify-content-between">
                                    <label for="password">رمزعبور</label>

                                </div>
                                <input id="password" name="password" type="password" class="form-control" placeholder="رمز عبور" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                            </div>
                            <div class="d-sm-flex justify-content-between">
                                <div class="field-wrapper">
                                    <button  class="btn btn-primary" >ثبت نام</button>
                                </div>
                            </div>

                        </div>
                    </form>
                    <div class="social mt-4">
                        <a href="../" class="btn social-fb">
                            <span class="brand-name"> ورود</span>
                        </a>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="bootstrap/js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/authentication/form-2.js"></script>
<script>
    function mywork(){
        var u=$('#username').val();

        var p=$('#password').val();
        var name=$('#name').val();
        var lastname=$('#lastname').val();
        var email=$('#email').val();
        var tvalod=$('#tvalod').val();




        if(u!='' && p!='' && name!='' && lastname!='' && email!='' && tvalod!=''){

            $.ajax({

                url:'function/Register.php',

                type:'POST',

                data:'username='+u+'&password='+p+'&name='+name+'&lastname='+lastname+'&email='+email+'&tvalod='+tvalod,

                success: function(data){

                    if(data==1){

                        location.replace("main");

                    }

                    else{



                        alert(data);
                        location.replace("../")

                    }

                }



            });

        }else{

            alert('اطلاعات را به صورت کامل وارد کنید');



        }
    }
</script>

</body>
</html>