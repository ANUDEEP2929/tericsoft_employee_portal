<!DOCTYPE html>

<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
            Login
        </title>
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
        <!--end::Web font -->
        <!--begin::Base Styles -->
        <link href="../../../assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
        <link href="../../../assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Base Styles -->
        <link rel="shortcut icon" href="../../../assets/demo/default/media/img/logo/favicon.ico" />
    </head>
    <!-- end::Head -->
    <body  class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <div class="m-login m-login--signin  m-login--5" id="m_login" style="background-image: url(../../../assets/app/media/img//bg/bg-3.jpg);">
                <div class="m-login__wrapper-2 m-portlet-full-height">
                    <div class="m-login__contanier">
                        <div class="m-login__signin">
                            <div class="m-login__head">
                                <h3 class="m-login__title">
                                    Login To Your Account
                                </h3>
                            </div>
                            <form class="m-login__form m-form" action="login" method="post">
                                <label style="display: none">{{ csrf_field() }}</label>
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input" type="text" placeholder="Email" name="email" autocomplete="off">
                                    <label class="m--font-danger">{{$errors->first('email')}}</label>
                                </div>
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input m-login__form-input--last" type="Password" placeholder="Password" name="password">
                                    <label class="m--font-danger">{{$errors->first('password')}}</label>
                                </div>
                                <div class="row m-login__form-sub">
                                    <div class="col m--align-left">
                                        <label class="m-checkbox m-checkbox--focus">
                                            <input type="checkbox" name="remember">
                                            Remember me
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="m-login__form-action">
                                    <button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
                                        Sign In
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <script src="../../../assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
        <script src="../../../assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
    </body>
    </div>
</html>
