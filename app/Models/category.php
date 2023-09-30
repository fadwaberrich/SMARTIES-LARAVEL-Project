<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    ];
        protected $table = 'categories';

        protected $primaryKey = 'category_id';

    public function barterListings()
    {
        return $this->hasMany(Barter::class, 'category_id', 'category_id');
    }
}
