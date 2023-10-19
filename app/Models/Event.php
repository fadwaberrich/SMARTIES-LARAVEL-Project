<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'date',
        'location',
        'ticket_price',
        'image',
        'status',
        'venue_id', // Make sure 'venue_id' is included here

    ];

    public function venue()
{
    return $this->belongsTo(Venue::class);
}
}
