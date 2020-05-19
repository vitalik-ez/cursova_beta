<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function basket(){
        $orderId = session('orderId');
        if(is_null($orderId)){
            $order = Order::create();
            session(['orderId'=>$order->id]);
        }else{
            $order = Order::find($orderId);
        }
        return view('basket',compact('order'));
    }


    public function basketPlace(){
        $orderId = session('orderId');
        if(is_null($orderId)){
            return redirect()->route('home');
        }
        $order = Order::find($orderId);
        return view('order', compact('order'));
    }
    public function basketConfirm(Request $request){
        $orderId = session('orderId');
        if(is_null($orderId)){
            return redirect()->route('home');
        }
        $order = Order::find($orderId);

        /*$request = $request->validate([
            'surname' => 'required|min:2|max:20',
            'name' => 'required|min:2|max:20',
            'email' => 'required|min:2|max:20',
            'phone' => 'required|min:5|max:12',
            'address' => 'required|min:5|max:50',
            ]);*/

        $result = $order->saveOrder($request);

        if($result){
            session()->flash('success','Ваше замовлення прийнято!');
        }else{
            session()->flash('warning','Помилка при підтверджинні товару!');
        }

        return redirect()->route('home');
    }

    public function basketAdd($productId){
        $orderId = session('orderId');
        if(is_null($orderId)){
            $order = Order::create();
            session(['orderId'=>$order->id]);
        }else{
            $order = Order::find($orderId);
        }
        if($order->products->contains($productId)){
            $pivotRow = $order->products()->where('product_id',$productId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        }else{
            $order->products()->attach($productId);
        }
        return redirect()->route('basket');
    }

    public function basketRemove($productId){
        $orderId = session('orderId');
        /*Можна не перевіряти так як цей товар вже є в корзині*/
        if(is_null($orderId)){
            return redirect()->route('basket');
        }
        /**/
        $order = Order::find($orderId);
        if($order->products->contains($productId)){
            $pivotRow = $order->products()->where('product_id',$productId)->first()->pivot;
            if($pivotRow->count < 2){
                $order->products()->detach($productId);
            }else{
                $pivotRow->count--;
                $pivotRow->update();
            }

        }
        return redirect()->route('basket');
    }

    public function basketRemoveProduct($productId){
        $orderId = session('orderId');
        /*Можна не перевіряти так як цей товар вже є в корзині*/
        if(is_null($orderId)){
            return redirect()->route('basket');
        }
        /**/
        $order = Order::find($orderId);
        if($order->products->contains($productId)){
            $order->products()->detach($productId);
        }
        return redirect()->route('basket');
    }
}
