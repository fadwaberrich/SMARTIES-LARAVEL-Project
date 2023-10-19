<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReviewRating;

class ReviewController extends Controller
{
    // Display a listing of the review ratings
    public function index()
    {
        $reviewRatings = ReviewRating::all();
        return view('review_ratings.index', compact('reviewRatings'));
    }

    // Show the form for creating a new review rating
    public function create()
    {
        return view('review_ratings.create');
    }

    // Store a newly created review rating in the database
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id', // Ensure the user_id is present and corresponds to a user in your database
            'star_rating' => 'required|integer|between:1,5',
            'comments' => 'required|string|max:255',
        ]);

        // Create a new review rating
        $reviewRating = ReviewRating::create([
            'product_id' => $request->input('product_id'),
            'user_id' => $request->input('user_id'),
            'star_rating' => $request->input('star_rating'),
            'comments' => $request->input('comments'),
        ]);

        // Optionally, you might want to redirect back or do something else after creating the review

        return redirect()->back()->with('success', 'Review submitted successfully');
    }
    
    // Display the specified review rating
    public function show(ReviewRating $reviewRating)
    {
        return view('review_ratings.show', compact('reviewRating'));
    }

    // Show the form for editing the specified review rating
    public function edit(ReviewRating $reviewRating)
    {
        return view('review_ratings.edit', compact('reviewRating'));
    }

    // Update the specified review rating in the database
    public function update(Request $request, ReviewRating $reviewRating)
    {
        // Debugging: Dump the contents of the $request object
        dd($request->all());
    
        $request->validate([
            'product_id' => 'required',
            // Remove 'status' validation as it's a checkbox
        ]);
    
        // Debugging: Output a message to indicate the status
        if ($request->input('status') === 'active') {
            echo "Status is active.";
        } else {
            echo "Status is deactive.";
        }
    
        // Check if the checkbox is checked, and set the 'status' accordingly
        $reviewRating->status = $request->has('status') ? 'active' : 'deactive';    
        // Debugging: Dump the contents of the updated reviewRating
    
        $reviewRating->update($request->all());
    
    
        return redirect()->route('review-ratings.index')
            ->with('success', 'Review rating updated successfully.');
    }
    
    

    // Remove the specified review rating from the database
    public function destroy(ReviewRating $reviewRating)
    {
        $reviewRating->delete();

        return redirect()->route('review-ratings.index')
            ->with('success', 'Review rating deleted successfully.');
    }
    
}