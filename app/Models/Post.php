<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'text',
        'category_id',
    ];

    // ✅ THIS FIXES YOUR ERROR
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}