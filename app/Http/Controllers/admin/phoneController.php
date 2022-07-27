<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\number;
use App\Models\numbercateg;
use Illuminate\Http\Request;

class phoneController extends Controller
{
    //
    function phoneFun(){
        $data = new number();
        $categ = new numbercateg();
        return view("phone",["data"=>$data::all(),"category"=>$categ::all()]);
    }
    function createPhone(Request $request){}
    function editPhone(Request $request){}
    function deletePhone(Request $request){}
}
