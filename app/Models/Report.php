<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'cause',
        'form_id',

    ];

    public function form()
    {
        return $this->belongsTo(Form::class, 'form_id');
    }

}
