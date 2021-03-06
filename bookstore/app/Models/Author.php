<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable =[
        'full_name',
        'birth_date',
        'country',

    ];

    public function books(){
        $this->hasMany(Books::class);
    }
   
}
