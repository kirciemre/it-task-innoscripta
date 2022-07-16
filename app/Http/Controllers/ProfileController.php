<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(User $user) //more clear implementation
    {
        return view('profile.profile', compact('user'));
    }

    public function edit($user) //alternative way but a bit not clear code.
    {
        $user = User::findOrFail($user);
        $this->authorize('update', $user->profile);
        return view('profile.edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image',
        ]);

        if (request('image')) {
            $path = request('image')->store('profile', 'public');
            $img = Image::make(public_path("storage/{$path}"))->fit(600,600);
            $img->save();
            auth()->user()->profile->update(
                [
                    'title' => $data['title'],
                    'description' => $data['description'],
                    'image' => $path,
                ]
            );
        }
        elseif(!request('image')){
            auth()->user()->profile->update(
                [
                    'title' => $data['title'],
                    'description' => $data['description'],
                ]
            );
        }
        
            
        

        
        return redirect("/profile/$user->id");
    }
}
