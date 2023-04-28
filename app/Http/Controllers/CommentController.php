<?php

namespace App\Http\Controllers;

// use GuzzleHttp\Psr7\Message;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store()
    {
        $message = new Comments;
        $attributes = request()->validate([
            'message' => 'required',
        ]);
        $attributes['user_id'] = Auth::user()->id;
        $attributes['book_id'] = request('book_id');

        $message->create($attributes);
        return back();
    }
}
