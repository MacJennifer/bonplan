<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sort extends Model
{
    use HasFactory;
    protected $fillable = ['place_id', 'categorie_id'];

    public function places()
    {
        return $this->belongsTo(Place::class);
    }

    public function categories()
    {
        return $this->belongsTo(Categorie::class);
    }
}
