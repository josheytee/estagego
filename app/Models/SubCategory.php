<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'sub_categories';
    protected $fillable = ['category_id', 'subcategory_name', 'url'];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Faq()
    {
        return $this->hasMany(Faq::class, 'category_id', 'id');
    }
}
