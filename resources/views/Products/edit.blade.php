@extends('back.layout')


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Codescandy" name="author">
    <title>Reviews Dashboard - FreshCart </title>


</head>

<body>

    <!-- main wrapper-->
    <div class="main-wrapper">
        <nav class="navbar-vertical-nav d-none d-xl-block ">
        </nav>
        <nav class="navbar-vertical-nav offcanvas offcanvas-start navbar-offcanvac" tabindex="-1"
            id="offcanvasExample">
        </nav>

        <main class="main-content-wrapper">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row mb-8">
                    <div class="col-md-12">
                        <div class="d-md-flex justify-content-between align-items-center">
                            <!-- page header -->
                            <div>
                                <h2>Edit Product</h2>
                                <!-- breadcrumb -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li><a href="#" class="text-inherit">Dashboard</a></li>
                                        <li><a href="#" class="text-inherit">/Products</a></li>
                                        <li>/Edit Product</li>
                                    </ol>
                                </nav>
                            </div>
                            <!-- button -->
                            <div>
                                <a href="products.html" class="btn btn-light">Back to Product</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <!-- card -->
                        <div class="card mb-6 card-lg">
                            <!-- card body -->
                            <div class="card-body p-6 ">
                                <h4 class="mb-4 h5">Product Information</h4>
                                <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT') <!-- Use the PUT method for updating -->
                                    <!-- input -->
                                    <div class="mb-3">
                                        <label class="form-label">Product Name</label>
                                        <input type="text" class="form-control" name="product_name"
                                            value="{{ $product->product_name }}" placeholder="Product Name" required>
                                    </div>
                                    <!-- input -->
                                 
                                    <div class="mb-3">
                                        <label class="form-label">Product Price/Value</label>
                                        <input type="text" class="form-control" name="price" value="{{ $product->price }}"
                                            placeholder="Product Price" required>
                                    </div>
                                    <!-- input -->
                                    <div class="mb-3">
                                        <label class="form-label">Weight</label>
                                        <input type="text" class="form-control" name="weight" value="{{ $product->weight }}"
                                            placeholder="Weight" required>
                                    </div>
                                    <!-- input -->
                                    <div class="mb-3">
                                        <label class="form-label">Units</label>
                                        <input type="text" class="form-control" name="units" value="{{ $product->units }}"
                                            placeholder="Units" required>
                                    </div>
                                    <div>
                                        <div class="mb-3">
                                            <!-- heading -->
                                            <h4 class="mb-3 h5">Product Images</h4>
                                            <!-- input -->
                                            <input type="file" name="photo" class="form-control">
                                        </div>
                                    </div>
                                    <!-- input -->
                                    <div class="mb-3">
                                        <h4 class="mb-3 h5">Product Descriptions</h4>
                                        <textarea class="form-control" name="description" rows="4"
                                            placeholder="Product Description">{{ $product->description }}</textarea>
                                    </div>
                                    <!-- input -->
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control" name="address"
                                            value="{{ $product->address }}" placeholder="Address">
                                    </div>
                                    <!-- input -->
        
                                    <!-- button -->
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Update Product</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
        
                    <!-- Remaining HTML for the right-hand side (Price, Meta Data, etc.) remains unchanged -->
        
                </div>
            </div>
        </main>
        

        
</div>
</body>



</html>
