<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class products extends Controller
{

    public function prodInfo (Request $request){
        // $users = DB::table("users")->select->all;

        $id = $request->id;

        return view("products\product",compact('id') );
    }
}
