<!DOCTYPE html>

<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
            Tericsoft Portal
        </title>
        <base href="http://localhost:8000">
        <meta name="description" content="Latest updates and statistic charts">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--begin::Web font -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
        <script src="js/jquery-1.8.2.min.js"></script>
        <!--end::Web font -->
        <!--begin::Base Styles -->  
        <!--begin::Page Vendors -->
        <link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Page Vendors -->
        <link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
        <link href="assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Base Styles -->
        <link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico" />
        <style>
        body *{
            color:#b59e31;
        }
        </style>
        <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

    </head>
    <!-- end::Head -->
    <!-- end::Body -->
    <body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <!-- BEGIN: Header -->
            <header id="m_header" class="m-grid__item    m-header "  m-minimize-offset="200" m-minimize-mobile-offset="200" >
                <div class="m-container m-container--fluid m-container--full-height">
                    <div class="m-stack m-stack--ver m-stack--desktop">
                        <!-- BEGIN: Brand -->
                        <div class="m-stack__item m-brand  m-brand--skin-dark ">
                            <div class="m-stack m-stack--ver m-stack--general">
                                <div class="m-stack__item m-stack__item--middle m-brand__logo">
                                    <a href="index.html" class="m-brand__logo-wrapper" style="text-decoration: none;color:white">
                                        <h4>Tericsoft</h4>
                                        <!-- <img alt="" src="assets/demo/default/media/img/logo/logo_default_dark.png"/> -->
                                    </a>
                                </div>
                                <div class="m-stack__item m-stack__item--middle m-brand__tools">
                                    <!-- BEGIN: Left Aside Minimize Toggle -->
                                    <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block
                     ">
                                        <span></span>
                                    </a>
                                    <!-- END -->
                            <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                                    <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                                        <span></span>
                                    </a>
                                    <!-- END -->
            <!-- BEGIN: Topbar Toggler -->
                                    <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                        <i class="flaticon-more"></i>
                                    </a>
                                    <!-- BEGIN: Topbar Toggler -->
                                </div>
                            </div>
                        </div>
                        <!-- END: Brand -->
                        <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                            <!-- BEGIN: Horizontal Menu -->
                            <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
                                <i class="la la-close"></i>
                            </button>
                            <div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark "  >
                                <ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
                                    <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel">
                                        {{-- <img src="logo.svg" height="35" alt="VCode4U Logo"> --}}
                                        <h4>Tericsoft Employee Portal</h4>
                                    </li>
                                </ul>
                            </div>
                            <!-- END: Horizontal Menu -->                               <!-- BEGIN: Topbar -->
                            <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                                <div class="m-stack__item m-topbar__nav-wrapper">
                                    <ul class="m-topbar__nav m-nav m-nav--inline">

                                        <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
                                            <a  class="m-nav__link m-dropdown__toggle">
                                                <span class="m-topbar__userpic">
                                                    <h4 class="m--font-weight-500">MENU</h4>
                                                </span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <!-- END: Topbar -->
                        </div>
                    </div>
                </div>
            </header>
            <!-- END: Header -->
        <!-- begin::Body -->
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body" style="padding-top: 49px!important;">
                <!-- BEGIN: Left Aside -->
                <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
                    <i class="la la-close"></i>
                </button>
                <div id="m_aside_left" class="m-grid__item  m-aside-left  m-aside-left--skin-dark " >
                    <!-- BEGIN: Aside Menu -->
                    <div
                        id="m_ver_menu"
                        class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
                        m-menu-vertical="1"
                         m-menu-scrollable="0" m-menu-dropdown-timeout="500"
                        >
                        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
                            <li class="m-menu__item  m-menu__item--active" aria-haspopup="true" >
                                <a   class="m-menu__link ">
                                    <span class="m-menu__link-title">
                                        <span class="m-menu__link-wrap">
                                            <span class="m-menu__link-text">
                                    <i class="m-menu__link-icon flaticon-line-graph"></i>
                                        
                                               Employee Dashboard
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="m-menu__section">
                                <h4 class="m-menu__section-text">
                                   
                                </h4>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true">
                                <a  href="employee/employee_home" class="m-menu__link m-menu__toggle">
                                        <span class="m-menu__link-text">
                                            <i class="fa fa-home"></i>Home
                                        </span>
                                    <!-- <i class="m-menu__ver-arrow la la-angle-right"></i> -->
                                </a>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true">
                                <a  href="employee/notifications" class="m-menu__link m-menu__toggle">
                                        <span class="m-menu__link-text">
                                            Notifications
                                        </span>
                                    <!-- <i class="m-menu__ver-arrow la la-angle-right"></i> -->
                                </a>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu">
                                <a  href="employee/signedDocuments" class="m-menu__link m-menu__toggle">
                                        <span class="m-menu__link-text">
                                            Signed Documents
                                        </span>
                                    <!-- <i class="m-menu__ver-arrow la la-angle-right"></i> -->
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END: Aside Menu -->
                </div>
                <!-- END: Left Aside -->
                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
                   {{--  <div class="m-subheader ">
                        <div class="d-flex align-items-center"  style="width:100%">
                            <div class="mr-auto"  style="width:100%">
                                <h3 class="m-subheader__title " style="width:100%">
                                </h3>
                            </div>

                        </div>
                    </div> --}}
                    <!-- END: Subheader -->
                    <div class="m-content">
                            @yield('employee_content')
                    </div>
                </div>
            </div>
            <!-- end:: Body -->
<!-- begin::Footer -->
                   {{--  <div class="m-container m-container--fluid m-container--full-height m-page__container">
                        <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
                            <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
                                <span class="m-footer__copyright">
                                    2018 &copy;
                                    <a href="https://www.vcode4u.com" class="m-link">
                                        Tericsoft
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <h6>tericsoft</h6> --}}
            <!-- end::Footer -->
        </div>
        <!-- end:: Page -->

        <!-- begin::Scroll Top -->
        <div id="m_scroll_top" class="m-scroll-top">
            <i class="la la-arrow-up"></i>
        </div>
        <!-- begin::Quick Nav -->   
        <!--begin::Base Scripts -->
        <script src="assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
        <script src="assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
        <!--end::Base Scripts -->   
        <!--begin::Page Vendors -->
        <script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
        <!--end::Page Vendors -->  
        <!--begin::Page Snippets -->
        <script src="assets/app/js/dashboard.js" type="text/javascript"></script>
        <script src="assets/demo/default/custom/components/datatables/base/html-table.js" type="text/javascript"></script>
        <script src="assets/demo/default/custom/components/datatables/base/data-local.js" type="text/javascript"></script>
        <!--end::Page Snippets -->
    </body>
    <!-- end::Body -->
</html>
