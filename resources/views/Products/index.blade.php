@extends('back.layout')


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Codescandy" name="author">
    <title>Products Dashboard </title>


</head>

<body>



    <!-- main wrapper-->
    <div class="main-wrapper">


        <nav class="navbar-vertical-nav d-none d-xl-block ">

        </nav>

        <nav class="navbar-vertical-nav offcanvas offcanvas-start navbar-offcanvac" tabindex="-1" id="offcanvasExample">


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
                                        <li ><a href="#" class="text-inherit">Dashboard</a>
                                        </li>
                                        <li  >/Products</li>
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
                                            <input class="form-control" type="search" placeholder="Search Products"
                                                aria-label="Search">
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
                                    <table
                                        class="table table-centered table-hover text-nowrap table-borderless mb-0 table-with-checkbox">
                                        <thead class="bg-light">
                                            <tr>
                                                <th>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="checkAll">
                                                        <label class="form-check-label" for="checkAll">

                                                        </label>
                                                    </div>
                                                </th>
                                                <th>Image</th>
                                                <th>Proudct Name</th>
                                                <th>Status</th>
                                                <th>Price</th>
                                                <th>Create at</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="productOne">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset('storage/' . $product->photo) }}"
                                                            class="icon-shape icon-md">
                                                    </td>
                                                    <td><a href="#"
                                                            class="text-reset">{{ $product->product_name }}</a></td>

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
                                                                <form action="{{ route('products.destroy', $product) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="dropdown-item"><i
                                                                            class="bi bi-trash me-3"></i>Delete</button>
                                                                </form>
                                                            </li>
                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('products.edit', $product) }}"><i
                                                                        class="bi bi-pencil-square me-3"></i>Edit</a>
                                                            </li>
                                                        </div>
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
