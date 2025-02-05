<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{ asset('img/kaiadmin/favicon.ico')}}" type="image/x-icon" />

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/plugins.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/kaiadmin.min.css')}}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('css/demo.css')}}" />

    <script type="text/javascript">
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
    window.addEventListener("contextmenu", function(event) {
        event.preventDefault();
        alert("Right-click is disabled!");
    });

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
    </script>

</head>

<body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        @if(session('success'))
        <script>
        swal({
            title: "Success!",
            text: "{{ session('success') }}",
            icon: "success",
            position: "top-end", 
            showConfirmButton: false,
            timer: 3000 
        });
        </script>
        @endif

        @if($errors->has('error'))
        <script>
        swal({
            title: "Error!",
            text: "{{ $errors->first('error') }}",
            icon: "error",
            position: "top-end",
            showConfirmButton: false,
            timer: 3000
        });
        </script>
        @endif

    <div class="wrapper">
        <div class="container">
            @yield('content')
        </div>

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
</body>

</html>