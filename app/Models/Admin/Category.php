<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function products(){
        return $this->hasMany(Product::class);
    }
}
