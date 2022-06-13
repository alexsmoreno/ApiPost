<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Api;
use phpDocumentor\Reflection\Types\Collection;

class PostController extends Controller
{
    //
    public function getAllPosts(){
        $response = Api::responseApi(false,200,'',Post::with(['responses'])->paginate(5));
        return response()->json($response, 200);
    }

    public function getPostById($idPost){
        $post = Post::with(['user'])->find($idPost);
        if($post){
            $response = Api::responseApi(false,200,'',$post);
            return response()->json($response, 200);
        }
        $response = Api::responseApi(true,400,'Post not find',null);
        return response()->json($response,400);
    }



    public function createPost(Request $request){
        $post = new Post();
        $post->id_users = $request->id_users;
        $post->posts = $request->posts;
        $post->save();
        if($post){
            $response = Api::responseApi(false,201,'Post create successfully',null);
            return response()->json($response,201);
        }else{
            $response = Api::responseApi(true,400,'Post create failed',null);
            return response()->json($response,400);
        }
    }

    public function updatePost(Request $request, $idPost){
        $post = Post::find($idPost);
        $post->id_users = $request->id_users;
        $post->posts = $request->posts;
        $post->save();
        if($post){
            $response = Api::responseApi(false,201,'Post update successfully',null);
            return response()->json($response,201);
        }else{
            $response = Api::responseApi(true,400,'Post update failed',null);
            return response()->json($response,400);
        }
    }

    public function deletePost($idPost){
        $post = Post::find($idPost);
        $post->delete();
        if($post){
            $response = Api::responseApi(false,200,'Post delete successfully',null);
            return response()->json($response,200);
        }else{
            $response = Api::responseApi(true,400,'Post delete failed',null);
            return response()->json($response,400);
        }
    }


    public function  getPostWithUser($idPost){
        $postUser = Post::with(['user'])->find($idPost);

        if($postUser){
            $response =Api::responseApi(false,200,'',$postUser);
            return response()->json($response, 200);
        }
        $response = Api::responseApi(true,400,'Post not find',null);
        return response()->json($response, 400);
    }



}
