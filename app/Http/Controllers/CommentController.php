<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class CommentController extends Controller
{
    public function saveComment(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'rating' => 'required',
            'comment'=>'required',
            'id_product'=>'required',
        ]);

        $comment = new Comment;
        $comment ->email = $request->input('email');
        $comment ->stars = $request->input('rating');
        $comment ->comment = $request->input('comment');
        $comment->id_product = $request->input('id_product');

        $comment->save();

        return redirect()->back()->with('success', 'Your comment added');
    }

    public function updateComment(Request $request, $id_comment)
    {
            $comment = Comment::findOrFail($id_comment);
            $comment->comment = $request->input('comment');
            if ($request->has('is_approved')) {
                $comment->is_approved = '1';
            }

            $comment->save();

            return redirect()->back()->with('success', 'Your comment added');
    }
}
