<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelMarket extends Model
{
    protected $table='markets';
    protected $fillable=['name', 'image', 'quant', 'price', 'percentage', 'total', 'id_type'];
    
    public function relTypes(){
        return $this->hasOne('App\Models\ModelType', 'id', 'id_type');
    }
    public function relSale()
    {
        return $this->hasMany('App\Models\ModelSale', 'id_sale');
    }
}
