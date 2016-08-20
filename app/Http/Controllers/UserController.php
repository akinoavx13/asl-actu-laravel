<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function routes($router)
    {
        $router->get('edit', [
            'uses' => 'UserController@edit',
            'as' => 'user.edit',
        ]);

        $router->post('update', [
            'uses' => 'UserController@update',
            'as' => 'user.update',
        ]);
    }

    public function edit()
    {
        $user = Auth::user();

        return view('user.form', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'forname' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'avatar' => 'image'
        ]);

        $user->update([
            'forname' => $request->get('forname'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'avatar' => $request->avatar,
        ]);

        if($request->get('password') != '') {
            $this->validate($request, [
                'password' => 'confirmed|min:6'
            ]);

            $user->update([
                'password' => bcrypt($request->get('password')),
            ]);
        }

        return redirect()->route('user.edit')->with('success', 'Votre compte a bien été sauvegardé');
    }
}
