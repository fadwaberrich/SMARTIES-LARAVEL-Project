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

        <nav class="navbar-vertical-nav offcanvas offcanvas-start navbar-offcanvac" tabindex="-1" id="offcanvasExample">


        </nav>

        <main class="main-content-wrapper">
            <div class="container">
                <div class="row mb-8">
                    <div class="col-md-12">
                        <div>
                            <!-- page header -->
                            <h2>Reviews</h2>
                            <!-- breacrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li><a href="#" class="text-inherit">Dashboard</a>
                                    </li>
                                    <li>/Reviews</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- row -->
                <div class="row ">
                    <div class="col-xl-12 col-12 mb-5">
                        <!-- card -->
                        <div class="card h-100 card-lg">
                            <div class="p-6 ">
                                <div class="row justify-content-between">
                                    <div class="col-md-4 col-12 mb-2 mb-md-0">
                                        <!-- form -->
                                        <form class="d-flex" role="search">
                                            <input class="form-control" type="search" placeholder="Search Reviews"
                                                aria-label="Search">
                                        </form>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-12">
                                        <!-- main -->
                                        <select class="form-select">
                                            <option selected>Select Rating</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                            <option value="4">Four</option>
                                            <option value="5">Five</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- card body -->
                            <div class="card-body p-0">
                                <!-- table -->
                                <div class="table-responsive">
                                    <table
                                        class="table table-centered table-hover table-borderless mb-0 table-with-checkbox text-nowrap">
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
                                                <th>Product</th>
                                                <th>Name</th>
                                                <th>Reviews</th>
                                                <th>Rating</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reviewRatings as $reviewRating)
                                                <tr>

                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="reviewOne">
                                                            <label class="form-check-label" for="reviewOne">

                                                            </label>
                                                        </div>
                                                    </td>

                                                    <td><a href="#"
                                                            class="text-reset">{{ $reviewRating->product_id }}</a></td>
                                                    <td>{{ $reviewRating->id }}</td>

                                                    <td>
                                                        <span class="text-truncate">{{ $reviewRating->comments }}</span>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            @if ($reviewRating->star_rating >= 1)
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    <span><i
                                                                            class="bi bi-star-fill {{ $i <= $reviewRating->star_rating ? 'text-warning' : 'text-light' }}"></i></span>
                                                                @endfor
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td
                                                        style="color: {{ $reviewRating->status === 'active' ? 'green' : 'red' }}">
                                                        {{ $reviewRating->status }}
                                                    </td>

                                                    <td>
                                                        {{ $reviewRating->created_at }}
                                                    </td>
                                                    <td>


                                                        <li>
                                                            <form
                                                                action="{{ route('review-ratings.destroy', $reviewRating) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-link"><i
                                                                        class="bi bi-trash me-3"></i>Delete</button>
                                                            </form>

                                                        </li>
                                                        <li><a class="dropdown-item"
                                                            href="{{ route('review-ratings.edit', $reviewRating) }}"><i
                                                                class="bi bi-pencil-square me-3"></i>Edit</a>
                                                    </li>

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
