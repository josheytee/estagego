<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePage extends Model
{
    use HasFactory;
    protected $table = 'service_pages';
    protected $fillable = ['title', 'content'];

    public function Page()
    {
        return  $this->belongsTo(Page::class, 'page_id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
