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
        $request->validate([
            'product_id' => 'required',
            'star_rating' => 'required|integer|min:1|max:5',
            'status' => 'required|in:active,deactive',
            // Add other validation rules as needed
        ]);

        ReviewRating::create($request->all());

        return redirect()->route('review-ratings.index')
            ->with('success', 'Review rating created successfully.');
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
        try {
            // Debugging: Output the received data from the form
    
            $request->validate([
                'product_id' => 'required',
                // Remove 'status' validation as it's a checkbox
            ]);
    
            // Check if the checkbox is checked, and set the 'status' accordingly
            $reviewRating->status = $request->has('status') ? 'active' : 'deactive';
    
            // Debugging: Output the current status value
            echo "Current Status: " . $reviewRating->status;
    
            $reviewRating->update($request->all());
    
            // Debugging: Output a success message
            echo "Review rating updated successfully.";
    
            return redirect()->route('review-ratings.index')
                ->with('success', 'Review rating updated successfully.');
        } catch (\Exception $e) {
            // Debugging: Output any exceptions that may occur
            dd($e);
        }
    }
    
    

    // Remove the specified review rating from the database
    public function destroy(ReviewRating $reviewRating)
    {
        $reviewRating->delete();

        return redirect()->route('review-ratings.index')
            ->with('success', 'Review rating deleted successfully.');
    }
}