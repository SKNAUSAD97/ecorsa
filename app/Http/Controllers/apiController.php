<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Englis;

class apiController extends Controller
{
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

    public function loginSubmit(Request $request){
        if(!isset($request->email) || !isset($request->password)){
            return response()->json(['message' => 'Email Or Password Not Provided.'], 400);
        }
        if (\Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = User::where('email', strval($request->email))->first();
            $user->photo = json_decode($user->photo);
            return response()->json(['status' => 200, 'message' => 'Login Successful...','user' => $user, 'token' => $user->createToken("API TOKEN")->plainTextToken,], 200);
        }else{
            return response()->json(['message' => 'Invalid Credentials Provided...'], 400);
        }
    }

    public function addUser(Request $request)
    {
        // Check if it's an update operation (isset(id))
        if (isset($request->id)) {
            $validator = \Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'mobile' => 'required',
                'state' => 'required',
            ]);
        } else {
            // For creating a new user
            $validator = \Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'mobile' => 'required',
                'password' => 'required',
                'state' => 'required',
            ]);
        }

        // Validation failure response
        if ($validator->fails()) {
            $errorMessages = $validator->errors()->toArray();
            foreach ($errorMessages as $field => $messages) {
                return $this->sendError($messages[0]); // Return first error message
            }
        }

        // Prepare user data
        $users = [
            "name" => $request->name,
            "mobile" => $request->mobile,
            "email" => $request->email,
            "state" => $request->state,
            "address" => $request->address,
            "pin" => $request->pin,
        ];

        // Handle image upload  
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $photo = [
                'type' => 'default',
                'secure_url' => $filename
            ];
            $users['photo'] = json_encode($photo);
        } else {
            if (isset($request->id)) {
                $existing_user = User::find($request->id);
                $users['photo'] = $existing_user->photo; // Retain existing photo if no new image uploaded
            }
        }

        // Update or create user
        if (isset($request->id)) {
            User::find($request->id)->update($users);
            $message = "User Updated Successfully";
        } else {
            $users['password'] = bcrypt($request->password); // Hash password for new user
            User::create($users);
            $message = "User Created Successfully";
        }

        // Return response
        return $this->sendResponse($users, $message);
    }

    public function deleteUser($id){
        $user = User::find($id);
        if(!$user){
            return $this->sendError('User id is wrong...');
        }
        User::find($id)->delete();
        return $this->sendResponse($user, $user->name . " User Has Been Deleted!");
    }

    public function getUser(){
        $search = isset($_GET['search']) ? $_GET['search'] : null;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $pageSize = isset($_GET['limit']) ? $_GET['limit'] : 10;

        $query = User::where('id', '!=',  Auth::user()->id)->orderBy('id', 'DESC');
        // Apply search condition
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('mobile', 'like', '%' . $search . '%');
            });
        }
        $totalCount = $query->count(); // Total Count
        $users = $query->skip(($page - 1) * $pageSize)->take($pageSize)->get(); // Total Data

        $startIndex = $page != 0 ? (($page - 1) * $pageSize + 1) : $page + 1;
        foreach ($users as $key => $value) {
            $users[$key]->sl = $startIndex + $key;
            $users[$key]->photo = json_decode($value->photo);
        }

        $response = [
            'users' => $users,
            'total' => $totalCount,
        ];

        return $this->sendResponse($response, "Success");
    }

    public function getWord() {
        $search = isset($_GET['search']) ? $_GET['search'] : null;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $pageSize = isset($_GET['limit']) ? $_GET['limit'] : 10;
        $startDate = isset($_GET['startDate']) ? $_GET['startDate'] : null;
        $endDate = isset($_GET['clsendDate']) ? $_GET['endDate'] : null;
    
        $query = Englis::orderBy('id', 'DESC');
        
        // Apply search condition
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('word', 'like', '%' . $search . '%');
            });
        }
    
        // Apply date range condition
        if ($startDate && $endDate) {
            $query->whereDate('created_at', '>=', $startDate)
                ->whereDate('created_at', '<=', $endDate);
        }
    
        $totalCount = $query->count(); // Total Count
        $word = $query->skip(($page - 1) * $pageSize)->take($pageSize)->get(); // Total Data
    
        $startIndex = $page != 0 ? (($page - 1) * $pageSize + 1) : $page + 1;
        foreach ($word as $key => $value) {
            $word[$key]->sl = $startIndex + $key;
            $word[$key]->sentences = json_decode($value->sentences);
        }
    
        $response = [
            'word' => $word,
            'total' => $totalCount,
        ];
    
        return $this->sendResponse($response, "Success");
    }
    

    

    public function storeWord(Request $request){
        $word = [
            "word" => $request->word,
            "sentences" => json_encode($request->sentences)
        ];

        Englis::create($word);
        return $this->sendResponse($word, 'New Word Has Been Created.');
    }


    //APIs 

    public function sportsFacilities(){
        $search = isset($_GET['search']) ? $_GET['search'] : null;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $pageSize = isset($_GET['limit']) ? $_GET['limit'] : 10;

        $query = facilities::orderBy('id', 'desc')->get();
        // Apply search condition
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('mobile', 'like', '%' . $search . '%');
            });
        }
        $totalCount = $query->count(); // Total Count
        $facilities = $query->skip(($page - 1) * $pageSize)->take($pageSize)->get(); // Total Data

        $startIndex = $page != 0 ? (($page - 1) * $pageSize + 1) : $page + 1;
        foreach ($facilities as $key => $value) {
            $facilities[$key]->sl = $startIndex + $key;
            $facilities[$key]->photo = json_decode($value->photo);
        }

        $response = [
            'facilities' => $facilities,
            'total' => $totalCount,
        ];

        return $this->sendResponse($response, "Success");
    }

    public function addFacilities(Request $request)
    {
        // Check if it's an update operation (isset(id))
        if (isset($request->id)) {
            $validator = \Validator::make($request->all(), [
                'name' => 'required|unique:facilities',
                'summary' => 'required',
                'description' => 'required',
            ]);
        } else {
            // For creating a new facility
            $validator = \Validator::make($request->all(), [
                'name' => 'required|unique:facilities',
                'summary' => 'required',
                'description' => 'required',
            ]);
        }

        // Validation failure response
        if ($validator->fails()) {
            $errorMessages = $validator->errors()->toArray();
            foreach ($errorMessages as $field => $messages) {
                return $this->sendError($messages[0]); // Return first error message
            }
        }

        // Prepare user data
        $facilities = [
            "name" => $request->name,
            "summary" => $request->summary,
            "description" => $request->description,
        ];

        // Handle image upload  
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $photo = [
                'type' => 'default',
                'secure_url' => $filename
            ];
            $facilities['photo'] = json_encode($photo);
        } else {
            if (isset($request->id)) {
                $existing_user = User::find($request->id);
                $facilities['photo'] = $existing_user->photo; // Retain existing photo if no new image uploaded
            }
        }

        // Update or create user
        if (isset($request->id)) {
            User::find($request->id)->update($facilities);
            $message = "User Updated Successfully";
        } else {
            $facilities['password'] = bcrypt($request->password); // Hash password for new user
            User::create($facilities);
            $message = "User Created Successfully";
        }

        // Return response
        return $this->sendResponse($users, $message);
    }


}
