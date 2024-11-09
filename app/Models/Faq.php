<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $table = 'faqs';
    protected $fillable = ['question', 'answer', 'featured'];

    public function SubCategory()
    {
        return $this->belongsTo(SubCategrory::class, 'id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
