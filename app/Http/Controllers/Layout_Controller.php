<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contact;
use App\Info;
use App\Intro;
use App\Product;
use App\Setting;
use Illuminate\Http\Request;

class Layout_Controller extends Controller
{
    public function master(){
        return view('layout.master');
    }
    public function index(){
        $cate = Category::all();
        $hotInfos = Info::inRandomOrder()->limit(4)->get();
//        $sellings = Product::orderBy('purchases', 'desc')->limit(4)->get();
        return view('main.index', ['cate'=>$cate,'hotInfos'=>$hotInfos]);
    }
    public function gioithieu(){
        $intros = Intro::all();
        $cate = Category::all();
        $hotInfos = Info::inRandomOrder()->limit(3)->get();
        return view('main.gioithieu',compact('intros','hotInfos','cate'));
    }
    public function tintuc(){
        $infos = Info::paginate(3);
        $cate = Category::all();
        $hotInfos =Info::inRandomOrder()->limit(3)->get();
        return view('main.tintuc',compact('infos','hotInfos','cate'));
    }
    public function lienhe(){

        $hotInfos = Info::inRandomOrder()->limit(3)->get();
        $cate = Category::all();
        return view('main.lienhe',compact('hotInfos','cate'));
    }

    public function lienhes(Request $request){
        $contacts = Contact::create([
            'name'=> $request->name,
            'email'=> $request->mail,
            'address'=> $request->address,
            'phone'=> $request->phone,
            'contents'=>$request->contents
        ]);
        return redirect() -> route('index');
    }
    public function sanpham(){
        $products = Product::all();
        $cate = Category::all();
        $hotInfos = Info::inRandomOrder()->limit(3)->get();
        return view('main.sanpham',compact('products','hotInfos','cate'));
    }
    public function sanphamchitiet($id){
        $product = Product::where('id',$id)->first();
        $productRelated = Product::where('category_id',$product->category_id)->inRandomOrder()->whereNull('deleted_at')->limit(4)->get();
        $cate = Category::all();
        return view('main.sanphamchitiet',compact('cate','product','productRelated'));
    }
    public function loaisanpham($slug){
        $hotInfos = Info::inRandomOrder()->limit(3)->get();
        $cate1 = Category::where('slug', $slug)->first();
        $products = Product::where('category_id', $cate1->id)->paginate(5);
        $cate = Category::all();
        return view('list_categories.index',compact('hotInfos','categories', 'products', 'cate', 'cate1'));
    }

    public function tintucchitiet($id){
        $infos = Info::all();
        $hotInfos =Info::inRandomOrder()->limit(3)->get();
        $cate = Category::all();

        $inf = Info::find($id);

        return view('list_categories.tintucchitiet',compact('hotInfos','cate','infos', 'inf'));
    }
}
