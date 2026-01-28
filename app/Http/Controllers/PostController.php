<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Actions\GetAllPostsAction;
use App\Actions\GetUsersAction;
use App\Actions\CreatePostAction;
use App\Actions\UpdatePostAction;
use App\Actions\DeletePostAction;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GetAllPostsAction $action)
    {
        $posts = $action->execute();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(GetUsersAction $action)
    {
        $users = $action->execute();
        return view('posts.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request, CreatePostAction $action)
    {
        $action->execute($request->validated());

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, GetUsersAction $action)
    {
        $users = $action->execute();
        return view('posts.edit', compact('post', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post, UpdatePostAction $action)
    {
        $action->execute($post, $request->validated());

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, DeletePostAction $action)
    {
        $action->execute($post);

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully.');
    }
}
