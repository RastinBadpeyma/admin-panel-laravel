<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function AdminProductComment()
    {
        $comments = Comment::where('parent_id',null)->latest()->get();

        return view('admin.comments.all' , compact('comments'));
    }
}
