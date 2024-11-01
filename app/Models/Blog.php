<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Authur;

class Blog extends Model
{
    use HasFactory;

    //changing the table name from default to 'about_us'
    protected $table = 'blogs';

    //activating mass assignment by using fillable property signifiying the columns that can be mass assigned
    protected $fillable = ['title', 'image', 'date', 'tags',];

    public function author()
    {
        return $this->belongsTo(Authur::class, 'author_id');
    }

    function truncatedContent($length, $dots = "...")
    {
        return (strlen($this->content) > $length) ? substr($this->content, 0, $length - strlen($dots)) . $dots : $this->content;
    }
}
