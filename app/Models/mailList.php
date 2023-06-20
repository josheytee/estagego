<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mailList extends Model
{
    use HasFactory;
    protected $table='mail_lists';
    protected $fillable=['first_name','last_name','email','phone','country'];
}
