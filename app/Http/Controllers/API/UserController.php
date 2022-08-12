<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\PostResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(){
        $user = auth('api')->user();
        $all_post_user = $user->posts;
        return [
        'data'=>PostResource::collection($all_post_user),
        'status'=> 200,
        'message'=> 'ok'
        ];
    }
}
