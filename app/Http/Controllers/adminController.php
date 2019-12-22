<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;
use App\Exceptions;
use Illuminate\Validation\ValidationException;

class adminController extends Controller
{
    public function admin()
    {

        return view('admin.admin');
    }

    public function controlProducts()
    {
        $postProduct = Product::where('isApproved', '0')->paginate(30);

        if (Auth::user()->isAdmin == 1) {
            return view('admin.controlProduct')->withpostProduct($postProduct);
        }
        return abort(404);
    }

    public function controlMarkets(User $user)
    {
        $postMarket = User::all();
        if (Auth::user()->isAdmin == 1) {
            return view('admin.controlMarket')->withpostMarket($postMarket);
        }
        return abort(404);
    }

    public function destroyProduct(Request $request)
    {
        if($request->ajax()){
            try
            {
                $post = Product::find($request->input('id'));
                $post->delete();
            }
            catch (Exception $e)
            {
                throw new Exception($e->getMessage());
            }
        }

    }

    public function destroyMarket(Request $request)
    {

        if ($request->ajax()){
            try {

                $post = User::find($request->input('id'));
                $post->delete();
            }
            catch(Exception $e)
            {
                throw new Exception($e->getMessage());
            }
        }

    }


    public function UpdateApprovement(Request $request)
    {
        if ($request->ajax()){
            try {
                $post = Product::find($request->input('id'));
                $post->isApproved = '1';
                $post->save();
            }
            catch (Exception $e)
            {
                throw new Exception('Bad request');
            }
        }
    }


    public function controlComments()
    {
        $comments = Comment::where('is_approved', '0')->paginate(20);

        if (Auth::user()->isAdmin == 1) {
            return view('admin.controlComments', ['comments' => $comments]);
        }

        return abort(404);

    }

    public function destroyComments(Request $request)
    {
        if($request->ajax()){
            try
            {
                $post = Comment::find($request->input('id'));
                $post->delete();
            }
            catch (Exception $e)
            {
                throw new Exception($e->getMessage());
            }
        }
    }
}
