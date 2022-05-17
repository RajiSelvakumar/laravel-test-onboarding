<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\URL;

class CustomAuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }
    public function registration(){
        return view("auth.registration");
    }
    
    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required|email|unique:users',
            'contact'=>'required',
            'date'=>'required',
            'password'=>'required|min:5|max:12'
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'errors'=>$validator->messages(),
            ]);
        }else{
            $user = new User();
            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->email = $request->email;
            $user->contact = $request->contact;
            $user->date = $request->date;
            $user->password = $request->password;
            $user->save();
            return response()->json([
                'status'=>200,
                'message'=>"Registration success",
            ]);
        
            
        }
    }

    public function loginUser(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }else{
            $user = User::where('email','=',$request->email)->first();
            if($user){
                if(($request->password == $user->password)){
                     $request->session()->put('loginId',$user->id);
                }
            }
            return response()->json([
                'status'=>200,
            ]);
        }
        
    }

    public function dashboard(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return view("auth.dashboard", compact('data'));
    }

    public function logout(){
        if (Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }

    public function edit(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return view("auth.edit", compact('data'));
    }
    
    public function updateUser(Request $request){
        $validator = Validator::make($request->all(),[
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required|email',
            'contact'=>'required',
            'date'=>'required',
            'password'=>'required|min:5|max:12'
        ]);
        if($validator->fails()){
             return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }else{
            $user = User::where('id', '=', Session::get('loginId'))->first();
            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->email = $request->email;
            $user->contact = $request->contact;
            $user->date = $request->date;
            $user->password = $request->password;
            $user->update();
            return response()->json([
                'status'=>200,
                'success'=>"Updation success",
            ]);
            
        }       

        
    }
    
}
