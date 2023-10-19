@extends('front.layout')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('storage/' . $product->photo ) }}" class="card-img-top" alt="Image">
                        </div>
            <div class="col-md-6">
                <div class="ps-lg-10 mt-6 mt-md-0">
                    <!-- content -->
                    <a href="#!" class="mb-4 d-block">
                        @if($product->annonce)
                            {{ $product->annonce->titre }}
                        @else
                            No title available
                        @endif
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
                            <i class="bi bi-star-half"></i></small><a href="#" class="ms-2">(30 reviews)</a>
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
                                <!-- btn --> <button type="button" class="btn btn-primary"><i
                                        class="feather-icon icon-shopping-bag me-2"></i>Add to
                                    cart</button>
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
                                <button class="nav-link active" id="product-tab" data-bs-toggle="tab" data-bs-target="#product-tab-pane"
                                    type="button" role="tab" aria-controls="product-tab-pane" aria-selected="true">Product Details</button>
                            </li>
                
                            <!-- nav item -->
                            <li class="nav-item" role="presentation">
                                <!-- btn -->
                                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews-tab-pane"
                                    type="button" role="tab" aria-controls="reviews-tab-pane" aria-selected="false">Reviews</button>
                            </li>
                        </ul>
                
                        <div class="tab-content" id="myTabContent">
                            <!-- tab pane -->
                            <div class="tab-pane fade show active" id="product-tab-pane" role="tabpanel" aria-labelledby="product-tab"
                                tabindex="0">
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
                                        <div id="rater" class="starability-basic">
                                            <input type="radio" id="5-stars" name="star_rating" value="5">
                                            <label for="5-stars" title="5 stars"></label>
                                            <input type="radio" id="4-stars" name="star_rating" value="4">
                                            <label for="4-stars" title="4 stars"></label>
                                            <input type="radio" id="3-stars" name="star_rating" value="3">
                                            <label for="3-stars" title="3 stars"></label>
                                            <input type="radio" id="2-stars" name="star_rating" value="2">
                                            <label for="2-stars" title="2 stars"></label>
                                            <input type="radio" id="1-star" name="star_rating" value="1">
                                            <label for="1-star" title="1 star"></label>
                                        </div>
                                    
                                        <div class="py-4 mb-4">
                                            <!-- heading -->
                                            <h5>Add a written review</h5>
                                            <textarea class="form-control" name="comments" rows="3" placeholder="What did you like or dislike? What did you use this product for?"></textarea>
                                        </div>
                                    
                                        <!-- button -->
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">Submit Review Rating</button>
                                        </div>
                                    </form>
                                    
                                    
                                </div>
                            </div>
                
                            <!-- tab pane -->
                            <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel" aria-labelledby="review-tab" tabindex="0">
                                @if ($product->reviews->count() > 0)
                                    @foreach ($product->reviews as $review)
                                        <div>
                                            <p>Rating: {{ $review->star_rating }}</p>
                                            <p>Comments: {{ $review->comments }}</p>
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
        </section>
    </div>
    @endsection