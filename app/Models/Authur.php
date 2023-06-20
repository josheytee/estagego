<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authur extends Model
{
    use HasFactory;
    protected $table='authors';
    protected $fillable=['first_name','last_name','image'];
}
