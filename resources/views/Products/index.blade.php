@extends('back.layout')


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Codescandy" name="author">
    <title>Products Dashboard  </title>


</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-glass">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center w-100">
                <div class="d-flex align-items-center">

                    <a class="text-inherit d-block d-xl-none me-4" data-bs-toggle="offcanvas" href="#offcanvasExample"
                        role="button" aria-controls="offcanvasExample">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                            class="bi bi-text-indent-right" viewBox="0 0 16 16">
                            <path
                                d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm10.646 2.146a.5.5 0 0 1 .708.708L11.707 8l1.647 1.646a.5.5 0 0 1-.708.708l-2-2a.5.5 0 0 1 0-.708l2-2zM2 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </a>

                    <form role="search">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">

                    </form>
                </div>
                <div>
                    <ul class="list-unstyled d-flex align-items-center mb-0 ms-5 ms-lg-0">

                        <li class="dropdown-center ">
                            <a class="position-relative btn-icon btn-ghost-secondary btn rounded-circle" href="#"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-bell fs-5"></i>
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger mt-2 ms-n2">
                                    2
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg p-0 border-0 ">
                                <div
                                    class="border-bottom p-5 d-flex
              justify-content-between align-items-center">
                                    <div>
                                        <h5 class="mb-1">Notifications</h5>
                                        <p class="mb-0 small">You have 2 unread messages</p>
                                    </div>
                                    <a href="#!" class="text-muted">
                                        <a href="#" class="btn btn-ghost-secondary btn-icon rounded-circle"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            data-bs-title="Mark all as read">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                fill="currentColor" class="bi bi-check2-all text-success"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z" />
                                                <path
                                                    d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z" />
                                            </svg>
                                        </a>
                                    </a>
                                </div>
                                <div data-simplebar style="height: 250px;">
                                    <!-- List group -->
                                    <ul class="list-group list-group-flush notification-list-scroll fs-6">
                                        <!-- List group item -->
                                        <li class="list-group-item px-5 py-4 list-group-item-action active">
                                            <a href="#!" class="text-muted">
                                                <div class="d-flex">
                                                    <img src="../assets/images/avatar/avatar-1.jpg" alt=""
                                                        class="avatar avatar-md rounded-circle ">
                                                    <div class="ms-4">
                                                        <p class="mb-1">
                                                            <span class="text-dark">Your order is placed</span> waiting
                                                            for shipping
                                                        </p>
                                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                height="12" fill="currentColor"
                                                                class="bi bi-clock text-muted" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                                                <path
                                                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                                            </svg><small class="ms-2">1 minute ago</small></span>
                                                    </div>
                                                </div>
                                            </a>



                                        </li>
                                        <li class="list-group-item  px-5 py-4 list-group-item-action">
                                            <a href="#!" class="text-muted">
                                                <div class="d-flex">
                                                    <img src="../assets/images/avatar/avatar-5.jpg" alt=""
                                                        class="avatar avatar-md rounded-circle ">
                                                    <div class="ms-4">
                                                        <p class="mb-1">
                                                            <span class="text-dark">Jitu Chauhan </span> answered to
                                                            your pending order list with notes
                                                        </p>
                                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                height="12" fill="currentColor"
                                                                class="bi bi-clock text-muted" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                                                <path
                                                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                                            </svg><small class="ms-2">2 days ago</small></span>
                                                    </div>
                                                </div>
                                            </a>



                                        </li>
                                        <li class="list-group-item px-5 py-4 list-group-item-action">
                                            <a href="#!" class="text-muted">
                                                <div class="d-flex">
                                                    <img src="../assets/images/avatar/avatar-2.jpg" alt=""
                                                        class="avatar avatar-md rounded-circle ">
                                                    <div class="ms-4">
                                                        <p class="mb-1">
                                                            <span class="text-dark">You have new messages</span> 2
                                                            unread messages
                                                        </p>
                                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                height="12" fill="currentColor"
                                                                class="bi bi-clock text-muted" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                                                <path
                                                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                                            </svg><small class="ms-2">3 days ago</small></span>
                                                    </div>
                                                </div>
                                            </a>



                                        </li>

                                    </ul>
                                </div>
                                <div class="border-top px-5 py-4 text-center">
                                    <a href="#!" class=" ">
                                        View All
                                    </a>
                                </div>
                            </div>

                        </li>
                        <li class="dropdown ms-4">
                            <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../assets/images/avatar/avatar-1.jpg" alt=""
                                    class="avatar avatar-md rounded-circle">
                            </a>

                            <div class="dropdown-menu dropdown-menu-end p-0">



                                <div class="lh-1 px-5 py-4 border-bottom">
                                    <h5 class="mb-1 h6">FreshCart Admin</h5>
                                    <small>admindemo@email.com</small>
                                </div>



                                <ul class="list-unstyled px-2 py-3">

                                    <li>
                                        <a class="dropdown-item" href="#!">
                                            Home
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#!">
                                            Profile
                                        </a>


                                    </li>


                                    <li>
                                        <a class="dropdown-item" href="#!">

                                            Settings
                                        </a>
                                    </li>

                                </ul>
                                <div class="border-top px-5 py-3">

                                    <a href="#">Log Out</a>
                                </div>



                            </div>

                        </li>
                    </ul>

                </div>

            </div>
        </div>
    </nav>
    <!-- main wrapper-->
    <div class="main-wrapper">


        <nav class="navbar-vertical-nav d-none d-xl-block ">
         
        </nav>

        <nav class="navbar-vertical-nav offcanvas offcanvas-start navbar-offcanvac" tabindex="-1"
            id="offcanvasExample">
           

        </nav>


