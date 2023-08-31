@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12 sidebar">
            <ul>
                <li class="nav-link">
                    <a href="{{ url('/dashboard') }}" class="nav-link">
                        <h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                <g clip-path="url(#clip0_2_7)">
                                <path d="M10.8973 0H2.28422C1.02473 0 0.000183105 1.02454 0.000183105 2.28403V10.8971C0.000183105 12.1566 1.02473 13.1812 2.28422 13.1812H10.8973C12.1568 13.1812 13.1813 12.1566 13.1813 10.8971V2.28403C13.1811 1.02454 12.1568 0 10.8973 0Z" fill="black"/>
                                <path d="M27.7159 0H19.1028C17.8433 0 16.8187 1.02454 16.8187 2.28403V10.8971C16.8187 12.1566 17.8433 13.1812 19.1028 13.1812H27.7159C28.9754 13.1812 29.9999 12.1566 29.9999 10.8971V2.28403C29.9999 1.02454 28.9754 0 27.7159 0Z" fill="black"/>
                                <path d="M10.8973 16.8188H2.28415C1.02466 16.8188 0.00012207 17.8433 0.00012207 19.1028V27.7159C0.00012207 28.9754 1.02466 29.9999 2.28415 29.9999H10.8973C12.1567 29.9999 13.1813 28.9754 13.1813 27.7159V19.1028C13.1811 17.8433 12.1567 16.8188 10.8973 16.8188Z" fill="black"/>
                                <path d="M27.7159 16.8188H19.1028C17.8433 16.8188 16.8187 17.8434 16.8187 19.1029V27.716C16.8187 28.9755 17.8433 30 19.1028 30H27.7159C28.9754 29.9999 29.9999 28.9754 29.9999 27.7159V19.1028C29.9999 17.8433 28.9754 16.8188 27.7159 16.8188Z" fill="black"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_2_7">
                                <rect width="30" height="30" fill="white"/>
                                </clipPath>
                                </defs>
                            </svg>
                            Dashboard
                        </h3>
                    </a>
                </li>
                <li class="nav-link product-dropdown">
                    <h3 class="dropdown-toggle" v-pre>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                            <g clip-path="url(#clip0_72_9)">
                            <path d="M9.91931 15.8788H20.4661C20.9521 15.8788 21.345 15.4856 21.345 14.9999V4.39451C21.345 3.90883 20.9521 3.51561 20.4661 3.51561H17.8294V2.63671C17.8294 1.18286 16.6466 0 15.1927 0C13.7389 0 12.556 1.18286 12.556 2.63671V3.51561H9.91931C9.43362 3.51561 9.04041 3.90883 9.04041 4.39451V14.9999C9.04041 15.4856 9.43362 15.8788 9.91931 15.8788ZM14.3138 2.63671C14.3138 2.15171 14.7086 1.75781 15.1927 1.75781C15.6768 1.75781 16.0716 2.15171 16.0716 2.63671V3.51561H14.3138V2.63671Z" fill="black"/>
                            <path d="M27.997 14.5449C27.8391 14.2824 27.5523 14.121 27.2451 14.121C25.6965 14.121 24.2759 14.9805 23.557 16.3522L20.861 21.4974C20.4027 22.3695 19.5083 22.9101 18.5248 22.9101H12.556C12.0703 22.9101 11.6771 22.5169 11.6771 22.0312C11.6771 21.5455 12.0703 21.1523 12.556 21.1523H18.5245C18.8525 21.1523 19.1512 20.9721 19.3041 20.681C19.4563 20.3903 19.9161 19.5126 20.3114 18.7582C20.4359 18.5206 20.4272 18.2352 20.2883 18.0056C20.1491 17.7763 19.9004 17.6367 19.6321 17.6367H10.4961C9.32193 17.6367 8.21987 18.0942 7.38903 18.9241L2.19115 24.122C1.84782 24.4653 1.84782 25.0215 2.19115 25.3648L6.58566 29.7424C6.75732 29.9141 6.98231 30.0001 7.20707 30.0001C7.43183 30.0001 7.65682 29.9141 7.82848 29.7424L11.1621 26.4257H18.5245C20.8198 26.4257 22.9088 25.1623 23.9749 23.1289L28.0226 15.4085C28.1668 15.1364 28.1565 14.8086 27.997 14.5449Z" fill="black"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_72_9">
                            <rect width="30" height="30" fill="white"/>
                            </clipPath>
                            </defs>
                        </svg>
                        Products
                    </h3>
                    <ul class="product-dropdown-items">
                        <a href="{{ url('/products') }}" class="nav-link">
                            <li class="nav-link"><h5><i class="fa fa-circle" style="font-size: 10px"></i> Product Overview <sup class="badge rounded-pill text-bg-info" style="font-size: 10px">{{ App\Models\Products::count() }}</sup></h5></li>
                        </a>
                        <a href="{{ url('/productins') }}" class="nav-link">
                            <li class="nav-link"><h5><i class="fa fa-circle" style="font-size: 10px"></i> Product Ins <sup class="badge rounded-pill text-bg-info" style="font-size: 10px">{{ App\Models\ProductIns::count() }}</sup></h5></li>
                        </a>
                        <a href="{{ url('/productouts') }}" class="nav-link">
                            <li class="nav-link"><h5><i class="fa fa-circle" style="font-size: 10px"></i> Product Outs <sup class="badge rounded-pill text-bg-info" style="font-size: 10px">{{ App\Models\ProductOuts::count() }}</sup></h5></li>
                        </a>
                        <a href="{{ url('/productcategories') }}" class="nav-link">
                            <li class="nav-link"><h5><i class="fa fa-circle" style="font-size: 10px"></i> Product Categories <sup class="badge rounded-pill text-bg-info" style="font-size: 10px">{{ App\Models\ProductCategory::count() }}</sup></h5></li>
                        </a>
                        <a href="{{ url('/productfailures') }}" class="nav-link active">
                            <li class="nav-link"><h5><i class="fa fa-circle" style="font-size: 10px"></i> Product Failures <sup class="badge rounded-pill text-bg-info" style="font-size: 10px">{{ App\Models\ProductFailure::count() }}</sup></h5></li>
                        </a>
                    </ul>
                </li>
                <li class="nav-link">
                    <a href="{{ url('/suppliers') }}" class="nav-link">
                        <h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                <path d="M9.37501 18.922C7.91905 18.922 6.73914 20.1015 6.73914 21.5576C6.73914 23.0138 7.91905 24.1933 9.37501 24.1933C10.8315 24.1933 12.0111 23.0138 12.0111 21.5576C12.0111 20.1015 10.8315 18.922 9.37501 18.922ZM9.37501 22.7035C8.7421 22.7035 8.22924 22.1905 8.22924 21.5576C8.22924 20.9244 8.7421 20.4118 9.37501 20.4118C10.008 20.4118 10.5212 20.9244 10.5212 21.5576C10.5212 22.1905 10.008 22.7035 9.37501 22.7035Z" fill="black"/>
                                <path d="M23.2744 18.922C21.8185 18.922 20.6386 20.1015 20.6386 21.5576C20.6386 23.0138 21.8185 24.1933 23.2744 24.1933C24.731 24.1933 25.9105 23.0138 25.9105 21.5576C25.9105 20.1015 24.731 18.922 23.2744 18.922ZM23.2744 22.7035C22.6415 22.7035 22.1287 22.1905 22.1287 21.5576C22.1287 20.9244 22.6415 20.4118 23.2744 20.4118C23.9075 20.4118 24.4207 20.9244 24.4207 21.5576C24.4207 22.1905 23.9075 22.7035 23.2744 22.7035Z" fill="black"/>
                                <path d="M12.3404 10.8234C12.3404 11.1927 12.0382 11.4949 11.6689 11.4949H2.40268C2.03334 11.4949 1.73126 11.1927 1.73126 10.8234V10.4205C1.73126 10.0512 2.03341 9.74908 2.40268 9.74908H11.6689C12.0383 9.74908 12.3404 10.0512 12.3404 10.4205V10.8234Z" fill="black"/>
                                <path d="M28.4394 14.7547C27.473 14.5035 26.9199 14.3455 26.5404 13.6126L25.2714 11.0432C24.8917 10.3103 23.9057 9.71058 23.0805 9.71058H21.3448C21.3448 9.71058 21.1113 9.71545 21.1113 9.48048C21.1113 8.94175 21.1113 7.3256 21.1113 7.3256C21.1113 6.49024 20.6386 5.80673 19.633 5.80673H5.48731C4.04765 5.80673 3.36414 6.49032 3.36414 7.3256V8.67603C3.36414 8.67603 3.36414 9.07767 3.75287 9.07767C5.73186 9.07767 11.6689 9.07767 11.6689 9.07767C12.4094 9.07767 13.0119 9.68005 13.0119 10.4206V10.8235C13.0119 11.564 12.4094 12.1664 11.6689 12.1664H3.75287C3.75287 12.1664 3.36414 12.1341 3.36414 12.5537C3.36414 12.7621 3.36414 12.902 3.36414 13.0181C3.36414 13.3874 3.87035 13.3872 3.87035 13.3872H9.19904C9.93956 13.3872 10.542 13.9897 10.542 14.7301V15.133C10.542 15.8735 9.93956 16.4759 9.19904 16.4759H3.95443C3.95443 16.4759 3.36414 16.465 3.36414 16.935C3.36414 17.7508 3.36414 20.1981 3.36414 20.1981C3.36414 21.0334 4.04765 21.717 4.883 21.717C4.883 21.717 5.51223 21.717 5.72198 21.717C5.91225 21.717 5.94028 21.611 5.94028 21.5578C5.94028 19.6639 7.4812 18.1234 9.37508 18.1234C11.2691 18.1234 12.81 19.6641 12.81 21.5578C12.81 21.6112 12.7948 21.717 12.9403 21.717C14.6033 21.717 19.7109 21.717 19.7109 21.717C19.8451 21.717 19.8397 21.6039 19.8397 21.5578C19.8397 19.6639 21.3805 18.1234 23.2745 18.1234C25.1684 18.1234 26.7093 19.6641 26.7093 21.5578C26.7093 21.6112 26.708 21.717 26.792 21.717C27.5545 21.717 28.499 21.717 28.499 21.717C29.3246 21.717 29.9999 21.0417 29.9999 20.2161V17.3647C30 14.9633 29.2418 14.9633 28.4394 14.7547ZM25.5834 14.6212C25.5834 14.6212 22.396 14.6212 21.3112 14.6212C21.1347 14.6212 21.1113 14.4494 21.1113 14.4494V10.8906C21.1113 10.8906 21.1013 10.7539 21.3279 10.7539C21.6327 10.7539 22.5469 10.7539 22.5469 10.7539C23.2814 10.7539 24.1587 11.2876 24.4964 11.9397L25.6257 14.226C25.6733 14.318 25.7241 14.3997 25.7785 14.4729C25.8186 14.5266 25.7514 14.6212 25.5834 14.6212Z" fill="black"/>
                                <path d="M9.87047 15.133C9.87047 15.5023 9.56832 15.8045 9.19906 15.8045H0.671415C0.302078 15.8045 0 15.5023 0 15.133V14.7301C0 14.3609 0.302151 14.0587 0.671415 14.0587H9.19906C9.56839 14.0587 9.87047 14.3609 9.87047 14.7301V15.133Z" fill="black"/>
                            </svg>
                            Suppliers <sup class="badge rounded-pill text-bg-primary" style="font-size: 10px">{{ App\Models\Suppliers::count() }}</sup>
                        </h3>
                    </a>
                </li>
                <li class="nav-link customers-dropdown">
                    <h3 class="dropdown-toggle" v-pre>
                        <svg xmlns="http://www.w3.org/2000/svg" width="29" height="30" viewBox="0 0 29 30" fill="none">
                            <path d="M24.8137 16.0149H22.571C22.7996 16.6623 22.9245 17.3611 22.9245 18.0893V26.8579C22.9245 27.1615 22.8734 27.453 22.7804 27.724H26.4882C27.8732 27.724 29 26.5584 29 25.1256V20.3455C29 17.9576 27.1221 16.0149 24.8137 16.0149Z" fill="black"/>
                            <path d="M6.07557 18.0894C6.07557 17.3611 6.20046 16.6624 6.42906 16.0149H4.18632C1.87798 16.0149 0 17.9577 0 20.3456V25.1258C0 26.5585 1.12675 27.7242 2.51179 27.7242H6.21961C6.12666 27.453 6.07557 27.1616 6.07557 26.858V18.0894Z" fill="black"/>
                            <path d="M17.0637 13.7587H11.9364C9.6281 13.7587 7.75012 15.7015 7.75012 18.0894V26.858C7.75012 27.3363 8.12497 27.7241 8.58739 27.7241H20.4127C20.8751 27.7241 21.25 27.3363 21.25 26.858V18.0894C21.25 15.7015 19.372 13.7587 17.0637 13.7587Z" fill="black"/>
                            <path d="M14.5 2.27579C11.7239 2.27579 9.46545 4.61216 9.46545 7.48402C9.46545 9.43197 10.5048 11.1332 12.0396 12.0265C12.7676 12.4501 13.6069 12.6922 14.5 12.6922C15.3931 12.6922 16.2324 12.4501 16.9604 12.0265C18.4953 11.1332 19.5346 9.43191 19.5346 7.48402C19.5346 4.61222 17.2761 2.27579 14.5 2.27579Z" fill="black"/>
                            <path d="M5.65942 7.13023C3.58325 7.13023 1.89423 8.8775 1.89423 11.0253C1.89423 13.173 3.58325 14.9203 5.65942 14.9203C6.18606 14.9203 6.68756 14.8074 7.14312 14.6046C7.93077 14.2538 8.58021 13.6328 8.98208 12.855C9.26415 12.309 9.42461 11.6863 9.42461 11.0253C9.42461 8.87756 7.73559 7.13023 5.65942 7.13023Z" fill="black"/>
                            <path d="M23.3406 7.13023C21.2645 7.13023 19.5754 8.8775 19.5754 11.0253C19.5754 11.6863 19.7359 12.3091 20.018 12.855C20.4198 13.6329 21.0693 14.2538 21.8569 14.6046C22.3125 14.8074 22.814 14.9203 23.3406 14.9203C25.4168 14.9203 27.1058 13.173 27.1058 11.0253C27.1058 8.8775 25.4168 7.13023 23.3406 7.13023Z" fill="black"/>
                        </svg>
                        Customers
                    </h3>
                    <ul class="customers-dropdown-items">
                        <a href="{{ url('/customers') }}" class="nav-link">
                            <li class="nav-link"><h5><i class="fa fa-circle" style="font-size: 10px"></i> Customer Overview <sup class="badge rounded-pill text-bg-warning" style="font-size: 10px">{{ App\Models\Customers::count() }}</sup></h5></li>
                        </a>
                        <a href="{{ url('/customertypes') }}" class="nav-link">
                            <li class="nav-link"><h5><i class="fa fa-circle" style="font-size: 10px"></i> Customer Types <sup class="badge rounded-pill text-bg-warning" style="font-size: 10px">{{ App\Models\CustomerType::count() }}</sup></h5></li>
                        </a>
                    </ul>
                </li>
                @if (Auth::user()->role == 1)
                    <li class="nav-link staff-dropdown">
                        <h3 class="dropdown-toggle" v-pre>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                <path d="M28.1649 18.7285V16.835H19.4362C19.4362 19.2851 17.4501 21.2713 15 21.2713C12.5499 21.2713 10.5637 19.2851 10.5637 16.835H1.83502V18.7285L5.62533 19.1299C5.86176 20.099 6.24455 21.0108 6.74899 21.8405L4.35203 24.8052L7.02983 27.483L9.9945 25.086C10.8242 25.5905 11.736 25.9733 12.7052 26.2097L13.1065 30H16.8934L17.2948 26.2097C18.264 25.9733 19.1758 25.5905 20.0055 25.086L22.9701 27.483L25.6479 24.8052L23.251 21.8405C23.7554 21.0108 24.1382 20.099 24.3746 19.1299L28.1649 18.7285Z" fill="black"/>
                                <path d="M15 0C13.125 0 11.5996 1.52543 11.5996 3.40037C11.5996 5.27531 13.125 6.80068 15 6.80068C16.8749 6.80068 18.4004 5.27531 18.4004 3.40037C18.4004 1.52543 16.8749 0 15 0Z" fill="black"/>
                                <path d="M18.6203 7.74076H11.3797C9.71272 7.74082 8.35657 9.09691 8.35657 10.7638V15.0772H21.6434V10.7638C21.6434 9.09691 20.2872 7.74076 18.6203 7.74076Z" fill="black"/>
                                <path d="M7.78635 1.57078C6.1067 1.57078 4.74023 2.93731 4.74023 4.6169C4.74023 6.28301 6.08502 7.64022 7.74609 7.66195C8.43398 6.85735 9.38314 6.28307 10.4615 6.07242C10.6979 5.63971 10.8325 5.14377 10.8325 4.6169C10.8325 2.93725 9.466 1.57078 7.78635 1.57078Z" fill="black"/>
                                <path d="M4.54317 8.50512C3.0499 8.50512 1.83502 9.71994 1.83502 11.2133V15.0772H6.59875V10.7638C6.59875 9.94735 6.80489 9.17819 7.16729 8.50512H4.54317Z" fill="black"/>
                                <path d="M22.2137 1.57078C20.534 1.57078 19.1675 2.93731 19.1675 4.6169C19.1675 5.14371 19.3021 5.63971 19.5384 6.07242C20.6169 6.28307 21.566 6.85735 22.2539 7.66195C23.915 7.64028 25.2598 6.28301 25.2598 4.6169C25.2598 2.93725 23.8933 1.57078 22.2137 1.57078Z" fill="black"/>
                                <path d="M25.4568 8.50512H22.8327C23.1951 9.17819 23.4012 9.94735 23.4012 10.7638V15.0772H28.165V11.2132C28.165 9.71994 26.9501 8.50512 25.4568 8.50512Z" fill="black"/>
                            </svg>
                            Staffs
                        </h3>
                        <ul class="staffs-dropdown-items">
                            <a href="{{ url('/staffs') }}" class="nav-link">
                                <li class="nav-link"><h5><i class="fa fa-circle" style="font-size: 10px"></i> Staff Overview <sup class="badge rounded-pill text-bg-success" style="font-size: 10px">{{ App\Models\User::count() }}</sup></h5></li>
                            </a>
                            <a href="{{ url('/staffroles') }}" class="nav-link">
                                <li class="nav-link"><h5><i class="fa fa-circle" style="font-size: 10px"></i> Staff Roles <sup class="badge rounded-pill text-bg-success" style="font-size: 10px">{{ App\Models\Role::count() }}</sup></h5></li>
                            </a>
                        </ul>
                    </li>
                    <li class="nav-link">
                        <h3 class="dropdown-toggle" v-pre>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                <g clip-path="url(#clip0_72_9)">
                                <path d="M9.91931 15.8788H20.4661C20.9521 15.8788 21.345 15.4856 21.345 14.9999V4.39451C21.345 3.90883 20.9521 3.51561 20.4661 3.51561H17.8294V2.63671C17.8294 1.18286 16.6466 0 15.1927 0C13.7389 0 12.556 1.18286 12.556 2.63671V3.51561H9.91931C9.43362 3.51561 9.04041 3.90883 9.04041 4.39451V14.9999C9.04041 15.4856 9.43362 15.8788 9.91931 15.8788ZM14.3138 2.63671C14.3138 2.15171 14.7086 1.75781 15.1927 1.75781C15.6768 1.75781 16.0716 2.15171 16.0716 2.63671V3.51561H14.3138V2.63671Z" fill="black"/>
                                <path d="M27.997 14.5449C27.8391 14.2824 27.5523 14.121 27.2451 14.121C25.6965 14.121 24.2759 14.9805 23.557 16.3522L20.861 21.4974C20.4027 22.3695 19.5083 22.9101 18.5248 22.9101H12.556C12.0703 22.9101 11.6771 22.5169 11.6771 22.0312C11.6771 21.5455 12.0703 21.1523 12.556 21.1523H18.5245C18.8525 21.1523 19.1512 20.9721 19.3041 20.681C19.4563 20.3903 19.9161 19.5126 20.3114 18.7582C20.4359 18.5206 20.4272 18.2352 20.2883 18.0056C20.1491 17.7763 19.9004 17.6367 19.6321 17.6367H10.4961C9.32193 17.6367 8.21987 18.0942 7.38903 18.9241L2.19115 24.122C1.84782 24.4653 1.84782 25.0215 2.19115 25.3648L6.58566 29.7424C6.75732 29.9141 6.98231 30.0001 7.20707 30.0001C7.43183 30.0001 7.65682 29.9141 7.82848 29.7424L11.1621 26.4257H18.5245C20.8198 26.4257 22.9088 25.1623 23.9749 23.1289L28.0226 15.4085C28.1668 15.1364 28.1565 14.8086 27.997 14.5449Z" fill="black"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_72_9">
                                <rect width="30" height="30" fill="white"/>
                                </clipPath>
                                </defs>
                            </svg>
                            Discounts <sup class="badge rounded-pill text-bg-danger" style="font-size: 10px">new</sup>
                        </h3>
                        <ul class="">
                            <a href="{{ url('/discounted') }}" class="nav-link">
                                <li class="nav-link"><h5><i class="fa fa-circle" style="font-size: 10px"></i> Discounted Customers</h5></li>
                            </a>
                            {{-- <a href="{{ url('/staffs') }}" class="nav-link">
                                <li class="nav-link"><h5><i class="fa fa-circle" style="font-size: 10px"></i> Vouchers <sup class="badge rounded-pill text-bg-danger" style="font-size: 10px">23</sup></h5></li>
                            </a> --}}
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-12 main">
            <div class="container-fluid">
                <h1 class="page-title-h1">Product Failures (Damaged/Bad Orders)</h1>

                <div class="main-box">
                    <div class="table-heading">

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 search-box">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon1"><p><i class="fa fa-search"></i></p></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Search..." aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 buttons">
                                <button class="btn btn-white">
                                    Export
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <g clip-path="url(#clip0_79_372)">
                                        <path d="M19.3554 2.30768H12.3077V4.60306H14.6392V6.16537H12.3077V7.69229H14.6154V9.23076H12.3077V10.7692H14.6154V12.3077H12.3077V13.8461H14.6154V15.3846H12.3077V17.6923H19.3554C19.71 17.6923 20 17.3915 20 17.0231V2.97691C20 2.60845 19.71 2.30768 19.3554 2.30768ZM18.4615 15.3846H15.3846V13.8461H18.4615V15.3846ZM18.4615 12.3077H15.3846V10.7692H18.4615V12.3077ZM18.4615 9.23076H15.3846V7.69229H18.4615V9.23076ZM18.4615 6.15383H15.3846V4.61537H18.4615V6.15383Z" fill="#030104"/>
                                        <path d="M0 2.22231V17.7785L11.5385 20V0L0 2.22231ZM7.29846 13.9077L5.95615 11.37C5.90538 11.2754 5.85308 11.1015 5.79846 10.8485H5.77769C5.75231 10.9677 5.69231 11.1492 5.59769 11.3923L4.25077 13.9077H2.15923L4.64231 10.0123L2.37077 6.11615H4.50615L5.62 8.45231C5.70692 8.63692 5.78462 8.85615 5.85385 9.10923H5.87538C5.91923 8.95692 6.00077 8.73077 6.12 8.43L7.35846 6.11538H9.31385L6.97769 9.97846L9.37923 13.9069L7.29846 13.9077Z" fill="#030104"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_79_372">
                                        <rect width="20" height="20" fill="white"/>
                                        </clipPath>
                                        </defs>
                                    </svg>
                                </button>

                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                  <th scope="col">
                                    <input type="checkbox" name="" id="">
                                  </th>
                                  <th scope="col">Image</th>
                                  <th scope="col">Bar Code</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Category</th>
                                  <th scope="col">Quantity</th>
                                  <th scope="col">Price per Item</th>
                                  <th scope="col">Total Price</th>
                                  <th scope="col">Reason</th>
                                  <th scope="col">Date & Time</th>
                                  <th scope="col">Staff</th>
                                  <th scope="col">Role</th>
                              </thead>
                              <tbody>
                                {{-- product failures --}}
                                    @foreach ($productFailures as $productFailure)
                                        @if (App\Models\Products::where('id', $productFailure->productId)->count() != 0)
                                            <tr>
                                                <th scope="row">
                                                    <input type="checkbox" name="" id="">
                                                </th>

                                                {{-- query product details --}}

                                                @foreach ($products as $product)
                                                    @if ($productFailure->productId == $product->id)
                                                        <td scope="col">
                                                            <img src="{{ url('assets/images/uploads/'.$product->productImage) }}" alt="">
                                                        </td>
                                                        <td scope="col">{{ $product->productBarCode }}</td>
                                                        <td scope="col">{{ $product->productName }}</td>
                                                        {{-- query product category --}}
                                                        @if (App\Models\ProductCategory::where('id', $productFailure->productCategoryId))
                                                            @foreach ($productCategories as $productCategory)
                                                                @if ($productCategory->id == $product->productCategoryId)
                                                                    <td scope="col">{{ $productCategory->categoryName }}</td>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <td class="text-danger">(category is deleted or removed)</td>
                                                        @endif
                                                        {{-- end queyr product category --}}
                                                        <td scope="col"><b class="font-weight-bold text-danger">{{ $productFailure->quantity }}</b></td>
                                                        <td scope="col"><b class="font-weight-bold text-primary">₱ {{ $product->productPrice }}</b></td>
                                                        <td scope="col"><b class="font-weight-bold text-success">₱ {{ $productFailure->quantity * $product->productPrice }}</b></td>
                                                    @endif
                                                @endforeach

                                                {{-- end query product details --}}

                                                <td scope="col">{{ $productFailure->reason }}</td>
                                                <td scope="col">{{ $productFailure->created_at->format(' d M Y H:i:s') }} ({{ $productFailure->created_at->diffForHumans() }})</td>

                                                {{-- query users --}}

                                                @if (App\Models\User::where('id', $productFailure->userId)->count() != 0)
                                                    @foreach ($users as $user)
                                                        @if ($productFailure->userId  == $user->id)
                                                            <td scope="col">{{ $user->lastname }}, {{ $user->firstname }}</td>

                                                            {{-- query user role --}}
                                                            @if (App\Models\Role::where('id', $user->role)->count() !=0)
                                                                @foreach ($roles as $role)
                                                                    @if ($user->role == $role->id)
                                                                        <td scope="col">{{ $role->roleName }}</td>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <td class="text-danger">(role is deleted or removed)</td>
                                                            @endif
                                                            {{-- end query user role --}}
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <td class="text-danger">(staff is terminated)</td>
                                                @endif

                                                {{-- end query --}}
                                            </tr>
                                        @endif
                                    @endforeach
                                {{-- end product failures --}}
                              </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
