<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- icon --}}
    <link rel="icon" href="/assets/img/icon.png">
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="/assets/css/mdb.min.css" />
    {{-- my styles --}}
    <style>
        .divider:after,
        .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
        }
        @media (max-width:1000px){
          div.webhost {
            margin-bottom: 100px;
          }
        }
    </style>
    <title>Web Secret Message | {{ $title }}</title>
</head>
<body class="bg-dark">
    <div class="container">
        @yield('container')
    </div>
</body>

{{-- MDBootstrap5 --}}
<script type="text/javascript" src="/assets/js/mdb.min.js"></script>
</html>