<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Intervention\Image\Facades\Image;

class UserController extends Controller
{

    public function uploadAvatar(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image'
        ]);

        $filename = $request->image->getClientOriginalName();

        $path = $request->image->storeAs('images', $filename, 'public');

        $img = Image::make(public_path("/storage/" . $path))->fit(1200, 1200);
        $img->save();

        $user = User::find(Auth::id());
        $user->avatar = 'images/' . $filename;

        $user->save();

        return redirect()->back();
    }

    public function edit(Request $request)
    {

        $user = User::find($request->user);

        return view('user.edit', ['user' => $user]);
    }

    public function index()
    {

        $user = User::all();

        return view('user.index', compact('user'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name'      => 'required',
            'email'     => 'required|email',
            'avatar'    => ''
        ]);

        if ($request->avatar) {

            $filename = $request->avatar->getClientOriginalName();

            $imagePath = $request->avatar->storeAs('images', $filename, 'public');

            $image = Image::make(public_path("/storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['avatar' => $imagePath];
        }

        // $oneArray = array_merge($data, $imageArray ?? []);

        // dd($oneArray);

        $updated = User::find($request->user)->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        dd($updated);

        return redirect('/home');
    }
}
