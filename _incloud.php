<!-- BEGIN LOADER -->
<div id="load_screen"> <div class="loader"> <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div></div></div>
<!--  END LOADER -->

<!--  BEGIN NAVBAR  -->
<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">
        <ul class="navbar-item flex-row">
            <li class="nav-item theme-logo">
                <a href="../">
                    <img src="assets/img/icon.png" class="navbar-logo" alt="logo">
                </a>
            </li>
        </ul>

        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg></a>

        <ul class="navbar-item flex-row search-ul">
            <li class="nav-item align-self-center search-animated">
                <form class="form-inline search-full form-inline search" role="search">
                    <div class="search-bar">
                        <p>پروژه دیتابیس</p>
                    </div>
                </form>
            </li>
        </ul>
        <ul class="navbar-item flex-row navbar-dropdown">




            <li class="nav-item dropdown notification-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg><span class="badge badge-success"></span>
                </a>
                <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="notificationDropdown">
                    <div class="notification-scroll">
                        <?php
                        $getnotficatin=runsql("SELECT * FROM tblNotification where iduser=$iduser   and status=0 order by idNotification desc LIMIT 4");
                        foreach ($getnotficatin as $key){
                          echo'
                            <div class="dropdown-item">
                            <div class="media server-log">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg>
                                <div class="media-body">
                                    <div class="data-info">
                                        <h6 class=""><a href="Notification"> '.$key['vlaue'].'</a></h6>

                                    </div>

                                </div>
                            </div>
                        </div>
                          ';
                        }
                        ?>
                        <div class="dropdown-item">
                            <div class="media server-log">
                                <div class="media-body">

                                        <h6 class=""><a href="Notification"> بیشتر</a></h6>




                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </li>

            <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="assets/img/icon.png" alt="admin-profile" class="img-fluid">
                </a>
                <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="userProfileDropdown">
                    <div class="user-profile-section">
                        <div class="media mx-auto">
                            <img src="assets/img/icon.png" class="img-fluid mr-2" alt="avatar">
                            <div class="media-body">
                                <?php
                                $getdamin=getrecord("tbluser","iduser=$iduser");
                                echo ' <h5>'.$getdamin[0][name].' '.$getdamin[0][lastname].'</h5>';


                                ?>


                            </div>
                        </div>
                    </div>

                    <div class="dropdown-item">
                        <a href="../?action=signout">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> <span>خروج</span>
                        </a>
                    </div>
                    <div class="dropdown-item">
                        <a href="edite-profile">
                            <span>ویرایش پروفایل</span>
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </header>
</div>
<!--  END NAVBAR  -->
<!--  BEGIN SIDEBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN SIDEBAR  -->
    <div class="sidebar-wrapper sidebar-theme">

        <nav id="compactSidebar">
            <ul class="menu-categories">

                <?php
                $getcat=getrecord("tblmenu","subitem=0");
                foreach ($getcat as $key){
                    if($key[url]=='mahsol'){
                        echo'<li class="menu active ">';
                    }else{
                        echo '<li class="menu ">';
                    }
                    echo '
                    <a href="#'.$key[url].'" data-active="true" class="menu-toggle">
                        <div class="base-menu">
                            <div class="base-icons">
                            '.$key[icon].'
                            </div>
                                <span>'.$key[name].'</span>
                        </div>
                    </a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                </li>';
                }

                ?>



            </ul>
        </nav>

        <div id="compact_submenuSidebar" class="submenu-sidebar">

            <?php
            $getcat=getrecord("tblmenu","subitem=0");
            foreach ($getcat as $key){
                echo '
                <div class="submenu" id="'.$key[url].'">
                    <ul class="submenu-list" data-parent-element="#dashboard">';
                $getsub=getrecord("tblmenu","subitem=$key[idmenu]");
                if(count($getsub)>0){
                    foreach ($getsub as $sub){
                        if($sub[url]=='add-product'){
                            echo ' <li class="active">';
                        }else{
                            echo ' <li class="">';
                        }
                        echo '
                                            <a href="'.$sub[url].'" >'.$sub[name].'</a>
                                        </li> ';
                    }
                }else{
                    echo ' <li class="active">
                                            <a href="'.$key[url].'" >'.$key[name].'</a>
                                        </li> ';
                }

                echo ' </ul>
                 </div>';
            }

            ?>




        </div>

    </div>