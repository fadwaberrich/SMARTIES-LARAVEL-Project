<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
    ];

    protected $casts = [
        'reported' => 'boolean',
    ];
    // Form.php





    public function reports()
{
    return $this->hasMany(Report::class, 'form_id')->cascade('delete');}   
    

}
