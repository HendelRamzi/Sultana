<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', "tarif_domicile", "tarif_desk"
    ];


    public function orders(){
        return $this->hasMany(Order::class);
    }

}
