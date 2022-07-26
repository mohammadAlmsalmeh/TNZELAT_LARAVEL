<?php

namespace App\Http\Controllers;

use App\Models\card;
use App\Models\categoy;
use App\Models\number;
use App\Models\numbercateg;
use App\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use function GuzzleHttp\Promise\all;

class adminController extends Controller
{
    //
    function categoryFun(){
        $data = new categoy();
        return view("category",["data"=>$data::all()]);
    }
    function cardsFun(){
        $data = new card();
        $categ = new categoy();
        return view("cards",["data"=>$data::all(),"category"=>$categ::all()]);
    }
    function phoneCategFun(){
        $data = new numbercateg();
        return view("phoneCateg",["data"=>$data::all()]);
    }
    function phoneFun(){
        $data = new number();
        $categ = new numbercateg();
        return view("phone",["data"=>$data::all(),"category"=>$categ::all()]);
    }
    function userFun(){
        $data = new User();
        return view("users",["data"=>$data::all()]);
    }
}
