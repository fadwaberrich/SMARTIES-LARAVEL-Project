<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;
    protected $fillable = [
    'id_category',
    'titre',
     'description',
     'telephone',
     'photo',
     'echange'
 ];
 public function category()
{
return $this->belongsTo(Category::class, 'id_categorie');
}
   
}
