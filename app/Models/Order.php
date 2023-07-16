<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'code', "client_id", "status_id","remarque"
    ]; 

    public function client(){
        return $this->belongsTo(Client::class); 
    }

    public function status(){
        return $this->belongsTo(Status::class); 
    }

    public function products(){
        return $this->belongsToMany(Product::class); 
    }
}
