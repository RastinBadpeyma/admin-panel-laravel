<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {

        $products= Product::latest()->paginate(20);
        return view('home.products', compact('products'));
    }

    public function single(Product $product)
    {
        return view('home.single-product', compact('product'));
    }

    public function comment(Request $request)
    {
        $pid = $request->post_id;

        Comment::insert([
            'user_id' => Auth::user()->id,
            'post_id' => $pid,
            'parent_id' => null,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),

        ]);



        return back();
    }
}
