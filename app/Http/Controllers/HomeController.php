<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        // $posts = Post::with('user', 'comments.user')->orderBy('created_at', 'desc')->get();
        $posts = Post::with(['user', 'comments.user'])
            ->orderBy('created_at', 'desc')
            ->cursorPaginate(15);

        return Inertia::render('Welcome', [
            'posts' => PostResource::collection($posts),
        ]);
    }
}
