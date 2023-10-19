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



<!-- main wrapper-->
<div class="main-wrapper">
    <nav class="navbar-vertical-nav d-none d-xl-block ">
    </nav>
    <nav class="navbar-vertical-nav offcanvas offcanvas-start navbar-offcanvac" tabindex="-1" id="offcanvasExample">


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
                            <h2>Edit reviews</h2>
                            <!-- breacrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li ><a href="#" class="text-inherit">Dashboard</a>
                                    </li>
                                    <li ><a href="#" class="text-inherit">/Reviews</a></li>
                                    <li >/Edit</li>
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
            <form action="{{ route('review-ratings.update', $reviewRating->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Use PUT method for updates -->
                <!-- row -->
                <div class="row">

                    <div class="col-lg-8 col-12">
                        <!-- card -->
                        <div class="card mb-6 card-lg">
                            <!-- card body -->
                            <div class="card-body p-6 ">
                                <h4 class="mb-4 h5">Review Information</h4>
                                <div class="row">
                                    <div class="column" style="float: left; width:50%">
                                        <div>
                                            <label class="form-label">Rating</label>
                                            @if ($reviewRating->star_rating >= 1)
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <span><i
                                                            class="bi bi-star-fill {{ $i <= $reviewRating->star_rating ? 'text-warning' : 'text-light' }}"></i></span>
                                                @endfor
                                            @endif
                                        </div>
                                        <div>
                                            <label class="form-label">Comment</label>

                                            <span class="text-truncate">{{ $reviewRating->comments }}</span>
                                        </div>
                                        <div class="form-check form-switch mb-4">
                                            <input class="form-check-input" type="checkbox" name="status"
                                                id="flexSwitchStatus"
                                                {{ $reviewRating->status === 'active' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="flexSwitchStatus">Active</label>
                                        </div>
                                        <div>
                                            <label for="form-label">Product ID</label>
                                            <input disabled type="text" class="form-control" id="product_id"
                                                name="product_id" value="{{ $reviewRating->product_id }}" required>
                                        </div>

                                    </div>
                                    <div class="column" style="float: left; width:50%">
                                        test
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
            </form>

        </div>
</div>
