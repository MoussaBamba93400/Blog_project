<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;




class CommentController extends Controller
{

    public function index(Request $request)
    {

        $comments = User::join('comments', 'users.id', '=', 'comments.user_id')
        ->select('users.*', 'comments.*')
        ->where('comments.article_id', '=', $request->id)
        ->get();

        return response()->json([
            'message' => 'success',
            'comments' => $comments
        ], 200);

    }


    public function create(Request $request)
    {


        $comment = Comment::create([
            'user_id' => $request->user_id,
            'body' => $request->body,
            'article_id' => $request->id
        ]);


        return response()->json([
            'status' => 'Success',
            'message' => 'comment successfuly created',
            'comment' => $comment
        ], 200);
    }

    public function delete(Request $request)
    {
        $comment = Comment::find($request->id);

        $comment->delete();

        return response()->json([
            'message' => 'successfuly deleted'
        ], 200);
    }

    public function modify(Request $request)
    {

        $comment = Comment::find($request->id);

        $comment->body = $request->body;

        $comment->save();

        return response()->json([
            'message' => 'comment updated',
            'comment' => $comment
        ], 200);
    }

    public function activate(Request $request)
    {
        $comment = Comment::find($request->id);

        $comment->is_active = true;


        $comment->save();


        return response()->json([
            'message' => 'comment as been activated',
            'comment' => $comment
        ], 200);
    }



    public function desactivate(Request $request)
    {
        $comment = Comment::find($request->id);

        $comment->is_active = false;


        $comment->save();


        return response()->json([
            'message' => 'comment as been desactivated',
            'comment' => $comment
        ], 200);
    }
}
