<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Common Functions
    public function sendError($error, $code = 404)
    {
        return response()->json([
            'status' => false,
            'message' => $error,
        ], $code);
    }

    public function sendResponse($result, $message)
    {
        return response()->json([
            'status' => true,
            'data' => $result,
            'message' => $message,
        ]);
    }

    public function removeFile($fileToDelete){
        if (file_exists($fileToDelete)) {
            unlink($fileToDelete);
            return true;
        } else {
            return false;
        }
    }
    
    public function addProduct(Request $request){
        $validator = \Validator::make($request->all(), [
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'product_name'=>'required',
            'spl_price'=>'required',
        ]);

        if ($validator->fails()) {
            $errorMessages = $validator->errors()->toArray();

            foreach ($errorMessages as $field => $messages) {
                return $this->sendError($messages[0]); // Add the first error message for each field
            }
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/product'), $fileName);
        }

        $product = [
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'price' => $request->price,
            'spl_price' => $request->spl_price,
            'short_desc' => $request->short_desc,
            'image' => isset($fileName) ? $fileName : Null,
            'is_active' => $request->is_active,
        ];

        if(!isset($request->id)){
            Product::create($product);
            $message = $request->product_name . " Created Successfully";
        }else{
            $exist_product = Product::find($request->id);
            if(!isset($fileName)){
                $product['image'] = $exist_product->image;
            }else{
                if($exist_product->image !== null){
                    $fileToDelete = public_path('uploads/product/' . $exist_product->image);
                    $this->removeFile($fileToDelete);
                }
            }
            $exist_product->update($product);
            $message = $request->product_name . "Product Updated Successfully";
        }
        return $this->sendResponse($product, $message);
    }

    public function products(){
        $category_id = $_GET['category_id'] != "" ? $_GET['category_id'] : null;
        $search = $_GET['search'] != "" ? $_GET['search'] : null;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $pageSize = isset($_GET['limit']) ? $_GET['limit'] : 10;
        
        $query = Product::whereHas('getCategories', function ($category) {
            $category->where('is_active', 1);
        })->with('getCategories')->orderByDesc('id');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('product_name', 'like', '%' . $search . '%');
            });
        }

        if($category_id !== null){
            $query->where('category_id', $category_id);
        }
        
        $totalCount = $query->count(); // Total Count
        $data = $query->skip(($page - 1) * $pageSize)->take($pageSize)->get(); // Total Data

        $startIndex = $page != 0 ? (($page - 1) * $pageSize + 1) : $page + 1;
        foreach ($data as $key => $value) {
            $data[$key]->sl = $startIndex + $key;
            $data[$key]->image = url('/'). "/"."uploads/product/" . $data[$key]->image;
            $data[$key]->category_name = $data[$key]->getCategories->category_name;
            $data[$key]->active_status = $data[$key]->is_active ? "Active" : "In Active";
        }

        $response = [
            'data' => $data,
            'total' => $totalCount,
        ];

        return $this->sendResponse($response, "Success");
    }

    public function deleteProduct($id){
        $product = Product::find($id);
        if(!$product){
            return $this->sendError('Product id is wrong...');
        }

        $fileToDelete = public_path('uploads/product/' . $product->image);
        $this->removeFile($fileToDelete);

        Product::find($id)->delete();
        return $this->sendResponse($product, $product->product_name . " Has Been Deleted!");
    }
}
