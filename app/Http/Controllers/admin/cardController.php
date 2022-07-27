<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\card;
use App\Models\categoy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class cardController extends Controller
{
    //
    function cardsFun(){
        $data = new card();
        $categ = new categoy();
        return view("cards",["data"=>$data::all(),"category"=>$categ::all()]);
    }
    function createCard(Request $request){
        Log::info(json_encode($request->all()));
        //move image to public
        $userID = Auth::user()->id;
        $fileEx = $request ->image->getClientOriginalExtension();
        $fileName = $userID.time().".".$fileEx;
        $request->image->move('images',$fileName);
        //save to database
        $card = new card();
        $card->name     = $request->cardName;
        $card->category = $request->category;
        $card->price    = $request->price;
        $card->image    = $fileName;
        $card->detail   = $request->detail;
        $card->address  = $request ->address;
        $card->active   = "yes";
        $card->user_id  = $userID;
        $card->rate     = $request->rate;
        $card->save();
        return redirect("admin/cards");
    }
    function deleteCard(Request $request){
        $delete = card::find($request->deleteID);
        //delete image file here then delete row
        $delete->delete();
        return redirect("admin/cards");
    }
    function editCard(Request $request){}
}
