<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from freshcart.codescandy.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2023 15:48:09 GMT -->

<head>

    <title>Barter Project</title>
    @vite(['resources/assets/libs/slick-carousel/slick/slick.css'])
    @vite(['resources/assets/libs/slick-carousel/slick/slick-theme.css'])
    @vite(['resources/assets/libs/tiny-slider/dist/tiny-slider.css'])
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
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon/favicon.ico">


    <!-- Libs CSS -->
    @vite('resources/assets/libs/bootstrap-icons/font/bootstrap-icons.css')
    @vite('resources/assets/libs/feather-webfont/dist/feather-icons.css')
    @vite('resources/assets/libs/simplebar/dist/simplebar.min.css')



    <!-- Theme CSS -->
    @vite('resources/assets/css/theme.min.css')

</head>

<body>

    <div class="border-bottom ">

        <div class="py-4 pt-lg-3 pb-lg-0">
            <div class="container">
                <div class="row w-100 align-items-center gx-lg-2 gx-0">
                    <div class="col-xxl-2 col-lg-3">
                        <a class="navbar-brand d-none d-lg-block" href="index.html">
                            <img src="https://static-00.iconduck.com/assets.00/barter-icon-512x133-qgmlsfxt.png"
                                class="img-fluid " style="height:30px;" class="avatar avatar-sm me-3">

                        </a>
                        <div class="d-flex justify-content-between w-100 d-lg-none">
                            <a class="navbar-brand" href="index.html">
                                <img src="https://static-00.iconduck.com/assets.00/barter-icon-512x133-qgmlsfxt.png"
                                    style="height:30px;" alt="eCommerce HTML Template">

                            </a>

                            <div class="d-flex align-items-center lh-1">

                                <div class="list-inline me-4">
                                    <div class="list-inline-item">

                                        <a href="#!" class="text-muted" data-bs-toggle="modal"
                                            data-bs-target="#userModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-user">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="list-inline-item">

                                        <a class="text-muted position-relative " data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvasRight" href="#offcanvasExample" role="button"
                                            aria-controls="offcanvasRight">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-shopping-bag">
                                                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                                <line x1="3" y1="6" x2="21" y2="6">
                                                </line>
                                                <path d="M16 10a4 4 0 0 1-8 0"></path>
                                            </svg>
                                            <span
                                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                                1
                                                <span class="visually-hidden">unread messages</span>
                                            </span>
                                        </a>
                                    </div>

                                </div>
                                <!-- Button -->
                                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#navbar-default" aria-controls="navbar-default"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        fill="currentColor" class="bi bi-text-indent-left text-primary"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm.646 2.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L4.293 8 2.646 6.354a.5.5 0 0 1 0-.708zM7 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                                    </svg>
                                </button>

                            </div>
                        </div>

                    </div>

                    <div class="col-xxl-6 col-lg-5 d-none d-lg-block">
                        <form action="#">
                            <div class="input-group ">
                                <input class="form-control rounded" type="search" placeholder="Search for products">
                                <span class="input-group-append">
                                    <button class="btn bg-white border border-start-0 ms-n10 rounded-0 rounded-end"
                                        type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-search">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65">
                                            </line>
                                        </svg>
                                    </button>
                                </span>
                            </div>

                          </form>
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                      <x-dropdown align="right" width="48">
                          <x-slot name="trigger">
                              <button
                                  class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                  <div>{{ Auth::user()->name }}</div>

                                  <div class="ml-1">
                                      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                          viewBox="0 0 20 20">
                                          <path fill-rule="evenodd"
                                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd" />
                                      </svg>
                                  </div>
                              </button>
                          </x-slot>

                          <x-slot name="content">
                              <x-dropdown-link :href="route('profile.edit')">
                                  {{ __('Profile') }}
                              </x-dropdown-link>

                              <!-- Authentication -->
                              <form method="POST" action="{{ route('logout') }}">
                                  @csrf

                                  <x-dropdown-link :href="route('logout')"
                                      onclick="event.preventDefault();
                                              this.closest('form').submit();">
                                      {{ __('Log Out') }}
                                  </x-dropdown-link>
                              </form>
                          </x-slot>
                      </x-dropdown>
                  </div>






                </div>
            </div>
        </div>


        <nav class="navbar navbar-expand-lg navbar-light navbar-default py-0 py-lg-4">
            <div class="container px-0 px-md-3">

                <div class="offcanvas offcanvas-start p-4 p-lg-0" id="navbar-default">
                    <div class="d-flex justify-content-between align-items-center mb-2 d-block d-lg-none">
                        <a href="index.html">
                            <img src="{{ Vite::asset('resources/assets/images/logo/freshcart-logo.svg') }}">

                        </a>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>


                    <div class="d-none d-lg-block">
                        <ul class="navbar-nav align-items-center ">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Annonces
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="">Déposer une annonce</a></li>
                                    <li><a class="dropdown-item" href="">Afficher mes annonces</a></li>


                                </ul>
                            </li>



                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Account
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="pages/signin.html">Sign in</a></li>
                                    <li><a class="dropdown-item" href="pages/signup.html">Signup</a></li>
                                    <li><a class="dropdown-item" href="pages/forgot-password.html">Forgot Password</a>
                                    </li>
                                    <li class="dropdown-submenu dropend">
                                        <a class="dropdown-item dropdown-list-group-item dropdown-toggle"
                                            href="#">
                                            My Account
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="pages/account-orders.html">Orders</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="pages/account-settings.html">Settings</a></li>
                                            <li><a class="dropdown-item" href="pages/account-address.html">Address</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="pages/account-payment-method.html">Payment Method</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="pages/account-notification.html">Notification</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="">
                                    Dashboard
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="d-block d-lg-none h-100" data-simplebar="">
                        <ul class="navbar-nav ">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Shop
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="pages/shop-grid.html">Shop Grid - Filter</a>
                                    </li>
                                    <li><a class="dropdown-item" href="pages/shop-grid-3-column.html">Shop Grid - 3
                                            column</a>
                                    </li>
                                    <li><a class="dropdown-item" href="pages/shop-list.html">Shop List - Filter</a>
                                    </li>
                                    <li><a class="dropdown-item" href="pages/shop-filter.html">Shop - Filter</a></li>
                                    <li><a class="dropdown-item" href="pages/shop-fullwidth.html">Shop Wide</a></li>
                                    <li><a class="dropdown-item" href="pages/shop-single.html">Shop Single</a></li>
                                    <li><a class="dropdown-item" href="pages/shop-single-2.html">Shop Single v2<span
                                                class="badge bg-light-info text-dark-info ms-1">New</span></a></li>
                                    <li><a class="dropdown-item" href="pages/shop-wishlist.html">Shop Wishlist</a>
                                    </li>
                                    <li><a class="dropdown-item" href="pages/shop-cart.html">Shop Cart</a></li>
                                    <li><a class="dropdown-item" href="pages/shop-checkout.html">Shop Checkout</a>
                                    </li>
                                </ul>
                            </li>



                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Account
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="pages/signin.html">Sign in</a></li>
                                    <li><a class="dropdown-item" href="pages/signup.html">Signup</a></li>
                                    <li><a class="dropdown-item" href="pages/forgot-password.html">Forgot Password</a>
                                    </li>
                                    <li class="dropdown-submenu dropend">
                                        <a class="dropdown-item dropdown-list-group-item dropdown-toggle"
                                            href="#">
                                            My Account
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="pages/account-orders.html">Orders</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="pages/account-settings.html">Settings</a></li>
                                            <li><a class="dropdown-item" href="pages/account-address.html">Address</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="pages/account-payment-method.html">Payment Method</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="pages/account-notification.html">Notification</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="dashboard/index.html">
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item dropdown dropdown-flyout">
                                <a class="nav-link" href="#" id="navbarDropdownDocs2" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Docs
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg" aria-labelledby="navbarDropdownDocs2">
                                    <a class="dropdown-item align-items-start" href="docs/index.html">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="currentColor" class="bi bi-file-text text-primary"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z" />
                                                <path
                                                    d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" />
                                            </svg>
                                        </div>
                                        <div class="ms-3 lh-1">
                                            <h6 class="mb-1">Documentations</h6>
                                            <p class="mb-0 small">
                                                Browse the all documentation
                                            </p>
                                        </div>
                                    </a>
                                    <a class="dropdown-item align-items-start" href="docs/changelog.html">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="currentColor" class="bi bi-layers text-primary"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M8.235 1.559a.5.5 0 0 0-.47 0l-7.5 4a.5.5 0 0 0 0 .882L3.188 8 .264 9.559a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882L12.813 8l2.922-1.559a.5.5 0 0 0 0-.882l-7.5-4zm3.515 7.008L14.438 10 8 13.433 1.562 10 4.25 8.567l3.515 1.874a.5.5 0 0 0 .47 0l3.515-1.874zM8 9.433 1.562 6 8 2.567 14.438 6 8 9.433z" />
                                            </svg>
                                        </div>
                                        <div class="ms-3 lh-1">
                                            <h6 class="mb-1">
                                                Changelog <span class="text-primary ms-1">v1.1.0</span>
                                            </h6>
                                            <p class="mb-0 small">See what's new</p>
                                        </div>
                                    </a>
                                </div>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </nav>
    </div>



    <main class="p-10">
        @yield('content')

    </main>




    <!-- footer -->
    <footer class="footer">

    </footer>

    <!-- Javascript-->

    <!-- Libs JS -->


    @vite('resources/assets/libs/jquery/dist/jquery.min.js')
    @vite('resources/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')
    @vite('resources/assets/libs/simplebar/dist/simplebar.min.js')
    @vite('resources/assets/js/theme.min.js')
    @vite('resources/assets/libs/jquery-countdown/dist/jquery.countdown.min.js')
    @vite('resources/assets/js/vendors/countdown.js')
    @vite('resources/assets/libs/slick-carousel/slick/slick.min.js')
    @vite('resources/assets/js/vendors/slick-slider.js')
    @vite('resources/assets/libs/tiny-slider/dist/min/tiny-slider.js')
    @vite('resources/assets/js/vendors/tns-slider.js')
    @vite('resources/assets/js/vendors/zoom.js')
    @vite('resources/assets/js/vendors/increment-value.js')


</body>


<!-- Mirrored from freshcart.codescandy.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2023 15:48:40 GMT -->

</html>
