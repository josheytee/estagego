<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;
    protected $table='contacts';
    protected $fillable=['name','email','company_name','country','phone','website','message','agreement'];

}
