<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\item;
use App\Http\Requests\ApiRequest;
//use Validator;
//use Illuminate\Foundation\Validation\ValidatesRequests;
class ApiController extends Controller
{
	//use ValidatesRequests;
    public function index()
    {
    	$item = item::all();
    	return response()->json($item);
    }

    public function find($id)
    {
    	$item = item::find($id);
    	return response()->json($item);
    }

    public function store(ApiRequest $request)
    {
    	//return "aljdf";
    	// $validator = Validator::make($request->json()->all(), [
     //        'itemname' => 'required',
     //        'price' => 'required',
     //    ]);

    	// if($validator->fails())
    	// {
    	// 	$response = array('responce'=>$validator->messages(),'success'=>false);
    	// 	return $response ;
    	// }
    	// else
    	// {
    	// 	//insert data
    	// 	$item  = new item;
    	// 	$item->itemname = $request->input('itemname');;
    	// 	$item->price = $request->input('price');
    	// 	$item->save();
    	// 	return response()->json($item);
    	// }
    	// $success = array(['message'=>"Record added"]);
    	$item  = new item;
    		$item->itemname = $request->input('itemname');;
    		$item->price = $request->input('price');
    		$item->save();
    		return response()->json($item);
  	
    }

    public function update(Request $request,$id)
    {
    		$item = item::find($id);
    		$item->itemname = $request->input('itemname');
    		$item->price = $request->input('price');
    		$item->save();
    		return response()->json($item);
    }

    public function destroy($id)
    {
    	$item = item::find($id);
    	$item->delete();

    	return "success record has been deleted";
    }
}
