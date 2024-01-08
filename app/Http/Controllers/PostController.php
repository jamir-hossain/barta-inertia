<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Post/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::create([
            'user_id' => auth()->user()->id,
            'description' => $request->description,
        ]);

        if ($request->image) {
            $post->addMedia($request->image)->toMediaCollection();
        }

        return Redirect::to('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return Inertia::render('Post/Show', ['post' => new PostResource($post)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $post->with(['user', 'comments' => function ($query) {
            $query->with('user')->orderBy('created_at', 'desc');
        }])->first();

        return Inertia::render('Post/Update', ['post' => new PostResource($post)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        dd($request->all());
        $post->update([
            'description' => $request->description,
        ]);

        if ($request->image) {
            if ($post->hasMedia()) {
                $post->getMedia()->first()->delete();
            }
            $post->addMedia($request->image)->toMediaCollection();
        }

        return Redirect::to('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->to('/');
    }
}
