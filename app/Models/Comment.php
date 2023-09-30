<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'barter_id',
        'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function barter()
    {
        return $this->belongsTo(Barter::class);
    }
}