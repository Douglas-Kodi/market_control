<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelSale extends Model
{
    protected $table='sales';
    protected $fillable=['quant', 'price', 'id_user', 'id_market'];

    public function relUser(){
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
    public function relMarkets(){
        return $this->hasOne('App\Models\ModelMarket', 'id', 'id_market');
    }
}
