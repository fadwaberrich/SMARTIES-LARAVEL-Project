@php
    $totalRatings = $product->reviews->count();
    $averageRating = $totalRatings > 0 ? $product->reviews->avg('star_rating') : 0;

@endphp

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
     .rate {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rate:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rate:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ccc;
         }
         .rated:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ccc;
         }
         .rate:not(:checked) > label:before {
         content: '★ ';
         }
         .rate > input:checked ~ label {
         color: #ffc700;
         }
         .rate:not(:checked) > label:hover,
         .rate:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rate > input:checked + label:hover,
         .rate > input:checked + label:hover ~ label,
         .rate > input:checked ~ label:hover,
         .rate > input:checked ~ label:hover ~ label,
         .rate > label:hover ~ input:checked ~ label {
         color: #c59b08;
         }
         .star-rating-complete{
            color: #c59b08;
         }
         .rating-container .form-control:hover, .rating-container .form-control:focus{
         background: #fff;
         border: 1px solid #ced4da;
         }
         .rating-container textarea:focus, .rating-container input:focus {
         color: #000;
         }         .rated {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rated:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rated:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ffc700;
         }
         .rated:not(:checked) > label:before {
         content: '★ ';
         }
         .rated > input:checked ~ label {
         color: #ffc700;
         }
         .rated:not(:checked) > label:hover,
         .rated:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rated > input:checked + label:hover,
         .rated > input:checked + label:hover ~ label,
         .rated > input:checked ~ label:hover,
         .rated > input:checked ~ label:hover ~ label,
         .rated > label:hover ~ input:checked ~ label {
         color: #c59b08;
         }
</style>


@extends('front.layout')
@section('content')

    <div class="container">
        <p>hey</p>
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('storage/' . $product->photo) }}" class="card-img-top" alt="Image">
            </div>
            <div class="col-md-6">
                <div class="ps-lg-10 mt-6 mt-md-0">
                    <!-- content -->
                    <a href="#!" class="mb-4 d-block"> {{ $product->annonce->titre }}
                    </a>

                    <a href="#!" class="mb-4 d-block">{{ $product->category }}</a>
                    <!-- heading -->
                    <h1 class="mb-1">{{ $product->product_name }} </h1>
                    <div class="mb-4">
                        <!-- rating -->
                        <!-- rating --> <small class="text-warning"> <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i></small><a href="#" class="ms-2">{{$totalRatings}} Reviews</a>
                    </div>
                    <div class="fs-4">
                        <!-- price --><span class="fw-bold text-dark">{{ $product->price }} TND</span>
                    </div>
                    <!-- hr -->
                    <hr class="my-6">
                    <div class="mb-5"><button type="button"
                            class="btn btn-outline-secondary">{{ $product->weight }}KG</button>
                        <div>

                        </div>
                        <div class="mt-3 row justify-content-start g-2 align-items-center">

                            <div class="col-xxl-4 col-lg-4 col-md-5 col-5 d-grid">
                                <!-- button -->
                                <a href="{{ route('barterRequests.create') }}?product_id={{ $product->id }}&annonce_id={{ $product->annonce->id }}" class="btn btn-primary">
    <i class="feather-icon icon-shopping-bag me-2"></i>Propose barter
