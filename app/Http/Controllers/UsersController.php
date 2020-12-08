<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function getUser(Request $request) {
        $user = $request->user();
        return $user->toArray();
    }

    public function createAnonymousAccount (){
        $user = User::factory(1)->create();
        $data['token'] =  $user->createToken('MyApp')->accessToken;

        return response(['data' => $data, 'message' => 'Anonymous Account created successfully!', 'status' => true]);
    }

    public function updateAccount(Request $request){
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|email',
            'password' => 'required'
        ]);
    
        if($validator->fails()){
            return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        // figure out how to update user using token
    
        // $user = User::update($input);  
        // return response(['user' => $user, 'message' => 'Account updated successfully!', 'status' => true]);

    }

    public function authorizeAccount(Request $request){
        $user = $request->user();
        $user['account_verified_at'] = Carbon::now();
        return response(['user' => $user, 'message' => 'Account authorized successfully!', 'status' => true]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|email',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->account_verified_at = Carbon::now();
        $user->save();
      

        /**Take note of this: Your user authentication access token is generated here **/
        $data['token'] =  $user->createToken('MyApp')->accessToken;

        return response(['data' => $data, 'message' => 'Authorized Account created successfully!', 'status' => true]);
    }  
     
}