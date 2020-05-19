<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Category;
use App\Product;
use App\Question;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;

class PageController extends Controller{

    public function home(){
        $products = Product::all();
        return view('home', ['products' => $products]);
    }

    public function contact(){
        return view('contact');
    }
    public function contactConfirm(Request $request){
        $question = new Question();
        $question->name = $request->name;
        $question->phone = $request->phone;
        $question->email = $request->email;
        $question->question = $request->question;
        $question->save();
        return redirect()->route('contact');
    }

    public function categories(){
        $categories = Category::all();
        return view('categories', compact('categories'));
    }
    public function getCategory($id){
        $categories = Category::all();
        return view('categories', ['categories'=>$categories, 'id'=>$id]);
    }
}
