<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Supplier;

class Products extends Model
{
    public function supplier(){
        return $this->belongsTo(Suppliers::class, 'supplier_id' , 'id');
    }

    public function category(){
        return $this->belongsTo(Categories::class, 'category_id' , 'id');
    }

    public function unit(){
        return $this->belongsTo(Units::class, 'unit_id' , 'id');
    }
}