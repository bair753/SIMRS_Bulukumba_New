<!DOCTYPE html>
<html lang="en">

<head>
    <title> Home - EIS </title>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Template By ER@Epic Transmedic">
    <meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="{!! asset('favicon.ico') !!}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="{{ asset('comp/bower_components/bootstrap/css/bootstrap.min.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('comp/assets/icon/themify-icons/themify-icons.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('comp/assets/icon/icofont/css/icofont.css') }}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('comp/assets/icon/feather/css/feather.css') }}">
 
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('comp/assets/icon/font-awesome/css/font-awesome.min.css') }}">
   
    <!-- jpro forms css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('comp/assets/pages/j-pro/css/demo.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('comp/assets/pages/j-pro/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('comp/assets/pages/j-pro/css/j-pro-modern.css') }}">
  
    <!-- Mini-color css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('comp\bower_components\jquery-minicolors\css\jquery.minicolors.css') }}">
    
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('comp\assets\pages\j-pro\css\j-forms.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('comp\assets\css\style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('comp\assets\css\jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('comp\assets\css\pcoded-horizontal.min.css') }}">
    <link rel="stylesheet" href="{{ asset('comp\assets\css\bootstrapValidator.min.css') }}" />
    <!-- ion icon css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('comp\assets\icon\ion-icon\css\ionicons.min.css') }}">

    <link href="{!! asset('css/font-roboto.css') !!}" rel='stylesheet' type='text/css'>
    <link href="{!! asset('css/font-material.css') !!}" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{!! asset('comp/bower_components/animate.css/css/animate.css') !!}">
    <link rel="stylesheet" href="{{ asset('css/styleCustom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleAdminLte.css') }}">

    <style>
        .overlay {
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            outline: 0;
            z-index: 1051;
            background: rgba(255, 255, 255, 0.8) url("{{ URL::asset('load2.gif') }}") center no-repeat;
            background-size: 100px;
        }

        /* Turn off scrollbar when body element has the loading class */
        body.loading {
            overflow: hidden;
        }

        /* Make spinner image visible when body element has the loading class */
        body.loading .overlay {
            display: block;
        }

        #notifikasi {
            cursor: pointer;
            position: fixed;
            right: 0px;
            z-index: 9999;
            bottom: 0px;
            margin-bottom: 22px;
            margin-right: 15px;
            min-width: 300px;
            max-width: 800px;
        }

        .pcoded .pcoded-header .navbar-logo[logo-theme="theme1"] {
            background-color: #8C489F;
        }

        .pcoded .pcoded-header[header-theme="theme6"] {
            background: #8C489F;
        }

        .right {
            text-align: right;
        }

        .input-group {
            margin-bottom: 0px;
        }

        fieldset {
            border: 1px solid #ddd !important;
            margin: 0;
            padding: 10px;
            position: relative;
            border-radius: 4px;
            padding-left: 10px !important;
        }

        legend {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 0px;
            width: 35%;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px 5px 5px 10px;
            background-color: #ffffff;
        }

        @media (min-width: 992px) {
            .modal-lg {
                max-width: 1200px;
            }
        }

        .modal {
            z-index: 1999;
        }
    </style>
    <script src="{{ asset('js/jquery/jquery-3.5.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('comp\bower_components\popper.js\js\popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('comp\bower_components\bootstrap\js\bootstrap.min.js') }}"></script>
    <!-- j-pro js -->
    <script type="text/javascript" src="{{ asset('comp\assets\pages\j-pro\js\jquery.ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('comp\assets\pages\j-pro\js\jquery.maskedinput.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('comp\assets\pages\j-pro\js\jquery.j-pro.js') }}"></script>

    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset('comp\bower_components\jquery-slimscroll\js\jquery.slimscroll.js') }}"></script>



    <!-- Mini-color js -->
    <script type="text/javascript" src="{{ asset('comp\bower_components\jquery-minicolors\js\jquery.minicolors.min.js') }}"></script>

    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('comp\bower_components\modernizr\js\modernizr.js') }}"></script>
    <script type="text/javascript" src="{{ asset('comp\bower_components\modernizr\js\css-scrollbars.js') }}"></script>



    <!-- Custom js -->

    <script src="{{ asset('comp\assets\js\pcoded.min.js') }}"></script>
    <script src="{{ asset('comp\assets\js\menu\menu-hori-fixed.js') }}"></script>
    <script src="{{ asset('comp\assets\js\jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('comp\assets\js\script.js') }}"></script>



    @yield('css')
    <script type="text/javascript" src="{{ asset('comp\assets\js\customHelper.js') }}"></script>
    <script type="text/javascript">
        $("#notifikasi").slideDown('slow').delay(3000).slideUp('slow');
    </script>

</head>

<body>


    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>

            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-container">
            <!-- Menu header start -->

            <!-- Menu header end -->
            <div class="pcoded-main-container">

                <div class="pcoded-wrapper">
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div id="notifikasi"></div>
                                @yield('content-body')
                            </div>
                            <!-- Main-body end -->
                            <div id="styleSelector"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<script>
    $("#showLoading").hide()

    // ===== Scroll to Top ====
    $(window).scroll(function() {
        if ($(this).scrollTop() >= 50) { // If page is scrolled more than 50px
            $('#return-to-top').fadeIn(200); // Fade in the arrow
        } else {
            $('#return-to-top').fadeOut(200); // Else fade out the arrow
        }
    });
    $('#return-to-top').click(function() { // When arrow is clicked
        $('body,html').animate({
            scrollTop: 0 // Scroll to top of body
        }, 500);
    });
</script>

@yield('javascript')


</html>