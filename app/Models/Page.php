<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $table='pages';
protected $fillable=['pageName','class1','class2','url'];

public function Categories(){
return $this->hasMany(Category::class,'page_id','id');
}
}
