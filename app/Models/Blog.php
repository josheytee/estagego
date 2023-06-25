<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Authur;

class Blog extends Model
{
    use HasFactory;
    
    //changing the table name from default to 'about_us'
    Protected $table='blogs';
							
    //activating mass assignment by using fillable property signifiying the columns that can be mass assigned
    Protected $fillable= ['title','image','date','tags',];

    public function Author(){
        return $this->belongsTo(Authur::class,'author_id');
    }
}
