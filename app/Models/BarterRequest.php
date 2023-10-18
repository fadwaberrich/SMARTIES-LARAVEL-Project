<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarterRequest extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'message',
        'price',
        'title',
        'image',
        'barter_id', 
        'user_id',  
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function barter()
    {
        return $this->belongsTo(Barter::class);
    }
    public function response()
    {
        return $this->hasOne(ResponseToRequest::class);
    }
}
