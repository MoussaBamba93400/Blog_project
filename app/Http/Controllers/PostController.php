<?php

namespace App\Http\Controllers;

use App\Http\Resource\PostResource;
use Illuminate\Http\Request;

class PostController extends Controller
{
   public function index() {
    return PostResource::collection(Post::all());
   }
}
