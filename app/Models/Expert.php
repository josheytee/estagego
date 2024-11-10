<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasFactory;
    protected $table = 'experts';
    protected $fillable = ['name', 'title', 'linkedin', 'instagram', 'bio', 'image'];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
