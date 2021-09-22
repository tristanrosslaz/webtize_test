<?php // matching the token url and the token session
    if($this->session->userdata('token_session') != en_dec("dec", $token)){
        header("Location:".base_url('Main/logout')); /* Redirect to login */
        exit();
    }

    //022818
    $position_access = $this->session->userdata('get_position_access');
    $access_nav = $position_access->access_nav;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=company_name();?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/jquery-ui.css');?>">
    <!-- Google fonts - Roboto -->
    <!-- <link rel="stylesheet" href="<?=base_url('assets/css/google_fonts.css');?>"> -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <!-- theme stylesheet--><!-- we change the color theme by changing color.css -->
    <link rel="stylesheet" href="<?=base_url('assets/css/style.blue.css');?>" id="theme-stylesheet">
    <link rel="stylesheet" href="<?=base_url('assets/css/select2-materialize.css');?>">
    <!-- Custom stylesheet - for your changes--> 
    <link rel="stylesheet" href="<?=base_url('assets/css/custom.css');?>">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?=base_url('assets/img/pandabookslogo.png');?>">
    <!-- Font Awesome CDN-->
    <!-- you can replace it by local Font Awesome-->
   <link rel="stylesheet" href="<?=base_url('assets/css/font-awesome.min.css');?>">
    <!-- Font Icons CSS-->
    <!-- <link rel="stylesheet" href="<?=base_url('assets/css/myfontastic.css');?>"> -->
    <!-- Jquery Datatable CSS-->
    <link rel="stylesheet" href="<?=base_url('assets/css/datatables.min.css');?>">
    <!-- <link rel="stylesheet" href="<?=base_url('assets/css/jquery.dataTables.css');?>"> -->
    <!-- Jquery Select2 CSS-->
    <link rel="stylesheet" href="<?=base_url('assets/css/select2.min.css');?>">
    <!-- Bootstrap Datepicker CSS-->
    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap-datepicker3.min.css');?>">
    <!-- Jquery Toast CSS-->
    <link rel="stylesheet" href="<?=base_url('assets/css/jquery.toast.css');?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/easy-autocomplete.css');?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/mdb.min.css');?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/style.css');?>">
    
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body data-base_url="<?=base_url();?>">
    <div class="page charts-page">
        <!-- Main Navbar-->
        <header class="header w-100">
            <nav class="navbar w-100">
                <div class="container-fluid">
                    <div class="navbar-holder d-flex align-items-center justify-content-between w-100">
                        <!-- Navbar Header-->
                        <div class="navbar-header">
                            <!-- Navbar Brand -->
                            <a href="#" id="menu-toggle" class="d-inline d-xl-none"><i class="fa fa-bars text-white fa-lg mr-2"></i></a>
                            <a href="<?=base_url();?>" class="navbar-brand">
                                <div class="brand-text brand-big hidden-lg-down d-none d-xl-block">
                                     <img src="<?=base_url("assets/img/");?><?=company_logo();?>" class="nav-logo">

                                </div>
                                <div class="brand-text brand-small d-block d-xl-none">
                                    <strong> <img src="<?=base_url("assets/img/pandabookslogo.png");?>" style="height: 30px; width: 30px" class="nav-logo"> <!-- <?php echo company_initial(); ?> --></strong>
                                </div>
                            </a>
                            <!-- Toggle Button-->
                            <!-- <a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a> -->
                        </div>
                        <!-- Navbar Menu -->
                        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                            <!-- Logout    -->
                            <li class="nav-item imgnavitem"><img src="<?=base_url("assets/img/");?><?=company_logo_small();?>" style="height: 30px; width: 30px"></li>
                            <li class="nav-item"><a href="<?=base_url('Main/logout');?>" class="nav-link logout"><i class="fa fa-sign-out fa-lg"></i></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="page-content d-flex align-items-stretch"> 
            <div id="overlay"></div>
            <!-- Side Navbar -->
            <nav id="sideNav" class="side-navbar sidebar-fixed position-fixed">
                <!-- Sidebar Header-->
                <div class="sidebar-header d-flex align-items-center">
                    <div class="avatar">
                        <?php $avatar_file = $this->session->userdata('avatar_file'); ?>
                        <img src="<?=base_url("assets/avatar/");?><?php if(!empty($avatar_file)) { ?><?=$avatar_file;?> <?php }else{ echo "cp-panda-only.png" ?><?php } ?>" alt="..." class="img-fluid rounded-circle">
                    </div>
                    <div class="title">
                        <h1 class="h4"><?=$this->session->userdata('firstname');?> <?=$this->session->userdata('lastname');?></h1>
                        <p><?=$get_position->position?></p>
                    </div>
                </div>
                <!-- Sidebar Navidation Menus-->
                <div class="side_nav_scroll">
                    <span class="heading">Main</span>
                    <?php 
                        $main_page_nav = $this->model->get_main_page_navigation()->result();
                    ?>

                    <ul class="list-unstyled pageNavigation list-group list-group-flush" id="pageNavigation">
                        <?php 
                        $arr_ = explode(', ', $access_nav); //array to string concut using comma 
                        ?>
                        <?php foreach($main_page_nav as $mpn){ ?>
                            <?php if (in_array($mpn->main_nav_id, $arr_)){ ?>
                                <?php if ($mpn->enabled == "1") { ?>
                                    <li data-num="<?=$mpn->main_nav_id;?>" id="moduleLink" data-href="<?=base_url('Main_page/display_page/'.$mpn->main_nav_href.'/'.$token);?>">
                                        <a><i class="fa <?=$mpn->main_nav_icon;?>" aria-hidden="true"></i> <?=$mpn->main_nav_desc;?></a>
                                    </li>
                                <?php } 
                                else { ?>
                                    <li data-num="<?=$mpn->main_nav_id;?>" id="moduleLink" data-href="<?=base_url('Main_page/page_under_construction/'.$token);?>">
                                        <a><i class="fa <?=$mpn->main_nav_icon;?>" aria-hidden="true"></i> <?=$mpn->main_nav_desc;?></a>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                    <span class="heading">Others</span>
                    <ul class="list-unstyled pageNavigation list-group list-group-flush">
                        <li data-num="99"><a href="<?=base_url('Main_page/display_page/profile_settings_home/'.$token);?>"> <i class="fa fa-user"></i>Profile Settings </a></li>
                    </ul>
                </div>
            </nav>
            <main class="w-100">
                <div class="container-fluid"></div>
                 <div class="push-footer">