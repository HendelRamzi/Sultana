<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', "code", "short_desc", "long_desc", "price",
        "qty", "published", "folder", "thumb"
    ];


    public function tags(){
        return $this->BelongsToMany(Tags::class,"product_tags")
            ->withTimestamps();
    }

    public function categories(){
        return $this->belongsToMany(Category::class)
            ->withTimestamps();

    }


    public function collection(){
        return $this->belongsTo(Collection::class); 
    }

    public function gallery(){
        return $this->hasMany(Gallery::class); 
    }

    public function orders(){
        return $this->belongsToMany(Order::class); 
    }


    public function avis(){
        return $this->HasMany(Commentaire::class); 
    }

}
