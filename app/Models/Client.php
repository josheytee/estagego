<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'clients';
    protected $fillable = ['name', 'logo', 'content', 'image', 'home_content'];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
