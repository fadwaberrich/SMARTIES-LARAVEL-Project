<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class ReviewRating extends Model
    {
        protected $table = 'review_ratings'; // Specify the table name if it's different from the model's plural name

        protected $fillable = [
            'product_id',
            'user_id',
            'comments',
            'star_rating',
            'status',
        ];
        public function product()
    {
        return $this->belongsTo(Product::class);
    }
    protected $guarded = ['_token'];


        // You can define any relationships or additional methods here
    }