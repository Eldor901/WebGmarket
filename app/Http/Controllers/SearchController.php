<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\City;
use DB;

class SearchController extends Controller
{
    public function  search(Request $request)
    {
        $city = $request ->input('city');
        $search = $request->input('search');
        $gender = $request->input('gender');
        $typeCloth = $request->input('typeCloth');


        $name_city = $city;
        $search = ( mb_substr($search, 0, -2));

        $search = "%".$search."%";
        $sql = 'SELECT  *  FROM `products`
LEFT JOIN `product_market` ON `products`.id_product = `product_market`.product_id
LEFT JOIN `markets` ON `product_market`.market_id = `markets`.id_market
LEFT JOIN `cities` ON `markets`.id_city = `cities`.id_city
LEFT JOIN `category_product` ON `products`.id_product = `category_product`.id_product
LEFT JOIN `categories` ON `category_product`.id_category = `categories`.id_category
LEFT JOIN `currencies` ON `products`.id_currency = `currencies`.id_currency
WHERE `cities`.name = "'.$name_city.'" AND `products`.name LIKE  "'.$search.'"  AND `categories`.name = "'.$gender.'"
  AND EXISTS(
    select  * FROM `products`
    LEFT JOIN `product_market` ON `products`.id_product = `product_market`.product_id
    LEFT JOIN `markets` ON `product_market`.market_id = `markets`.id_market
    LEFT JOIN `cities` ON `markets`.id_city = `cities`.id_city
    LEFT JOIN `category_product` ON `products`.id_product = `category_product`.id_product
    LEFT JOIN `categories` ON `category_product`.id_category = `categories`.id_category
    LEFT JOIN `currencies` ON `products`.id_currency = `currencies`.id_currency
    WHERE `cities`.name = "'.$name_city.'" AND `products`.name LIKE  "'.$search.'"   AND `categories`.name = "'.$typeCloth.'"
)';



  if ($typeCloth == 'all')
      $sql = 'SELECT  *  FROM `products`
LEFT JOIN `product_market` ON `products`.id_product = `product_market`.product_id
LEFT JOIN `markets` ON `product_market`.market_id = `markets`.id_market
LEFT JOIN `cities` ON `markets`.id_city = `cities`.id_city
LEFT JOIN `category_product` ON `products`.id_product = `category_product`.id_product
LEFT JOIN `categories` ON `category_product`.id_category = `categories`.id_category
LEFT JOIN `currencies` ON `products`.id_currency = `currencies`.id_currency
WHERE `cities`.name = "'.$name_city.'" AND `products`.name LIKE  "'.$search.'"  AND `categories`.name = "'.$gender.'"';


        $products = DB::select($sql);

    return view('product.search',['products' => $products, 'name_city' => $name_city]);
    }

    public function showProduct($product_id)
    {
        $post = Product::findorfail($product_id);

        $comments = $post->comments;



        return view('product.showProduct',  ['comments' => $comments])->withPost($post);
    }


    public function searchUserPosts(Request $request)
    {
        $search = $request->input('searchUserPosts');
        $search = (mb_substr($search, 0, -1));

        if ($search != ' ')
        {

            $postProduct = auth()->user()->market()->first()->products()->Where('name', 'LIKE', '%' . $search . '%')->paginate(30);
        }
        else
        {
            $postProduct = auth()->market()->products()->paginate(30);
        }

        $products = auth()->user()->market()->first()->products()->get();

        return view('product.pages.index',['postProduct' => $postProduct,'product' => $products]);
    }


    public function showPopularProducts($city)
    {
        $sql = 'SELECT *, avg(stars) as avg_stars, COUNT(*) as num FROM `comments`
LEFT JOIN `products` ON `comments`.id_product = `products`.id_product
LEFT JOIN `product_market` ON `products`.id_product = `product_market`.product_id
LEFT JOIN `markets` ON `product_market`.market_id = `markets`.id_market
LEFT JOIN `cities` ON `markets`.id_city = `cities`.id_city
LEFT JOIN `currencies` ON `products`.id_currency = `currencies`.id_currency
WHERE (`cities`.name = "'.$city.'") AND is_approved = 1
GROUP BY `products`.id_product
ORDER BY num DESC;';


        $products = DB::select($sql);
        return view('product.showPopular', ['products' => $products, 'name_city' => $city] );
    }

    public function marketProducts($id_user)
    {
        $post = User::findorfail($id_user);

        $products = $post->market->products;

        $name_city = "all";

        return view('product.search', ['products' => $products, 'name_city' => $name_city]);
    }
}
