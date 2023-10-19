<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'description'
    ];


    public function comments(){
        return $this->hasMany(CommentForum::class);
    }
    public function sender()
    {
        return $this->belongsTo(User::class);
    }


}
