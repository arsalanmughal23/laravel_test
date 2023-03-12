<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index()
    {
        return view('users.profile_v1');
    }

    public function profile()
    {
        $user = User::find(1);
        
        return view('users.profile')->with('user', $user);
    }

    public function profileUpdate(Request $request)
    {
        $user = User::find(1);
        if(!$user){
            $user = new User();
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if($request->has('image')){
            
            $file = $request->image;
            $path = pathinfo($file);
            $user->profile_image = $path['dirname'];
            
        }
        $user->save();

        $response = [
            'status' => 201,
            'success' => true,
            'message' => 'Profile Updated Successfully!',
            'data' => $user
        ];
        return response()->json($response, $response['status']);
    }
    
    public function searchUsers(Request $request)
    {
        // return $request->all();
        $users = User::query();
        if($request->name){
            $users->where('name', 'like', '%'.$request->name.'%');
        }
        if($request->email){
            $users->where('email', $request->email);
        }
        $response = [
            'status' => 201,
            'success' => true,
            'message' => 'User Details!',
            'data' => $users->get()
        ];
        return response()->json($response, $response['status']);
    }
}
