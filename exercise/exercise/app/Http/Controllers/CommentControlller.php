<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class CommentControlller extends Controller
{
    public function delete($id)
    {
        $comment = Comment::find($id);
        
        if( Gate::allows( 'delete-comment', $comment)) {
            $comment->delete();
            return back();
        } else {
            return back()->with("error", "Unauthorize");
        }
        /*
        if(Gate::denies('delete-comment', $comment)) {
            return back()->with('error', 'Unauthorize');
        }

        $comment->delete();
        return back();
        */

    }

    public function create()
    {
        $comment = new Comment;
        $comment->content = request()->content;
        $comment->article_id = request()->article_id;
        $comment->user_id = auth()->user()->id;
        $comment->save();

        return back();
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
