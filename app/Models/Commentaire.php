<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;


    protected $fillable = ['nom' , "email" ,"message", "product_id"];


    public function product(){
        return $this->belongsTo(Product::class); 
    }
}
