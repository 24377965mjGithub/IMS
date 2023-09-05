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

    {{-- mdb --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/MDB-Free_4.20.0/css/mdb.min.css') }}"> --}}

    <link rel="stylesheet" href="{{ asset('assets/MDB-Free_4.20.0/css/addons/datatables-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/MDB-Free_4.20.0/css/addons/datatables-select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/MDB-Free_4.20.0/css/addons/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/MDB-Free_4.20.0/css/addons/datatables2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/MDB-Free_4.20.0/css/addons/directives.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/MDB-Free_4.20.0/css/addons/flag.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/MDB-Free_4.20.0/css/addons/jquery.zmd.hierarchical-display.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/MDB-Free_4.20.0/css/addons/rating.min.css') }}">



    {{-- theme styles --}}

    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
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
    @vite([
        'resources/sass/app.scss',
        'resources/js/app.js'
    ])


    {{-- prod --}}
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-8065914e.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/app-71455456.css') }}"> --}}

    {{-- welcome --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/welcome/css/style.css') }}">
	<script src="https://unpkg.com/animejs@3.0.1/lib/anime.min.js"></script>
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script> --}}

    {{-- custom --}}
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    @livewireStyles
</head>
<body>
    <div id="loader" class="center"></div>
    <div id="apps">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h1 class="brandname">{{ config('app.name', 'Laravel') }}</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else

                            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a></li>

                                {{-- hidden --}}

                            <li class="nav-item hidden-menus">
                                <h3 class="nav-link" v-pre>
                                    Customers
                                </h3>
                                <ul class="">
                                    <a href="{{ url('/customers') }}" class="nav-link">
                                        <li class="nav-link">Customer Overview</li>
                                    </a>
                                    <a href="{{ url('/customertypes') }}" class="nav-link">
                                        <li class="nav-link">Customer Types</li>
                                    </a>
                                </ul>
                            </li>

                            <li class="nav-link hidden-menus">
                                <h3 class="nav-link" v-pre>
                                    Products
                                </h3>
                                <ul class="product-dropdown-items">
                                    <a href="{{ url('/products') }}" class="nav-link">
                                        <li class="nav-link">Product Overview</li>
                                    </a>
                                    <a href="{{ url('/productins') }}" class="nav-link">
                                        <li class="nav-link">Product Ins</li>
                                    </a>
                                    <a href="{{ url('/productouts') }}" class="nav-link">
                                        <li class="nav-link">Product Outs</li>
                                    </a>
                                    <a href="{{ url('/productcategories') }}" class="nav-link">
                                        <li class="nav-link">Product Categories</li>
                                    </a>
                                    <a href="{{ url('/productfailures') }}" class="nav-link">
                                        <li class="nav-link">Product Failures</li>
                                    </a>
                                </ul>
                            </li>

                            <li class="nav-link hidden-menus">
                                <a href="{{ url('/suppliers') }}" class="nav-link">
                                    <h3 class="nav-link">
                                        Suppliers
                                    </h3>
                                </a>
                            </li>

                            <li class="nav-link hidden-menus">
                                <h3 class="nav-link" v-pre>
                                    Customers
                                </h3>
                                <ul class="customers-dropdown-items">
                                    <a href="{{ url('/customers') }}" class="nav-link">
                                        <li class="nav-link">Customer Overview</li>
                                    </a>
                                    <a href="{{ url('/customertypes') }}" class="nav-link">
                                        <li class="nav-link">Customer Types</li>
                                    </a>
                                </ul>
                            </li>

                            @if (Auth::user()->role == 1)
                                <li class="nav-link hidden-menus">
                                    <h3 class="nav-link" v-pre>
                                        Staffs
                                    </h3>
                                    <ul class="staffs-dropdown-items">
                                        <a href="{{ url('/staffs') }}" class="nav-link">
                                            <li class="nav-link">Staff Overview</li>
                                        </a>
                                        <a href="{{ url('/staffroles') }}" class="nav-link">
                                            <li class="nav-link">Staff Roles</li>
                                        </a>
                                    </ul>
                                </li>
                                <li class="nav-link hidden-menus">
                                    <h3 class="nav-link" v-pre>
                                        Discounts
                                    </h3>
                                    <ul class="">
                                        <a href="{{ url('/discounted') }}" class="nav-link">
                                            <li class="nav-link"><h5><i class="fa fa-circle" style="font-size: 10px"></i> Discounted Customers</h5></li>
                                        </a>
                                    </ul>
                                </li>
                            @endif

                            {{-- end hidden --}}

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }} as  {{ Auth::user()->firstname }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
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
    <script src="{{ asset('assets/MDB-Free_4.20.0/js/addons/datatables-select.min.js') }}"></script>
    <script src="{{ asset('assets/MDB-Free_4.20.0/js/addons/datatables-select2.min.js') }}"></script>
    <script src="{{ asset('assets/MDB-Free_4.20.0/js/addons/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/MDB-Free_4.20.0/js/addons/datatables2.min.js') }}"></script>
    <script src="{{ asset('assets/MDB-Free_4.20.0/js/addons/directives.min.js') }}"></script>
    <script src="{{ asset('assets/MDB-Free_4.20.0/js/addons/flag.min.js') }}"></script>
    <script src="{{ asset('assets/MDB-Free_4.20.0/js/addons/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/MDB-Free_4.20.0/js/addons/jquery.zmd.hierarchical-display.min.js') }}"></script>
    <script src="{{ asset('assets/MDB-Free_4.20.0/js/addons/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/MDB-Free_4.20.0/js/addons/rating.min.js') }}"></script>

    <script src="{{ asset('assets/js/mdb.js') }}"></script>

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

        $(document).ready(function(){
            $(".search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".search_div").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

    {{-- welcome --}}
    {{-- <script src="{{ asset('assets/welcome/js/main.min.js') }}"></script> --}}

    {{-- custom --}}
    <script src="{{ asset('assets/js/script.js') }}"></script>

    {{-- end theme --}}

    @livewireScripts
</body>
</html>
