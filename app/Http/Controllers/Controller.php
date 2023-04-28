<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function settings()
    {
        // $comments = $book->comment()->orderBy('created_at', 'desc')->get();
        return view('user.settings');
    }


    public function update()
    {
        $message = User::find(Auth::user()->id);

        if (request('name') != Auth::user()->name) {
            $attributes = request()->validate([
                'name' => 'required|min:3|max:40',
            ]);
        } else {
            $attributes = request()->validate([
                'profile_picture' => 'required|image|mimes:jpg,png|max:20480',
                'name' => 'required|min:3|max:40',
            ]);
            $path = request()->file('profile_picture')->store('profile_picture', 'public');
            $path = "/storage/" . $path;
            $attributes['profile_picture'] = $path;
        }

        $message->update($attributes);
        return redirect('/');
    }


    public function Rate()
    {
        $msg = "This is a simple message.";
        return response()->json(array('msg'=> $msg), 200);
    }
}
