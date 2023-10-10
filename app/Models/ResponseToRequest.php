<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponseToRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'message',
        'status',     
        'barter_request_id', // Add a foreign key column
 
    ];
    public function barterRequest()
    {
        return $this->belongsTo(BarterRequest::class);
    }
}
