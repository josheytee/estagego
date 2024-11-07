<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = ['name', 'email', 'phone', 'website', 'comment', 'show'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