<main class="main-content-wrapper">
  <div class="container">
    <div class="row mb-8">
      <div class="col-md-12">
        <!-- page header -->
        <div class="d-md-flex justify-content-between align-items-center">
          <div>
            <h2>Products</h2>
              <!-- breacrumb -->
              <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#" class="text-inherit">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
              </ol>
            </nav>
          </div>
          <!-- button -->
          <div>
            <a href="add-product.html" class="btn btn-primary">Add Product</a>
          </div>
        </div>
      </div>
    </div>
    <!-- row -->
    <div class="row ">
      <div class="col-xl-12 col-12 mb-5">
        <!-- card -->
        <div class="card h-100 card-lg">
          <div class="px-6 py-6 ">
            <div class="row justify-content-between">
              <!-- form -->
              <div class="col-lg-4 col-md-6 col-12 mb-2 mb-lg-0">
                <form class="d-flex" role="search">
                  <input class="form-control" type="search" placeholder="Search Products" aria-label="Search">
                </form>
              </div>
              <!-- select option -->
              <div class="col-lg-2 col-md-4 col-12">
                <select class="form-select">
                  <option selected>Status</option>
                  <option value="1">Active</option>
                  <option value="2">Deactive</option>
                  <option value="3">Draft</option>
                </select>
              </div>
            </div>
          </div>
          <!-- card body -->
          <div class="card-body p-0">
            <!-- table -->
            <div class="table-responsive">
              <table class="table table-centered table-hover text-nowrap table-borderless mb-0 table-with-checkbox">
                <thead class="bg-light">
                  <tr>
                    <th>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkAll">
                        <label class="form-check-label" for="checkAll">

                        </label>
                      </div>
                    </th>
                    <th>Image</th>
                    <th>Proudct Name</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>Create at</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($products as $product)
                  <tr>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="productOne">
                        </div>
                    </td>
                    <td>
                        <a href="#!"> <img src="../assets/images/products/product-img-1.jpg" alt="" class="icon-shape icon-md"></a>
                    </td>
                    <td><a href="#" class="text-reset">{{ $product->product_name }}</a></td>
                    <td>{{ $product->category }}</td>
                
                    <td>
                      @if ($product->status === 'active')
                          <span class="badge bg-success text-white">Active</span>
                      @else
                          <span class="badge bg-danger text-white">Deactive</span>
                      @endif
                  </td>
                  
                    <td>${{ $product->price }}</td>
                    <td>{{ $product->created_at->format('d M Y') }}</td>
                    <td>
                        <div>
                           
                          <li>
                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item"><i class="bi bi-trash me-3"></i>Delete</button>
                            </form>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('products.edit', $product) }}"><i class="bi bi-pencil-square me-3"></i>Edit</a></li>                        </div>
                    </td>
                </tr> 
                  @endforeach
                
             
        
                </tbody>
              </table>

            </div>
          </div>

        </div>

      </div>

    </div>
  </div>
</main>
</div>
</body>



</html>
