<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    //
    function userFun(){
        $data = new User();
        return view("users",["data"=>$data::all()]);
    }
    function createUser(Request $request){}
    function editUser(Request $request){}
    function deleteUser(Request $request){}
}
