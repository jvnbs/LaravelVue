<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>PTI ADMIN</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{ asset('img/kaiadmin/favicon.ico')}}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('js/plugin/webfont/webfont.min.js')}}"></script>
    <script>
    WebFont.load({
        google: {
            families: ["Public Sans:300,400,500,600,700"]
        },
        custom: {
            families: [
                "Font Awesome 5 Solid",
                "Font Awesome 5 Regular",
                "Font Awesome 5 Brands",
                "simple-line-icons",
            ],
            urls: ["css/fonts.min.css"],
        },
        active: function() {
            sessionStorage.fonts = true;
        },
    });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/plugins.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/kaiadmin.min.css')}}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('css/demo.css')}}" />

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- <script type="text/javascript">
    window.onload = function() {
        // ब्राउज़र बैक और फॉरवर्ड बटन को नकारने के लिए
        history.pushState(null, null, location.href); // बैक बटन को ब्लॉक करने के लिए
        window.onpopstate = function() {
            history.pushState(null, null, location.href); // बैक बटन दबाने पर इसे फिर से पुश करेगा
            window.history.forward(); // फॉरवर्ड बटन को नकारेगा
        };
        window.history.forward(); // फॉरवर्ड बटन को नकारेगा
    };


    // कीबोर्ड नेविगेशन को रोकना (Alt+Arrow और F5 को रोकना)
    document.addEventListener("keydown", function(event) {
        // Alt + ArrowLeft या Alt + ArrowRight
        if (
            (event.altKey && event.key === "ArrowLeft") ||
            (event.altKey && event.key === "ArrowRight") ||
            event.key === "F5" || // F5 को रोकें
            (event.ctrlKey && event.key === "r") || // Ctrl+R को रोकें
            (event.key === "Backspace" && !event.target.matches(
                "input, textarea")) // बैकस्पेस (अगर input या textarea नहीं है)
        ) {
            event.preventDefault();
            alert("Navigation is disabled!");
        }
    });

    // माउस राइट-क्लिक को रोकना (context menu disable)
    // window.addEventListener("contextmenu", function(event) {
    //     event.preventDefault();
    //     alert("Right-click is disabled!");
    // });

    // ब्राउज़र के DevTools को डिसेबल करना (Ctrl+Shift+I, F12)
    document.addEventListener("keydown", function(event) {
        if (
            (event.ctrlKey && event.shiftKey && event.key === "I") || // Ctrl+Shift+I
            (event.ctrlKey && event.shiftKey && event.key === "J") || // Ctrl+Shift+J
            (event.ctrlKey && event.key === "U") || // Ctrl+U
            (event.key === "F12") // F12 Key
        ) {
            event.preventDefault();
            alert("DevTools are disabled!");
        }
    });

    // ब्राउज़र बैक/फॉरवर्ड के लिए माउस के बटन रोकना (Mouse Button Navigation)
    window.addEventListener("mouseup", function(event) {
        if (event.button === 3 || event.button === 4) { // माउस बैक/फॉरवर्ड बटन
            event.preventDefault();
            alert("Mouse navigation is disabled!");
        }
    });

    // किसी भी प्रकार की माउस ड्रैगिंग को रोकना
    window.addEventListener("dragstart", function(event) {
        event.preventDefault();
    });
    </script> -->
</head>

<body>

    <!-- Success Message -->
    @if(session('success'))
    <script>
    swal({
        title: "Success!",
        text: '{{ session('success') }}',
        icon: "success",
        position: "top-end",
        showConfirmButton: false,
        timer: 3000
    });
    </script>
    @endif


    <!-- Error Message -->
    @if(session('error'))
    <script>
    swal({
        title: "Error!",
        text: '{{ session('error') }}',
        icon: "error",
        position: "top-end",
        showConfirmButton: false,
        timer: 3000
    });
    </script>
    @endif

    <div class="wrapper">
        <!-- Sidebar -->
        @include('adminpnlx.layouts.sidebar')
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img src="{{ asset('img/kaiadmin/logo_light.svg')}}" alt="navbar brand"
                                class="navbar-brand" height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                @include('adminpnlx.layouts.header')
                <!-- End Navbar -->
            </div>

            <div class="container">
                @yield('content')
            </div>

            <!-- Footer -->
            @include('adminpnlx.layouts.footer')
            <!-- End Footer -->
        </div>

        <!-- Custom template | don't include it in your project! -->
        <div class="custom-template">
            <div class="title">Settings</div>
            <div class="custom-content">
                <div class="switcher">
                    <div class="switch-block">
                        <h4>Logo Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="selected changeLogoHeaderColor" data-color="dark"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
                            <br />
                            <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Navbar Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeTopBarColor" data-color="dark"></button>
                            <button type="button" class="changeTopBarColor" data-color="blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="green"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange"></button>
                            <button type="button" class="changeTopBarColor" data-color="red"></button>
                            <button type="button" class="selected changeTopBarColor" data-color="white"></button>
                            <br />
                            <button type="button" class="changeTopBarColor" data-color="dark2"></button>
                            <button type="button" class="changeTopBarColor" data-color="blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple2"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="green2"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange2"></button>
                            <button type="button" class="changeTopBarColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Sidebar</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeSideBarColor" data-color="white"></button>
                            <button type="button" class="selected changeSideBarColor" data-color="dark"></button>
                            <button type="button" class="changeSideBarColor" data-color="dark2"></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-toggle">
                <i class="icon-settings"></i>
            </div>
        </div>
        <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('js/core/jquery-3.7.1.min.js')}}"></script>
    <script src="{{ asset('js/core/popper.min.js')}}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js')}}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('js/plugin/chart.js/chart.min.js')}}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('js/plugin/chart-circle/circles.min.js')}}"></script>

    <!-- Datatables -->
    <script src="{{ asset('js/plugin/datatables/datatables.min.js')}}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('js/plugin/jsvectormap/jsvectormap.min.js')}}"></script>
    <script src="{{ asset('js/plugin/jsvectormap/world.js')}}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('js/plugin/sweetalert/sweetalert.min.js')}}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('js/kaiadmin.min.js')}}"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{ asset('js/setting-demo.js')}}"></script>
    <script src="{{ asset('js/demo.js')}}"></script>



<script>
  const form = document.getElementById("mw-form");
  const submitButton = document.getElementById("submitButton");

  form.addEventListener("submit", function () {
    // Disable the button to prevent multiple submissions
    submitButton.disabled = true;
    submitButton.textContent = "Submitting...";
  });
</script>

    <script>
    $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
    });

    $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
    });

    $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
    });
    </script>
</body>

</html>