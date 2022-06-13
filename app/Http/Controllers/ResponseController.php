<?php

namespace App\Http\Controllers;

use App\Models\Api;
use App\Models\Response;
use Dotenv\Validator;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    //

    public function getAllResponses(){
        $response = Api::responseApi(false,200,'',Response::with(['post'])->paginate(5));
        return response()->json($response, 200);
    }

    public function getResponseById($idResponse){
        $reply = Response::with(['post'])->find($idResponse);
        if($reply){
            $response = Api::responseApi(false,200,'',$reply);
            return response()->json($response, 200);
        }
        $response = Api::responseApi(true,400,'Post not find',null);
        return response()->json($response,400);
    }

    public function createResponse(Request $request){

        $reply = new Response();
        $reply->responses = $request->responses;
        $reply->id_posts = $request->id_posts;
        $reply->save();
        if($reply){
            $response = Api::responseApi(false,201,'Response create successfully',null);
            return response()->json($response,201);
        }else{
            $response = Api::responseApi(true,400,'Response create failed',null);
            return response()->json($response,400);
        }
    }

    public function updateResponse(Request $request, $idResponse){
        $reply = Response::find($idResponse);
        $reply->responses = $request->responses;
        $reply->id_posts = $request->id_posts;
        $reply->save();
        if($reply){
            $response = Api::responseApi(false,201,'Response update successfully',null);
            return response()->json($response,201);
        }else{
            $response = Api::responseApi(true,400,'Response update failed',null);
            return response()->json($response,400);
        }
    }

    public function deleteResponse($idResponse){
        $reply = Response::find($idResponse);
        $reply->delete();
        if($reply){
            $response = Api::responseApi(false,200,'Response delete successfully',null);
            return response()->json($response,200);
        }else{
            $response = Api::responseApi(true,400,'Response delete failed',null);
            return response()->json($response,400);
        }
    }



}
