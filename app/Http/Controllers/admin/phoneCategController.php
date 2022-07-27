<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\numbercateg;
use Illuminate\Http\Request;

class phoneCategController extends Controller
{
    //
    function phoneCategFun(){
        $data = new numbercateg();
        return view("phoneCateg",["data"=>$data::all()]);
    }
    function createPCateg(Request $request){}
    function editPCateg(Request $request){}
    function deletePCateg(Request $request){}
}
