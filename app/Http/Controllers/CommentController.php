<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Store;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Store  $store
     */
    public function createFromStore(Store $store)
    {
        return view('comments.create', compact('store'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFromStore(StoreCommentRequest $request, Store $store)
    {
        $comment = new Comment();
        
        $comment->description = $request->description;
        $comment->score       = $request->score;
        $comment->user_id     = auth()->user()->id;
        
        $store->comments()->save($comment);
        $store->score = $store->comments()->avg('score');

        $store->save();

        return redirect()->route('comments.stored', $store);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->fill($request->all());
        $comment->save();

        return redirect()->route('comments.updated', $comment->store);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('comments.deleted', $comment->store);
    }

    /**
     * Send to confirmation view.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function confirmAction(Comment $comment)
    {
        return view('comments.confirmAction', compact('comment'));
    }
}