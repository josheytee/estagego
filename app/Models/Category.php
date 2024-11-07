<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function SubCategory()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function Page()
    {
        return $this->belongsTo(Page::class, 'id');
    }
}
