<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarterRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'title',
        'barter_id',
        'user_id',
        'annonce_id'  // Add the 'annonce_id' column to link to Annonce

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
    public function annonce()
    {
        return $this->belongsTo(Annonce::class, 'annonce_id');
    }
}
