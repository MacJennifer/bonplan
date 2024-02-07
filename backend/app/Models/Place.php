<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'adressPlaces', 'zipCodePlaces', 'phonePlaces', 'comment_id'];


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function categories()
    {
        return $this->hasMany(Categorie::class);
    }
}
