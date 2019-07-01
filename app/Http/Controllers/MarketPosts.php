<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Storage;

use DB;


class MarketPosts extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postProduct = auth()->user()->products()->paginate(30);
        $products = auth()->user()->products()->get();

        return view('product.pages.index',['postProduct' => $postProduct, 'product' => $products]);
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.pages.create',
            ['user' => [], 'products' => Product::get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $path = $request->file('url_product')->store('uploads', 'public');
        $post = new product();
        $post -> name_product = $request -> product_type;
        $post -> url_product = $path;
        //$post -> url_product = $request-> photo_upload;
        $post -> description_product = $request-> photo_description;
        $post -> price = $request-> price;

        $post -> save();

        $user_id = auth()->user('id_market');
        $id_product = $post-> id_product;

        $user_id -> products()->attach($id_product);

        session()->flash('notif', 'Succses in saving product');

       return redirect()->route('addForm.show', $post->id_product);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_product)
    {
        $post = Product::findOrFail($id_product);

        return view('product.pages.create')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_product)
    {
        $post = Product::findOrFail($id_product);

        return view('product.pages.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_product)
    {
        $post = Product::findOrFail($id_product);

        if ($request->hasFile('url_product'))
        {
            Storage::disk('public')->delete($post->url_product);
            $path = $request->file('url_product')->store('uploads', 'public');
            $post->url_product = $path;
        }
        $post -> name_product = $request -> product_type;
        $post -> description_product = $request-> photo_description;
        $post -> price = $request-> price;
        $post -> isApproved = '0';

        $post->save();
        return redirect()->route('addForm.index', $post->id_product);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_product)
    {
        $post = Product::findOrFail($id_product);
        $post -> delete();

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
