<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable =[
        'name', 
        'publisher', 
        'short_description',
        'year out'
    ];

    public function author(){
        $this->belongsTo(Author::class);
    }

    public function users(){
        $this->belongsToMany(User::class);
    }
}
