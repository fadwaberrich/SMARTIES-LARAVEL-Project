<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'senderName',
        'receiverName',
        'description',
    ];

    protected $casts = [
        'reported' => 'boolean',
    ];
    
    public function reports()
{
    return $this->hasMany(Report::class, 'form_id');
}
    

}
