<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;
    protected $table='homes';
    Protected $fillable= ['page_title', 'h1', 'h2_orange', 'h2', 'caption', 'appstore_url','googleplay_url','video_url','video_url','total_users','total_downloads','total_household','total_cities','total_countries','metatags','keywords','description'];
}
