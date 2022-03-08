<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Posts;

class Multipic extends Model
{
    protected $fillable = [
        'image',
    ];

    public function posts() {
        return $this->belongsTo(Posts::class);
    }
}
