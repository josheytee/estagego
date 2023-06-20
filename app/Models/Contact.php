<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table='contacts';
    protected $fillable=['country','address','email','phone_number','mobile','facebook_url','twitter_url','linkedin_url','tiktok_url'];
}
