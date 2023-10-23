<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentForum extends Model
{
    use HasFactory;
    protected $fillable = [
        'forum_id',
        'comment'
    ];

    public function pub()
    {
        return $this->belongsTo(Forum::class, 'forum_id');
    }
    public function sender()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
