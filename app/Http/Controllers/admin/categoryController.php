<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\categoy;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    //
    function categoryFun(){
        $data = new categoy();
        return view("category",["data"=>$data::all()]);
    }
    function createCategory(Request $request){
        echo "test";
        $categ = new categoy;
        $categ ->name = $request ->categName;
        $categ->save();
        return redirect("/admin/category");
    }
    function editCategory(Request $request){
        $categ = categoy::find($request->rowID);
        $categ ->name = $request ->editCategName;
        $categ->save();
        return redirect("/admin/category");
    }
    function deleteCategory(Request $request){
        $categ = categoy::find($request->deleteID);
        $categ->delete();
        return redirect("/admin/category");
    }
}
