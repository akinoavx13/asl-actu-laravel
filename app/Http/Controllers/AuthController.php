<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Response;

class AuthController extends Controller
{
    public static function routes($router)
    {
        $router->post('login', [
            'uses' => 'AuthController@login',
            'as' => 'auth.login',
        ]);
    }

    public function login(Request $request) {
        $login = $request->get('login', null);
        $password = $request->get('password', null);

        if (Auth::attempt(['email' => $login, 'password' => $password]))
        {
            return Response::json(["connected" => "yes"], 200);
        }

        return Response::json(["connected" => "no"], 401);
    }
}
