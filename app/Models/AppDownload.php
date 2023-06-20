<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppDownload extends Model
{
    use HasFactory;
    protected $table='appdownloads';
    protected $fillable=['title','content','image','url'];
}
