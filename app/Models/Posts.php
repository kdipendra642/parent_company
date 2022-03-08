<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Multipic;

class Posts extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'cover',
        'status',
        'feature',
        'url',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function multipic() {
        return $this->hasMany(Multipic::class);
    }
}
