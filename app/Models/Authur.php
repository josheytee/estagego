<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;

class Authur extends Model
{
    use HasFactory;
    protected $table='authors';
    protected $fillable=['first_name','last_name','image'];

    public function Blog(){
        return $this->hasMany(Blog::class,'author_id','id');
    }
}
