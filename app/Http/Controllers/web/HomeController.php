<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use DB;


class HomeController extends Controller
{
    public function index(){
        $categories = Category::get();
        $grocery_products = [];
        Product::where('category_id', 1)->chunk(2, function ($products) use (&$grocery_products) {
            $grocery_products[] = $products;
        });
        $fragrance_products = [];
        Product::where('category_id', 6)->chunk(2, function ($products) use (&$fragrance_products) {
            $fragrance_products[] = $products;
        });
        $shops = Shop::take(10)->get();
        $subcategories = [];
        foreach ($categories as $key => $value) {
            $subcategories[]= $categories[$key]->getSubcategories[0];
        }
        return view('web/pages/home', compact(['subcategories', 'shops', 'grocery_products', 'fragrance_products']));
    }

    public function findProduct($id){
        $filteredData = array_values(array_filter($this->products, function ($item) use ($id) {
            return $item['id'] == $id;
        }));
        if(!$filteredData){
            return "1";
        }
        $filteredData[0]['image'] = 'http://localhost:8000/web/assets/images/product/category/'.$filteredData[0]["id"].'.jpg';
        return $filteredData[0];
    }

    public function getSingleProduct($id){
        $product = $this->findProduct($id);
        return view('web.components.product_quickview_details', compact('product'));
    }

    public function addToCart($id){
        $product = Product::find($id);
        $type = isset($_GET['type']) ? $_GET['type'] : 1;
        // Check if the product exists
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Add the product to the cart
        $cart = session()->get('cart');

        // If the cart is empty, create a new one
        if (!$cart) {
            $cart = [
                $id => [
                    'name' => $product['name'],
                    'quantity' => 1,
                    'price' => $product['price'],
                    'spl_price' => $product['spl_price'],
                    'image' => $product['image'],
                    // Add other product details you may need
                ]
            ];
            session()->put('cart', $cart);
            return response()->json(['data'=> ['quantity' =>$cart[$id]['quantity']], 'message' => 'Product added to cart']);
        }

        // If the product is already in the cart, update the quantity
        if (isset($cart[$id])) {
            if($type == 1){
                $cart[$id]['quantity'] += 1;
            }else if($type == 2){
                if($cart[$id]['quantity'] > 1){
                    $cart[$id]['quantity'] -= 1;
                }
            }
            
            session()->put('cart', $cart);
            return response()->json(['data'=> ['quantity' =>$cart[$id]['quantity']], 'message' => 'Product quantity updated in cart']);
        }

        // If the product is not in the cart, add it
        $cart[$id] = [
            'name' => $product['name'],
            'quantity' => 1,
            'price' => $product['price'],
            // Add other product details you may need
        ];
        session()->put('cart', $cart);
        return response()->json(['data'=> ['quantity' =>$cart[$id]['quantity']], 'message' => 'Product added to cart']);
    }

    public function products(Request $request){
        $title = "";
        $query = Product::with('getSubcategories')->orderBy('id', 'desc');
        $category = 0;
        $subcategory = [];
        $price = [];
        
        if(isset($request->category)){
            if($request->category > 0){
                $category = Category::find($request->category);
                $title = $category->category_name . ", ";
                $category = $category->id;
                $query->where('category_id', $request->category);
            }
        }

        if(isset($request->subcategory)){
            $subcategories_arr = json_decode($request->subcategory);
            if(count($subcategories_arr) > 0){
                $subcategories = Subcategory::whereIn('id',$subcategories_arr)->get();
                if(count($subcategories) > 0){
                    foreach ($subcategories as $key => $value) {
                        $comma = count($subcategories) !== ($key + 1) ? ', ' : '';
                        $title.= $value->subcategory_name. $comma;
                        $subcategory[]= $value->id;
                    }
                    $query->whereIn('subcategory_id', $subcategories_arr); 
                }
            }
        }

        $subcategory = json_encode($subcategory);

        if(isset($request->price)){
            $price = explode(";", $request->price);
            $query->where('price', '>=', $price[0]); 
            $query->where('price', '<=', $price[1]);
        }

        $products = $query->paginate(12);
        return view('web/pages/products', compact(['products', 'title', 'category', 'subcategory', 'price']));
    }

    public function getTotalProductsCat(Request $request){
        $cat_pro_count = Subcategory::select(
            'subcategories.*',
            DB::raw('COUNT(products.id) as product_count')
        )
        ->join('products', 'products.subcategory_id', 'subcategories.id');
        if($request->search !== ""){
            $cat_pro_count->where('subcategories.subcategory_name', 'LIKE', '%'.$request->search.'%');
        }
        if($_GET['category'] > 0){
            $cat_pro_count->where('subcategories.category_id', $request->category);
        }
        $cat_pro_count->groupBy('subcategories.id');
        $cat_pro_count = $cat_pro_count->get();
        $subcategory = explode(",", $request->subcategory);
        return view('web/components/products/filter_by_category', compact(['cat_pro_count', 'subcategory']));
    }

    public function productSingle($id){
        $product = $this->findProduct($id);
        $products = $this->products;
        return view('web/pages/product_single', compact(['product', 'products']));
    }
}