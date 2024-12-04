<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $table = 'faqs';
    protected $fillable = ['category_id', 'subcategory_name', 'question', 'answer', 'featured'];

    public function SubCategory()
    {
        return $this->belongsTo(SubCategory::class, 'id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
