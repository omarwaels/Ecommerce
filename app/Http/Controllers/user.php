<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class user extends Controller
{
    public function addUser (Request $request){
        // $users = DB::table("users")->select->all;
        DB::table("users")->insert([
            "userName"=> $request->name,
            "userEmail"=> $request->email,
            "userPassword"=> bcrypt($request->password)
        ]);
        return redirect()->to(route('login'));
    }
    public function logIn (Request $request){
        // $users = DB::table("users")->select->all;
        DB::table("users")->insert([
            "userName"=> $request->name,
            "userEmail"=> $request->email,
            "userPassword"=> bcrypt($request->password)
        ]);
        return redirect()->to(route('login'));
    }
    public function logInReq (Request $request){


        $email = $request->email;
        $password = $request->password;

        $user = DB::table('users')
             ->where('userEmail',$email)
             ->get();
        if ($user->isEmpty()) {

            return redirect()->to(route('login'));
        } else {

            if($user[0]->userPassword == $password ){
                return view("products/home");
            }
            else {
                return redirect()->to(route('login'));
            }

        }
    }



}
