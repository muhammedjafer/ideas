<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class CommentIndexController extends Controller
{
    public function __invoke()
    {
        return inertia()->render('Comments/Index', [
            'posts' => PostResource::collection(Post::with('user')->latest()->get())
        ]);
    }
}