</a>
                            </div>
                            <div class="col-md-4 col-4">
                                <!-- btn -->
                                <a class="btn btn-light " href="#" data-bs-toggle="tooltip" data-bs-html="true"
                                    aria-label="Compare"><i class="bi bi-arrow-left-right"></i></a>
                                <a class="btn btn-light " href="shop-wishlist.html" data-bs-toggle="tooltip"
                                    data-bs-html="true" aria-label="Wishlist"><i class="feather-icon icon-heart"></i></a>
                            </div>
                        </div>
                        <!-- hr -->
                        <hr class="my-6">
                        <div>
                            <!-- table -->
                            <table class="table table-borderless mb-0">

                                <tbody>

                                    <tr>
                                        <td>Status:</td>
                                        <td>{{ $product->status }}</td>

                                    </tr>
                                    <tr>
                                        <td>Category:</td>
                                        <td>{{ $product->category }}</td>

                                    </tr>
                                    <tr>
                                        <td>Adress:</td>
                                        <td>{{ $product->address }}</td>

                                    </tr>


                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- reviews and product details section!-->
        <section class="mt-lg-14 mt-8 ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills nav-lb-tab" id="myTab" role="tablist">
                            <!-- nav item -->
                            <li class="nav-item" role="presentation">
                                <!-- btn -->
                                <button class="nav-link active" id="product-tab" data-bs-toggle="tab"
                                    data-bs-target="#product-tab-pane" type="button" role="tab"
                                    aria-controls="product-tab-pane" aria-selected="true">Product Details</button>
                            </li>

                            <!-- nav item -->
                            <li class="nav-item" role="presentation">
                                <!-- btn -->
                                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab"
                                    data-bs-target="#reviews-tab-pane" type="button" role="tab"
                                    aria-controls="reviews-tab-pane" aria-selected="false">Reviews</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <!-- tab pane -->
                            <div class="tab-pane fade show active" id="product-tab-pane" role="tabpanel"
                                aria-labelledby="product-tab" tabindex="0">
                                <div class="my-8">
                                    <div class="mb-5">
                                        <!-- text -->
                                        <h4 class="mb-1">Description</h4>
                                        <p class="mb-0">{{ $product->description }}</p>
                                    </div>

                                    <!-- content -->
                                    <div class="mb-5">
                                        <h5 class="mb-1">Unit</h5>
                                        <p class="mb-0">{{ $product->units }}</p>
                                    </div>

                                    <!-- rating -->
                                    <h3 class="mb-5">Create Review Rating</h3>
                                    <form method="POST" action="{{ route('review-ratings.store') }}">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <!-- Add user_id input and set its value from the authenticated user -->
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <div class="col">
                                            <div class="rate">
                                              <input
                                                type="radio"
                                                id="star5"
                                                class="rate"
                                                name="star_rating"
                                                value="5"
                                              />
                                              <label for="star5" title="text">5 stars</label>
                                              <input
                                                type="radio"
                                                checked
                                                id="star4"
                                                class="rate"
                                                name="star_rating"
                                                value="4"
                                              />
                                              <label for="star4" title="text">4 stars</label>
                                              <input
                                                type="radio"
                                                id="star3"
                                                class="rate"
                                                name="star_rating"
                                                value="3"
                                              />
                                              <label for="star3" title="text">3 stars</label>
                                              <input
                                                type="radio"
                                                id="star2"
                                                class="rate"
                                                name="star_rating"
                                                value="2"
                                              />
                                              <label for="star2" title="text">2 stars</label>
                                              <input
                                                type="radio"
                                                id="star1"
                                                class="rate"
                                                name="star_rating"
                                                value="1"
                                              />
                                              <label for="star1" title="text">1 star</label>
                                            </div>
                                          </div>
                                        <div class="py-4 mb-4">
                                            <!-- heading -->
                                            <h5>Add a written review</h5>
                                            <textarea class="form-control" name="comments" rows="3"
                                                placeholder="What did you like or dislike? What did you use this product for?"></textarea>
                                        </div>

                                        <!-- button -->
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">Submit Review Rating</button>
                                        </div>
                                    </form>


                                </div>
                            </div>

                            <!-- tab pane -->
                            <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel"
                                aria-labelledby="review-tab" tabindex="0">
                                <div class="my-8">
                                    <!-- row -->
                                    <div class="row">
                                      <div class="col-md-4">
                                        <div class="me-lg-12 mb-6 mb-md-0">
                                          <div class="mb-5">
                                            <!-- title -->
                                             <h4 class="mb-3">Customer reviews</h4>
                                                <span>
                                              <!-- rating -->
                                              <small class="text-warning">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $averageRating)
                                                        <i class="bi bi-star-fill"></i>
                                                    @elseif ($i - 0.5 <= $averageRating)
                                                        <i class="bi bi-star-half"></i>
                                                    @else
                                                        <i class="bi bi-star"></i>
                                                    @endif
                                                @endfor
                                            </small>
                                            <span class="ms-3">
                                                {{ number_format($averageRating, 1) }} out of 5
                                            </span>
                                            <small class="ms-3">
                                                {{ $totalRatings }} global {{ $totalRatings == 1 ? 'rating' : 'ratings' }}
                                            </small>

                                            </span>
                                          </div>



                                        </div>
                                      </div>
                                      <!-- col -->
                                      <div class="col-md-8">
                                        <div class="mb-10">
                                          <div class="d-flex justify-content-between align-items-center mb-8">
                                            <div>
                                              <!-- heading -->
                                              <h4>Reviews</h4>
                                            </div>
                                          </div>
                                          @if ($product->reviews->count() > 0)
                                    @foreach ($product->reviews as $review)
                                          <div class="d-flex border-bottom pb-6 mb-6">
                                            <!-- img -->
                                            <!-- img --><img src="../assets/images/avatar/avatar-10.jpg" alt=""
                                              class="rounded-circle avatar-lg">
                                            <div class="ms-5">
                                              <h6 class="mb-1">
                                           {{$review->user->name}}

                                              </h6>
                                              <!-- select option -->
                                              <!-- content -->
                                              <p class="small"> <span class="text-muted">{{$review->star_rating}}</span>
                                              <!-- rating -->
                                              <div class=" mb-2">
                                                @for($i=1; $i<=$review->star_rating; $i++)
                                                <i class="bi bi-star-fill text-warning"></i>
                                                @endfor
                                              </div>
                                              <!-- text-->
                                              <p> {{$review->comments}} </p>
                                              <div>

                                              </div>

                                            </div>
                                          </div>
                                          @endforeach
                                          @else
                                              <p>No reviews available for this product.</p>
                                          @endif
                                        </div>

                                      </div>
                                    </div>
                                  </div>

                        </div>
                                </div>
                            </div>
                        </div>
                    </div>


                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
