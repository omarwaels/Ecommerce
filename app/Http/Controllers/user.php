<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


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


    public function showCart (Request $request){
        // $users = DB::table("users")->select->all;
        session_start();


        if (isset($request->id)){
            if(isset($request->remove)){

                $key = array_search($request->id, $_SESSION["cartIds"]);
                unset($_SESSION["cartIds"][$key]);
                return view("user\cart" );

            }
            if (in_array($request->id, $_SESSION["cartIds"])) {

            }else{
                array_push($_SESSION["cartIds"], $request->id);

            }
            return view("user\cart" );
        }else{
            return view("user\cart" );
        }


        return view("user\cart" );
    }
    public function RankUP (Request $request){
        // $users = DB::table("users")->select->all;

        $user = DB::table('users')
        ->where('id',$request->id)
        ->get();
        // $user[0]->userRole
        session_start();
        $giverRole = $_SESSION['user'][0]->userRole;
        $recieverRole = $user[0]->userRole;
        if($giverRole <= $recieverRole){
            $result = "This Cannot BE done , this can be done only by one has more rank";
            $usersInfo = DB::table("users")->get();
            return view("user\dashboard",compact('result','usersInfo') );
        }
        else{
            DB::table('users')
            ->where('id', $request->id)
            ->update(['userRole' => $recieverRole+1]);
            $usersInfo = DB::table("users")->get();
            $result = "The rank has increased successfly ";
            return view("user\dashboard",compact('result','usersInfo') );
        }

        return redirect()->to(route('login'));
    }
    public function RankDown (Request $request){
        $user = DB::table('users')
        ->where('id',$request->id)
        ->get();
        // $user[0]->userRole
        session_start();
        $giverRole = $_SESSION['user'][0]->userRole;
        $recieverRole = $user[0]->userRole;
        if($giverRole <= $recieverRole){
            $result = "This Cannot BE done , this can be done only by one has more rank";
            $usersInfo = DB::table("users")->get();
            return view("user\dashboard",compact('result','usersInfo') );
        }
        else{
            $usersInfo = DB::table("users")->get();
            if($recieverRole == 0 ){
                $result = "This is the lowest Rank";
                return view("user\dashboard",compact('result','usersInfo') );
            }
            DB::table('users')
            ->where('id', $request->id)
            ->update(['userRole' => $recieverRole-1]);
            $usersInfo = DB::table("users")->get();
            $result = "The rank has decreased successfly ";
            return view("user\dashboard",compact('result','usersInfo') );
        }


    }
    public function Remove (Request $request){
        $user = DB::table('users')
        ->where('id',$request->id)
        ->get();
        // $user[0]->userRole
        session_start();
        $giverRole = $_SESSION['user'][0]->userRole;
        $recieverRole = $user[0]->userRole;
        if($giverRole <= $recieverRole){
            $result = "This Cannot BE done , this can be done only by one has more rank";
            $usersInfo = DB::table("users")->get();
            return view("user\dashboard",compact('result','usersInfo') );
        }
        else{
            DB::table('users')->where('id', $request->id)->delete();

            $usersInfo = DB::table("users")->get();
            $result = "REMOVED";
            return view("user\dashboard",compact('result','usersInfo') );
        }
    }
    public function tableOfUsers (){
        $usersInfo = DB::table("users")->get();


        return view("user\dashboard",compact('usersInfo') );
    }



    public function logout (){
        session_start();
        session_unset();
        session_destroy();

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

            if(Hash::check($password, $user[0]->userPassword)){
                session_start();
                $_SESSION['user'] = $user;
                $_SESSION["cartIds"]=array();
                return view("products/home" );
                // compact('user');
            }
            else {
                return redirect()->to(route('login'));
            }

        }
    }



}
