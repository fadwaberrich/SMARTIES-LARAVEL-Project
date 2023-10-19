@if (!empty($value->star_rating))
    <!-- Existing code for displaying reviews when they exist -->

@else
    <div class="container">
        <div class="row">
            <div class="col mt-4">
                <form class="py-2 px-4" style="box-shadow: 0 0 10px 0 #ddd;" method="POST" autocomplete="off">
                    @csrf
                    <p class="font-weight-bold ">Review</p>
                    <div class="form-group row">
                        <!-- Get product ID from the request parameters -->
                        <input type="hidden" name="product_id" value="{{ request()->route('product_id') }}">
                        <!-- Add user_id input and set its value from the authenticated user -->
                        <input name="user_id" value="{{ auth()->user()->id }}">
                        test auth
                        <div class="col">
                            <div class="rate">
                                <!-- Remaining code for rating input -->
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <div class="col">
                            <textarea class="form-control" name="comment" rows="6" placeholder="Comment" maxlength="200"></textarea>
                        </div>
                    </div>
                    <div class="mt-3 text-right">
                        <button class="btn btn-sm py-2 px-3 btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif