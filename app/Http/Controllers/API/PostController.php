<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function index(){

        $user = auth('api')->user();
        return $user->posts;

    }

    public function store(Request $request){
        $user = auth('api')->user();
        Post::create([
            'title' => $request['title'],
            'body' => $request['body'],
            'user_id' => $user->id
        ]);

        return response()->json(['message' => 'Post Added Successfully']);
    }


    public function update(Request $request , $id){
        $post = Post::where('user_id',auth('api')->user()->id)->find($id);
        if($post){
            $post->update([
                'title' => $request['title'],
                'body' => $request['body']
            ]);
            return response()->json([
                'status' => 201,
                'message' => 'Post Update Successfully',
                'data'=> $post
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Post Not Found'
            ]);
        }
    }

    public function delete_post($id){
        $post = Post::where('user_id',auth('api')->user()->id)->find($id);
        if($post){
            $post->delete();
            return response()->json([
                'message' => 'post Delete Successfully',
                'status' => 203
            ]);
        }else{
            return response()->json([
                'message' => 'Not Post With This Id',
                'status' => 400
            ]);
        }
    }

    public function show_post($id){
        $post = Post::where('user_id',auth('api')->user()->id)->find($id);
        if($post){
            return response()->json([
                'status' => 200,
                'data' => $post
            ]);
        }else{
            return response()->json([
                'message' => 'Not Post With This Id',
                'status' => 400
            ]);
        }
    }
}
