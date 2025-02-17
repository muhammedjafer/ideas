<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentStoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        $request->user()->posts()->create($request->only('body'));
    }
}
