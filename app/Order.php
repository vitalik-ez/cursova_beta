<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function getFullPrice(){
        $sum = 0;
        foreach($this->products as $product){
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }

    public function saveOrder($request){
        /*якщо в табл order status == 0*/
        if($this->status == 0){
            $this->surname = $request->surname;
            $this->name = $request->name;
            $this->phone = $request->phone;
            $this->email = $request->email;
            $this->address = $request->address;
            $this->status = 1;
            $this->save();
            session()->forget('orderId');
            return true;
        }else{
            return false;
        }

    }
}
