<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        "name", "desc", 'collection_id', 
    ];


    public function collection(){
        return $this->belongsTo(Collection::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
