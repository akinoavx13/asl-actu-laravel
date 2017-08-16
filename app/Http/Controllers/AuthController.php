<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        if ($email == null || $password == null) {
            return $this->response(401, "Il manque l'email ou le mot de passe.");
        }

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return $this->response(200, Auth::user()->api_token);
        } else {
            return $this->response(401, "Email ou mot de passe incorrect.");
        }
    }
}
