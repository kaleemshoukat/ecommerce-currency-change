<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\SupportedCurrency;
use Illuminate\Http\Request;
use AmrShawky\LaravelCurrency\Facade\Currency;

class ProductsController extends Controller
{
    public function index(){
        $products=Product::with('product_sizes.sizes')->paginate(8);
        $currency=SupportedCurrency::where('default', 1)->first();

        if ($currency->name=='USD'){
            $convert_rate=1;
        }
        else{
            $convert_rate=Currency::convert()->from('USD')->to($currency->name)->get();
        }

        return view('products', compact('products', 'currency', 'convert_rate'));
    }

    public function changeCurrency($id){
        SupportedCurrency::where('default', 1)->update(['default'=>0]);
        SupportedCurrency::where('id', $id)->update(['default'=>1]);

        return redirect()->back();
    }

    public function addToCart(Request $request){
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required',
            'size_id' => 'required',
        ]);

        $cart=new Cart();
        $cart->ip_address=$request->ip();
        $cart->product_id=$request->product_id;
        $cart->quantity=$request->quantity;
        $cart->size_id=$request->size_id;
        $cart->save();
    }

}
