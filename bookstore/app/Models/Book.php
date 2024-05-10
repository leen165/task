<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request; 

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}

