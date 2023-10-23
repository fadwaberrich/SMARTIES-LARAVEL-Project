<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from freshcart.codescandy.com/dashboard/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2023 15:49:35 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta content="Codescandy" name="author">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-M8S4MT3EYG');
    </script>

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ Vite::asset('resources/assets/images/favicon/favicon.ico') }}">

    <!-- Libs CSS -->
    @vite(['resources/assets/libs/bootstrap-icons/font/bootstrap-icons.css'])
    @vite(['resources/assets/libs/feather-webfont/dist/feather-icons.css'])
    @vite(['resources/assets/libs/simplebar/dist/simplebar.min.css'])

    <!-- Theme CSS -->
    @vite(['resources/assets/css/theme.min.css'])


    <title>Dashboard</title>
</head>

<body>
    <!-- nav -->

    <nav class="navbar navbar-expand-lg navbar-glass">
    </nav>


    <div class="main-wrapper">
        <nav class="navbar-vertical-nav d-none d-xl-block ">
            <div class="navbar-vertical">
                <div class="px-4 py-5">
                    <a href="../index.html" class="navbar-brand">
                        <img src="{{ Vite::asset('resources/assets/images/logo/freshcart-logo.svg') }}" alt="">
                    </a>
                </div>
                <div class="navbar-vertical-content flex-grow-1" data-simplebar="">
                    <ul class="navbar-nav flex-column" id="sideNavbar">

                        <li class="nav-item ">
                            <a class="nav-link  active " href="index.html">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-house"></i></span>
                                    <span class="nav-link-text">Dashboard</span>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.index') }}">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-cart"></i></span>
                                    <span class="nav-link-text">Products</span>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link " href="{{ route('showCategory') }}">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-list-task"></i></span>
                                    <span class="nav-link-text">Categories</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link   collapsed " href="{{ route('Back') }}" data-bs-toggle="collapse"
                                data-bs-target="#navCategoriesOrders" aria-expanded="false"
                                aria-controls="navCategoriesOrders">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-bag"></i></span>
                                    <span class="nav-link-text">Annonces</span>
                                </div>
                            </a>
                            <div id="navCategoriesOrders" class="collapse "b data-bs-parent="#sideNavbar">
                                <ul class="nav flex-column">
                                    <li class="nav-item ">
                                        <a class="nav-link " href="order-list.html">
                                            List
                                        </a>
                                    </li>
                                    <!-- Nav item -->
                                    <li class="nav-item ">
                                        <a class="nav-link " href="order-single.html">
                                            Single

                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="{{ route('venuess.index') }}">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-globe"></i></span>
                                    <span class="nav-link-text">Venues</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="{{ route('events.index') }}">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">Events</span>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link "  href="{{ route('users.index') }}">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">Users</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('review-ratings.index') }}">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-star"></i></span>
                                    <span class="nav-link-text">Reviews</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="{{ route('forms.index') }}">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-list-task"></i></span>
                                    <span class="nav-link-text">Exchanged Forms</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
    <a class="nav-link" href="{{ route('reports.store') }}">
        <div class="d-flex align-items-center">
            <span class="nav-link-icon"><i class="bi bi-list-task"></i></span>
            <span class="nav-link-text">Reports</span>
        </div>
    </a>
</li>

                        <!-- Nav item -->




                    </ul>
                </div>
            </div>
        </nav>
        <main class="p-10">
            @yield('content')
        </main>
    </div>
    </div>

    <!-- Libs JS -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.min.js"></script>

    <!-- Theme JS -->
    <script src="../assets/js/theme.min.js"></script>
    <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../assets/js/vendors/chart.js"></script>

</body>



</html>
