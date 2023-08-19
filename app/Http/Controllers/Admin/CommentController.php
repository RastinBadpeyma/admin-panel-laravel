<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function AdminProductComment()
    {
        $comments = Comment::where('parent_id',null)->latest()->get();

        return view('admin.comments.all' , compact('comments'));
    }

    public function AdminCommentReply($id){

        $comment = Comment::where('id',$id)->first();
        return view('admin.comments.reply_comment',compact('comment'));

    }

    public function ReplyMessage(Request $request)
    {
        $id = $request->id;
        $user_id = $request->user_id;
        $post_id = $request->post_id;

        Comment::insert([
            'user_id' => $user_id,
            'post_id' => $post_id,
            'parent_id' => $id,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),

        ]);

        return back();
    }
}
