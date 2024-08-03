<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;


    protected $fillable = [
        'category_id',
        'author_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'published_at',
        'views',
        'is_active'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'author_id');
    }
}
