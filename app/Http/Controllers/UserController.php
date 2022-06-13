<?php

namespace App\Http\Controllers;

use App\Models\Api;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use function Symfony\Component\VarDumper\Dumper\esc;

class UserController extends Controller
{
    //

    public function show(){
        $response = Api::responseApi(false,200,'',User::paginate(5));
        return response()->json($response, 200);
    }


    public function createUser(Request $request){
         $user = new User();
         $user->name = $request->name;
         $user->email = $request->email;
         $user->password =Crypt::encryptString($request->password);
         $user->save();
         if($user){
             $response = Api::responseApi(false,201,'User create successfully',null);
             return response()->json($response,201);
         }else{
             $response = Api::responseApi(true,400,'User create failed',null);
             return response()->json($response,400);
         }
    }

    public function getUserById($idUser){
        $user = User::find($idUser);
        if($user){
            $response = Api::responseApi(false,200,'',$user);
            return response()->json($response, 200);
        }
        $response = Api::responseApi(true,400,'User not find',null);
        return response()->json($response,400);
    }

    public function updateUser(Request $request, $idUser){
        $user = User::find($idUser);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =Crypt::encryptString($request->password);
        $user->save();
        if($user){
            $response = Api::responseApi(false,201,'User update successfully',null);
            return response()->json($response,201);
        }else{
            $response = Api::responseApi(true,400,'User update failed',null);
            return response()->json($response,400);
        }
    }

    public function deleteUser($idUser){
        $user = User::find($idUser);
        $user->delete();
        if($user){
            $response = Api::responseApi(false,200,'User delete successfully',null);
            return response()->json($response,200);
        }else{
            $response = Api::responseApi(true,400,'User delete failed',null);
            return response()->json($response,400);
        }
    }

    public function getUserWithPost($idUser){
        $userPost = User::with(['posts'])->find($idUser);
        if($userPost){
            $response = Api::responseApi(false,200,'',$userPost);
            return response()->json($response, 200);
        }
        $response = Api::responseApi(true,400,'User not find',null);
        return response()->json($response, 400);



    }




}
