<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;

class ArticleController extends Controller
{


public function index()
{
    $articles = Article::all();

        return response()->json([
            'status' => 'Success',
            'articles' => $articles
        ]);


}



public function create(Request $request) {

    $request->validate([
        'user_id' => 'required',
        'title' => 'required|string',
        'image_path' => 'string',
        'body' => 'string'
    ]);

    $article = Article::create([
        'user_id' => $request->user_id,
        'title' => $request->title,
        'image_path' => $request->image_path,
        'body' => $request->body,
    ]);

    return response()->json([
        'status' => 'Success',
        'message' => 'article successfuly created',
        'article' => $article
    ], 200);

}

public function getArticle(Request $request)
{
    $article = Article::find($request->id);

    return response()->json([
        'status' => 'success',
        'article' => $article
    ]);

}


public function modify(Request $request)
{
    $article = Article::find($request->id);


    if($request->body) {
      $article->body = $request->body;
    }

    if($request->image_path) {
        $article->image_path = $request->image_path;
    }

    $article->save();


    return response()->json([
        'message' => 'successfuly updated',
        'article' => $article
    ]);



}

public function delete(Request $request)
{
    $article = Article::find($request->id);

    $article->delete();

    return response()->json([
        'message' => 'successfuly deleted'
    ], 200);
}

}
