<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Admin Gis Mật độ dân số</title>

  <link href="<?= BASEURL;  ?>/assets/assets/css/pace.min.css" rel="stylesheet" />
  <script src="<?= BASEURL;  ?>/assets/js/pace.min.js"></script>
  <link rel="stylesheet" href="<?= BASEURL;  ?>/assets/plugins/summernote/dist/summernote-bs4.css"/>
  <link rel="icon" href="<?= BASEURL;  ?>/assets/images/favicon.ico" type="image/x-icon">
  <link href="<?= BASEURL;  ?>/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
  <link href="<?= BASEURL;  ?>/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="<?= BASEURL;  ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?= BASEURL;  ?>/assets/css/animate.css" rel="stylesheet" type="text/css" />
  <link href="<?= BASEURL;  ?>/assets/css/icons.css" rel="stylesheet" type="text/css" />
  <link href="<?= BASEURL;  ?>/assets/css/sidebar-menu.css" rel="stylesheet" />
  <link href="<?= BASEURL;  ?>/assets/css/app-style.css" rel="stylesheet" />
  

</head>

<body class="bg-theme bg-theme1">


  <!-- start loader -->
  <div id="pageloader-overlay" class="visible incoming">
    <div class="loader-wrapper-outer">
      <div class="loader-wrapper-inner">
        <div class="loader"></div>
      </div>
    </div>
  </div>
  
 <div id="wrapper">
    <header class="topbar-nav">
      <nav class="navbar navbar-expand fixed-top">
        <ul class="navbar-nav mr-auto align-items-center">
          <li class="nav-item">
            <a class="nav-link toggle-menu" href="javascript:void();">
              <i class="icon-menu menu-icon"></i>
            </a>
          </li>
        </ul>
		
        <ul class="navbar-nav align-items-center right-nav-link">
          <li class="nav-item">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
              <span class="user-profile"><img src="<?= BASEURL;  ?>/assets/images/avatar-admin.png" class="img-circle"
                  alt="user avatar"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
              <li class="dropdown-item user-details">
                <a href="javaScript:void();">
                  <div class="media">
                    <div class="avatar"><img class="align-self-start mr-3" src="<?= BASEURL;  ?>/assets/images/avatar-admin.png"
                        alt="user avatar"></div>
                    <div class="media-body">
                      <h6 class="mt-2 user-title">GIS DÂN SỐ</h6>
                	<b> Admin:  Lê Thạch</b>                         
                    </div>
                  </div>
                </a>
              </li>
            
              <li class="dropdown-divider"></li>
			 <li class="dropdown-item"><i class="icon-power mr-2"></i><a href="<?= BASEURL;  ?>/admin/logout"> Đăng xuất</a></li>		
            </ul>
          </li>
        </ul>
      </nav>
    </header>
    <div class="clearfix"></div>

    
  <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
      <a href="<?= BASEURL;  ?>/admin/homepage">
        <img src="<?= BASEURL;  ?>/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        <h5 class="logo-text">Admin GIS DÂN SỐ</h5>
      </a>
    </div>
    <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MENU ADMIN</li>
      <li>
        <a href="<?= BASEURL;  ?>#">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Tổng quan</span>
        </a>
      </li>
      
        <li>
        <a href="<?= BASEURL;  ?>/province">
          <i class="zmdi zmdi-account-box"></i> <span>Quản lý Tỉnh</span>
        </a>
      </li>

      <li>
        <a href="<?= BASEURL;  ?>/district">
          <i class="zmdi zmdi-account-box"></i> <span>Quản lý Quận Huyện</span>
        </a>
      </li>

      <li>
        <a href="<?= BASEURL;  ?>/commune">
          <i class="zmdi zmdi-account-box"></i> <span>Quản lý Xã Phường</span>
        </a>
      </li>

      <li>
        <a href="<?= BASEURL;  ?>/population">
          <i class="zmdi zmdi-account-box"></i> <span>Dân số</span>
        </a>
      </li>
      

    </ul>
  </div>