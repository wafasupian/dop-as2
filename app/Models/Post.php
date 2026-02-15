<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['title', 'body', 'category_id'];

    /**
     * Define the relationship to the Category model.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}