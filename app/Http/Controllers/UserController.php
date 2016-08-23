<?php

namespace App\Http\Controllers;

use App\User;
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
        $router->pattern('user_id', '[0-9]+');

        $router->get('index', [
            'middleware' => 'admin',
            'uses' => 'UserController@index',
            'as' => 'user.index',
        ]);

        $router->get('editAsAdmin/{user_id}', [
            'middleware' => 'admin',
            'uses' => 'UserController@editAsAdmin',
            'as' => 'user.editAsAdmin',
        ]);

        $router->get('edit', [
            'uses' => 'UserController@edit',
            'as' => 'user.edit',
        ]);

        $router->post('update', [
            'uses' => 'UserController@update',
            'as' => 'user.update',
        ]);

        $router->post('updateAsAdmin/{user_id}', [
            'middleware' => 'admin',
            'uses' => 'UserController@updateAsAdmin',
            'as' => 'user.updateAsAdmin',
        ]);

        $router->get('delete/{user_id}', [
            'middleware' => 'admin',
            'uses' => 'UserController@delete',
            'as' => 'user.delete',
        ]);
    }

    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    public function editAsAdmin($user_id)
    {
        $user = User::findOrFail($user_id);

        return view('user.formAdmin', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();

        return view('user.form', compact('user'));
    }

    public function updateAsAdmin(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);

        $this->validate($request, [
            'forname' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'avatar' => 'image',
            'newsletter' => 'required|boolean',
        ]);

        $user->update([
            'forname' => $request->get('forname'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'avatar' => $request->avatar,
            'newsletter' => $request->get('newsletter'),
        ]);

        if ($request->get('password') != '') {
            $this->validate($request, [
                'password' => 'confirmed|min:6'
            ]);

            $user->update([
                'password' => bcrypt($request->get('password')),
            ]);
        }

        return redirect()->route('user.index')->with('success', 'Le compte a bien été sauvegardé');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'forname' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'avatar' => 'image',
            'newsletter' => 'required|boolean',
        ]);

        $user->update([
            'forname' => $request->get('forname'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'avatar' => $request->avatar,
            'newsletter' => $request->get('newsletter'),
        ]);

        if ($request->get('password') != '') {
            $this->validate($request, [
                'password' => 'confirmed|min:6'
            ]);

            $user->update([
                'password' => bcrypt($request->get('password')),
            ]);
        }

        return redirect()->route('user.edit')->with('success', 'Votre compte a bien été sauvegardé');
    }

    public function delete($user_id)
    {
        $user = User::findOrFail($user_id);

        $user->delete();

        return redirect()->route('user.index')->with('success', 'Utilisateur supprimée');
    }
}
