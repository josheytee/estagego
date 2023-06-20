<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table='sub_categories';
  
    public function Category()
    {
        return $this->belongsTo(Category::class,'id');
    }

    public function Faq()
    {
        return $this->hasMany(Faq::class,'category_id','id');
    }

}
