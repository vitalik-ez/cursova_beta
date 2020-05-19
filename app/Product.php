<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{

    public function goals(){
        return $this->belongsToMany(Goal::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getPriceForCount(){
        if(!is_null($this->pivot)){
            return $this->pivot->count * $this->price;
        }
        return $this->price;
    }
}
