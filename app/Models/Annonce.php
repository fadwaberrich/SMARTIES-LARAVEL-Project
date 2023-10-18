<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;
    protected $fillable = [
     'id_categorie',
     'id_user',
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
public function product()
{
    return $this->hasOne(Product::class, 'annonce_id');
}

public function user()
{
    return $this->belongsTo(User::class, 'id_user');
}
   
}