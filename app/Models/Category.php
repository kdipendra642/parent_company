<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Posts;

class Category extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'slug',
    ];

    public function posts() {
        return $this->hasMany(Posts::class);
    }
}
