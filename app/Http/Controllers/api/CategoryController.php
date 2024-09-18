<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Shop;


class CategoryController extends Controller
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

    public function addCategory(Request $request){
        $validator = \Validator::make($request->all(), [
            'category_name'=>'required'
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
            $file->move(public_path('uploads/category'), $fileName);
        }

        $category = [
            'category_name' => $request->category_name,
            'image' => isset($fileName) ? $fileName : Null,
            'is_active' => $request->is_active,
        ];

        if(!isset($request->id)){
            Category::create($category);
            $message = "Category Created Successfully";
        }else{
            $exist_category = Category::find($request->id);
            if(!isset($fileName)){ // 
                $category['image'] = $exist_category->image;
            }else{
                if($exist_category->image !== null){
                    $fileToDelete = public_path('uploads/category/' . $exist_category->image);
                    $this->removeFile($fileToDelete);
                }
            }
            $exist_category->update($category);
            $message = "Category Updated Successfully";
        }
        return $this->sendResponse($category, $message);
    }

    public function categories(){
        $search = isset($_GET['search']) ? $_GET['search'] : null;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $pageSize = isset($_GET['limit']) ? $_GET['limit'] : 10;

        $query = Category::orderBy('id', 'DESC');
        // Apply search condition
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('category_name', 'like', '%' . $search . '%');
            });
        }
        if (isset($_GET['subcat'])) {
            $query->where('is_active', 1);
        }
        
        $totalCount = $query->count(); // Total Count
        
        if (isset($_GET['subcat'])) {
            $data = $query->get(); // Total Data
        }else{
            $data = $query->skip(($page - 1) * $pageSize)->take($pageSize)->get(); // Total Data
        }
        

        $startIndex = $page != 0 ? (($page - 1) * $pageSize + 1) : $page + 1;
        foreach ($data as $key => $value) {
            $data[$key]->sl = $startIndex + $key;
            $data[$key]->image = url('/'). "/"."uploads/category/" . $data[$key]->image;
            $data[$key]->active_status = $data[$key]->is_active ? "Active" : "In Active";
            $data[$key]->label = $data[$key]->category_name;
        }

        $response = [
            'data' => $data,
            'total' => $totalCount,
        ];

        return $this->sendResponse($response, "Success");
    }

    public function deleteCategory($id){
        $category = Category::find($id);
        if(!$category){
            return $this->sendError('Category id is wrong...');
        }

        $fileToDelete = public_path('uploads/category/' . $category->image);
        $this->removeFile($fileToDelete);

        Category::find($id)->delete();
        return $this->sendResponse($category, $category->category_name . " Has Been Deleted!");
    }

    public function addSubCategory(Request $request){
        $validator = \Validator::make($request->all(), [
            'category_id'=>'required',
            'subcategory_name'=>'required',
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
            $file->move(public_path('uploads/subcategory'), $fileName);
        }

        $subcategory = [
            'subcategory_name' => $request->subcategory_name,
            'category_id' => $request->category_id,
            'image' => isset($fileName) ? $fileName : Null,
            'is_active' => $request->is_active,
        ];

        if(!isset($request->id)){
            Subcategory::create($subcategory);
            $message = $request->subcategory_name . "Subcategory Created Successfully";
        }else{
            $exist_subcategory = Subcategory::find($request->id);
            if(!isset($fileName)){
                $subcategory['image'] = $exist_subcategory->image;
            }else{
                if($exist_subcategory->image !== null){
                    $fileToDelete = public_path('uploads/subcategory/' . $exist_subcategory->image);
                    $this->removeFile($fileToDelete);
                }
            }
            $exist_subcategory->update($subcategory);
            $message = $request->subcategory_name . "Subcategory Updated Successfully";
        }
        return $this->sendResponse($subcategory, $message);
    }

    public function subcategories(){
        $category_id = $_GET['category_id'] != "" ? $_GET['category_id'] : null;
        $search = $_GET['search'] != "" ? $_GET['search'] : null;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $pageSize = isset($_GET['limit']) ? $_GET['limit'] : 10;
        
        $query = Subcategory::whereHas('getCategories', function ($category) {
            $category->where('is_active', 1);
        })->with('getCategories')->orderByDesc('id');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('subcategory_name', 'like', '%' . $search . '%');
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
            $data[$key]->image = url('/'). "/"."uploads/subcategory/" . $data[$key]->image;
            $data[$key]->category_name = $data[$key]->getCategories->category_name;
            $data[$key]->active_status = $data[$key]->is_active ? "Active" : "In Active";
        }

        $response = [
            'data' => $data,
            'total' => $totalCount,
        ];

        return $this->sendResponse($response, "Success");
    }

    public function deleteSubcategory($id){
        $subcategory = Subcategory::find($id);
        if(!$subcategory){
            return $this->sendError('Subcategory id is wrong...');
        }

        $fileToDelete = public_path('uploads/subcategory/' . $subcategory->image);
        $this->removeFile($fileToDelete);

        Subcategory::find($id)->delete();
        return $this->sendResponse($subcategory, $subcategory->subcategory_name . " Has Been Deleted!");
    }

    public function addShop(Request $request){
        $validator = \Validator::make($request->all(), [
            'shop_name'=>'required',
            'owner_name'=>'required',
            'short_desc'=>'required',
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
            $file->move(public_path('uploads/shop'), $fileName);
        }

        $shop = [
            'shop_name' => $request->shop_name,
            'owner_name' => $request->owner_name,
            'short_desc' => $request->short_desc,
            'image' => isset($fileName) ? $fileName : Null,
            'is_active' => $request->is_active,
        ];

        if(!isset($request->id)){
            Shop::create($shop);
            $message = $request->shop_name . " Created Successfully";
        }else{
            $exist_shop = Shop::find($request->id);
            if(!isset($fileName)){
                $shop['image'] = $exist_shop->image;
            }else{
                if($exist_shop->image !== null){
                    $fileToDelete = public_path('uploads/shop/' . $exist_shop->image);
                    $this->removeFile($fileToDelete);
                }
            }
            $exist_shop->update($shop);
            $message = $request->shop_name . " Updated Successfully";
        }
        return $this->sendResponse($shop, $message);
    }

    public function shops(){
        $search = isset($_GET['search']) ? $_GET['search'] : null;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $pageSize = isset($_GET['limit']) ? $_GET['limit'] : 10;

        $query = Shop::orderBy('id', 'DESC');
        // Apply search condition
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('shop_name', 'like', '%' . $search . '%');
                $q->where('owner_name', 'like', '%' . $search . '%');
            });
        }
        $totalCount = $query->count(); // Total Count
        $data = $query->skip(($page - 1) * $pageSize)->take($pageSize)->get(); // Total Data

        $startIndex = $page != 0 ? (($page - 1) * $pageSize + 1) : $page + 1;
        foreach ($data as $key => $value) {
            $data[$key]->sl = $startIndex + $key;
            $data[$key]->image = url('/'). "/"."uploads/shop/" . $data[$key]->image;
            $data[$key]->shop_name = $data[$key]->shop_name;
            $data[$key]->active_status = $data[$key]->is_active ? "Active" : "In Active";
        }

        $response = [
            'data' => $data,
            'total' => $totalCount,
        ];

        return $this->sendResponse($response, "Success");
    }

    public function deleteShop($id){
        $shop = Shop::find($id);
        if(!$shop){
            return $this->sendError('Shop id is wrong...');
        }

        $fileToDelete = public_path('uploads/shop/' . $shop->image);
        $this->removeFile($fileToDelete);

        Shop::find($id)->delete();
        return $this->sendResponse($shop, $shop->shop_name . " Has Been Deleted!");
    }
    
    public function getSubcategoryByCategory($category_id){
        $subcategories = Subcategory::where('category_id', $category_id)->get();
        return $this->sendResponse($subcategories, 'Success.');
    }
    
}
