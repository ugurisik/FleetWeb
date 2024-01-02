<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title><?= $this->lang->get("site_name") ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="<?= $this->lang->get("site_description") ?>" name="description" />
    <meta content="<?= $this->lang->get("site_keywords") ?>" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= ASSET_PATH ?>/images/favicon.ico">

    <!-- Layout config Js -->
    <script src="<?= ASSET_PATH ?>/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="<?= ASSET_PATH ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= ASSET_PATH ?>/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= ASSET_PATH ?>/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="<?= ASSET_PATH ?>/css/custom.min.css" rel="stylesheet" type="text/css" />


    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

    <link href="<?= ASSET_PATH ?>/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="<?= ASSET_PATH ?>/images/safarifleet.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= ASSET_PATH ?>/images/safarifleet.png" alt="" height="17">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?= ASSET_PATH ?>/images/safarifleet.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= ASSET_PATH ?>/images/safarifleet.png" alt="" height="17">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="dropdown ms-1 topbar-head-dropdown header-item">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img id="header-lang-imga" src="<?= ASSET_PATH ?>/images/flags/us.svg" alt="Header Language" height="20" class="rounded">
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="<?= SITE_URL ?>/lang/en" class="dropdown-item notify-item language py-2" data-lang="en" title="English">
                                    <img src="<?= ASSET_PATH ?>/images/flags/us.svg" alt="user-image" class="me-2 rounded" height="18">
                                    <span class="align-middle">English</span>
                                </a>
                                <a href="<?= SITE_URL ?>/lang/tr" class="dropdown-item notify-item language" data-lang="tr" title="Turkish">
                                    <img src="<?= ASSET_PATH ?>/images/flags/turkey.svg" alt="user-image" class="me-2 rounded" height="18" width="18">
                                    <span class="align-middle">Turkish</span>
                                </a>
                                <a href="<?= SITE_URL ?>/lang/de" class="dropdown-item notify-item language" data-lang="de" title="German">
                                    <img src="<?= ASSET_PATH ?>/images/flags/germany.svg" alt="user-image" class="me-2 rounded" height="18">
                                    <span class="align-middle">Deutsche</span>
                                </a>
                            </div>
                        </div>
                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                                <i class='bx bx-fullscreen fs-22'></i>
                            </button>
                        </div>
                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                                <i class='bx bx-moon fs-22'></i>
                            </button>
                        </div>
                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user" src="<?= ASSET_PATH ?>/images/users/user-dummy-img.jpg" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?= $this->frontEnd->userInfo()['info']['fname'] ?> <?= $this->frontEnd->userInfo()['info']['lname'] ?></span>
                                        <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">
                                            <?= $this->lang->get("privileges." . $this->frontEnd->userInfo()['Role']) ?>
                                        </span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome <?= $this->frontEnd->userInfo()['info']['fname'] ?>!</h6>
                                <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="pages-profile-settings.html"><span class="badge bg-success-subtle text-success mt-1 float-end">New</span><i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Settings</span></a>
                                <a class="dropdown-item" href="<?= SITE_URL ?>/logout"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?= ASSET_PATH ?>/images/safarifleet.png" alt="" height="50" style="width: 100%; height: auto;">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= ASSET_PATH ?>/images/safarifleet.png" alt="" height="50" style="width: 100%; height: auto;">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?= ASSET_PATH ?>/images/safarifleet.png" alt="" height="50" style="width: 100%; height: auto;">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= ASSET_PATH ?>/images/safarifleet.png" alt="" height="50" style="width: 100%; height: auto;">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>
            <div id="scrollbar">
                <div class="container-fluid">
                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages"><?= $this->lang->get("menu_items.menu_title") ?></span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#menu1" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="menu1">
                                <i class="ri-car-fill"></i> <span data-key="t-landing"><?= $this->lang->get("menu_items.cars_title") ?></span>
                            </a>
                            <div class="collapse menu-dropdown" id="menu1">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?= SITE_URL ?>/car/list" class="nav-link" data-key="t-one-page"><?= $this->lang->get("menu_items.cars_list") ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= SITE_URL ?>/car/add" class="nav-link" data-key="t-nft-landing"><?= $this->lang->get("menu_items.cars_add") ?></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#menu2" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="menu2">
                                <i class="bx bx-user"></i> <span data-key="t-landing">Şoför</span>
                            </a>
                            <div class="collapse menu-dropdown" id="menu2">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?= SITE_URL ?>/operator/list" class="nav-link" data-key="t-one-page">Şoför Listesi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= SITE_URL ?>/operator/add" class="nav-link" data-key="t-nft-landing">Şoför Ekleme</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#menu4" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="menu4">
                                <i class="ri-git-branch-line"></i> <span data-key="t-landing">Şubeler</span>
                            </a>
                            <div class="collapse menu-dropdown" id="menu4">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?= SITE_URL ?>/branch/list" class="nav-link" data-key="t-one-page">Şube Listesi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= SITE_URL ?>/branch/addBranch" class="nav-link" data-key="t-one-page">Şube Ekleme</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= SITE_URL ?>/branch/listPerson" class="nav-link" data-key="t-one-page">Personel Listesi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= SITE_URL ?>/branch/addPerson" class="nav-link" data-key="t-nft-landing">Personel Ekleme </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= SITE_URL ?>/crash/list">
                                <i class="bx bxs-car-crash"></i> <span data-key="t-widgets">Kaza</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= SITE_URL ?>/fuel/list">
                                <i class="mdi mdi-fuel"></i> <span data-key="t-widgets">Yakıt</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= SITE_URL ?>/ticket/list">
                                <i class="mdi mdi-ticket"></i> <span data-key="t-widgets">Ceza</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= SITE_URL ?>/trips">
                                <i class="ri-road-map-fill"></i> <span data-key="t-widgets">Geziler</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= SITE_URL ?>/issue/list">
                                <i class="bx bx-error-circle"></i> <span data-key="t-widgets">Sorunlar</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#menu3" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="menu3">
                                <i class="bx bx-user"></i> <span data-key="t-landing">Servis & Bakım</span>
                            </a>
                            <div class="collapse menu-dropdown" id="menu3">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?= SITE_URL ?>/service/list" class="nav-link" data-key="t-one-page">Servis & Bakım Listesi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= SITE_URL ?>/service/typeList" class="nav-link" data-key="t-nft-landing">Servis & Bakım Türleri</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sidebar-background"></div>
        </div>
        <div class="vertical-overlay"></div>
        <div class="main-content">