<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', "code", "short_desc", "long_desc", "price",
        "qty", "published"
    ];


    public function tags(){
        return $this->BelongsToMany(Tags::class,"product_tags")
            ->withTimestamps();
    }

    public function categories(){
        return $this->belongsToMany(Category::class)
            ->withTimestamps();

    }

    public function gallery(){
        return $this->hasMany(Gallery::class); 
    }



}
