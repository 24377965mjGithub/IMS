<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
    {{-- font awesome --}}
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/brands.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/fontawesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/regular.min.css') }}"/>
    {{-- <link rel="stylesheet" href="{{ asset('assets/font-awesome/solid.min.css') }}"/> --}}
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/solid.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/svg-with-js.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/v4-font-face.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/v5-font-face.min.css') }}"/>

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    {{-- mdb --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/MDB-Free_4.20.0/css/mdb.min.css') }}"> --}}

    {{-- <link rel="stylesheet" href="{{ asset('assets/MDB-Free_4.20.0/css/addons/datatables-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/MDB-Free_4.20.0/css/addons/datatables-select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/MDB-Free_4.20.0/css/addons/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/MDB-Free_4.20.0/css/addons/datatables2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/MDB-Free_4.20.0/css/addons/directives.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/MDB-Free_4.20.0/css/addons/flag.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/MDB-Free_4.20.0/css/addons/jquery.zmd.hierarchical-display.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/MDB-Free_4.20.0/css/addons/rating.min.css') }}"> --}}

    

    {{-- theme styles --}}
    
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" /> --}}
    <style>
        @font-face {
            font-family: Poppins;
            src: url('assets/fonts/Poppins-Bold.woff2') format('woff2');
        }

        @font-face {
        font-family: PoppinsRegular;
        src: url('assets/fonts/Poppins-Regular.woff2') format('woff2');
        }
        
        #loader {
            border: 12px solid #f3f3f3;
            border-radius: 50%;
            border-top: 12px solid rgb(116,152,255);
            width: 70px;
            height: 70px;
            animation: spin 1s linear infinite;
        }
 
        .center {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
        }
 
        @keyframes spin {
            100% {
                transform: rotate(360deg);
            }
        }

    </style>
    <!-- Scripts -->
    {{-- @vite([
        'resources/sass/app.scss',
        'resources/js/app.js'
    ]) --}}


    {{-- prod --}}
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-8065914e.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/app-71455456.css') }}"> --}}

    {{-- welcome --}}
    <link rel="stylesheet" href="{{ asset('assets/welcome/css/style.css') }}">
	<script src="https://unpkg.com/animejs@3.0.1/lib/anime.min.js"></script>
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    
    {{-- custom --}}
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    {{-- @livewireStyles --}}
</head>
<body class="is-boxed has-animations">
    <div id="loader" class="center"></div>
    <div id="apps">
        

        @yield('content')
    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script> --}}
    {{-- font awesome --}}
    <script src="{{ asset('assets/fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('assets/fontawesome/js/brands.min.js') }}"></script>
    <script src="{{ asset('assets/fontawesome/js/conflict-detection.min.js') }}"></script>
    <script src="{{ asset('assets/fontawesome/js/fontawesome.min.js') }}"></script>
    <script src="{{ asset('assets/fontawesome/js/regular.min.js') }}"></script>
    <script src="{{ asset('assets/fontawesome/js/solid.min.js') }}"></script>
    <script src="{{ asset('assets/fontawesome/js/v4-shims.min.js') }}"></script>

    {{-- mdb script --}}

    {{-- <script src="{{ asset('assets/MDB-Free_4.20.0/js/mdb.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/MDB-Free_4.20.0/js/addons/datatables-select.min.js') }}"></script>
    <script src="{{ asset('assets/MDB-Free_4.20.0/js/addons/datatables-select2.min.js') }}"></script>
    <script src="{{ asset('assets/MDB-Free_4.20.0/js/addons/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/MDB-Free_4.20.0/js/addons/datatables2.min.js') }}"></script>
    <script src="{{ asset('assets/MDB-Free_4.20.0/js/addons/directives.min.js') }}"></script>
    <script src="{{ asset('assets/MDB-Free_4.20.0/js/addons/flag.min.js') }}"></script>
    <script src="{{ asset('assets/MDB-Free_4.20.0/js/addons/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/MDB-Free_4.20.0/js/addons/jquery.zmd.hierarchical-display.min.js') }}"></script>
    <script src="{{ asset('assets/MDB-Free_4.20.0/js/addons/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/MDB-Free_4.20.0/js/addons/rating.min.js') }}"></script>

    <script src="{{ asset('assets/js/mdb.js') }}"></script> --}}

    {{-- prod --}}

    {{-- <script src="{{ asset('build/assets/app-c1097373.js') }}"></script>
    <script src="{{ asset('build/assets/script-a3c317cf.js') }}"></script> --}}
    {{-- livewire --}}
    {{-- <script src="{{ asset('vendor/livewire/livewire.js') }}"></script> --}}

    <script>
        document.onreadystatechange = function() {
            if (document.readyState !== "complete") {
                document.querySelector("body").style.visibility = "hidden";
                document.querySelector("#loader").style.visibility = "visible";
            } else {
                document.querySelector("#loader").style.display = "none";
                document.querySelector("body").style.visibility = "visible";
            }
        };

        // image preview

        function showPreview(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>

    {{-- welcome --}}
    <script src="{{ asset('assets/welcome/js/main.min.js') }}"></script>

    {{-- custom --}}
    <script src="{{ asset('assets/js/script.js') }}"></script>

    {{-- end theme --}}

    {{-- @livewireScripts --}}
</body>
</html>
