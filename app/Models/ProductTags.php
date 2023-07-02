<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTags extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', "tags_id"
    ];



    protected $table = "product_tags"; 
}
