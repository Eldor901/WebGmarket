<?php

namespace App\Http\Controllers;

use App\Category;
use App\Currency;
use App\User;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Market;

use DB;


class MarketPosts extends Controller
{
    public function index(Request $request)
    {
        $postProduct = auth()->user()->market()->first()->products()->paginate(30);
        $products = auth()->user()->market()->first()->products()->get();

        return view('product.pages.index',['postProduct' => $postProduct, 'product' => $products]);
    }


    public function create()
    {
        return view('product.pages.create',
            ['user' => [], 'products' => Product::get(), 'currencies' => Currency::all(), 'categories' => Category::all()]);
    }

    public function store(Request $request)
    {

        $path = $request->file('url_product')->store('uploads', 'public');
        $post = new product();
        $post -> name = $request -> product_type;
        $post -> url = $path;
        //$post -> url_product = $request-> photo_upload;
        $post -> description = $request-> photo_description;
        $post -> price = $request-> price;
        $post->id_currency = $request -> currency;
        $post -> save();
        $id_product = $post-> id_product;

        $id_market = Auth::user()->market('id_market')->first();
        $id_market->products()->attach($id_product);

        if($request->input('categories')):
            $post->category()->attach($request->input('categories'));
         endif;

        session()->flash('notif', 'Succses in saving product');

       return redirect()->route('addForm.show', $post->id_product);

    }

    public function show($id_product)
    {
        $post = Product::findOrFail($id_product);
        return view('product.pages.create',['post' => $post, 'currencies' => Currency::All(),  'categories' => Category::all()]);
    }


    public function edit($id_product)
    {
        $post = Product::findOrFail($id_product);

        return view('product.pages.edit', ['post' => $post, 'currencies' => Currency::All(),  'categories' => Category::all()] );
    }

    public function update(Request $request, $id_product)
    {
        $post = Product::findOrFail($id_product);

        if ($request->hasFile('url_product'))
        {
            Storage::disk('public')->delete($post->url);
            $path = $request->file('url_product')->store('uploads', 'public');
            $post->url = $path;
        }


        $post -> name = $request -> name;
        $post -> description = $request-> description;
        $post -> price = $request-> price;
        $post->id_currency = $request -> currency;
        $post -> isApproved = '0';
        $post -> save();

        $post->category()->detach();

        if($request->input('categories')):
            $post->category()->attach($request->input('categories'));
        endif;


        return redirect()->route('addForm.index', $post->id_product);

    }


    public function destroy($id_product)
    {
        $post = Product::findOrFail($id_product);
        $post -> delete();
        $id_market = Auth::user()->market('id_market')->first();
        $id_market->products()->detach($id_product);

        return redirect() -> route('addForm.index');
    }

    public function deleteProduct(Request $request)
    {
        if ($request->ajax()) {
            $post = Product::findOrFail($request->input('id'));
            $post->delete();
        }
    }

}
