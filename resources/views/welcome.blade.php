<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>EtbizHub</title>
      <link rel="icon" type="image/png" href="{{ asset('front/favicon.png') }}">
      <link rel="icon" type="image/x-icon" href="{{ asset('front/favicon.ico') }}">
      <link rel="stylesheet" href="{{ asset('front/bootstrap.min.css') }}">
      <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="{{ asset('front/fonts/fonts.css') }}">
      <link rel="stylesheet" href="{{ asset('front/custom.css') }}">

      <link rel="stylesheet" href="{{ asset('front/dashboard.css') }}">
      <link rel="stylesheet" href="{{ asset('front/css/listing_style.css') }}">
      <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

      @vite('resources/js/app.js')
</head>

<body class="index-templete">

      <div id="app"></div>

      <!-- Correct JS References -->
      <script src="{{ asset('front/jquery-3.7.0.js') }}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script src="{{ asset('front/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('front/custom.js') }}"></script>

      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</body>

</html>