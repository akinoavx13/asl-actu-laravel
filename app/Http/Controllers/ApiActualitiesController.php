<?php

namespace App\Http\Controllers;

use App\Actuality;
use App\User;
use Response;

class ApiActualitiesController extends Controller
{
    public static function routes($router)
    {
        $router->pattern('email', '[a-z-A-Z-.-@]+');

        $router->get('index/{email}', [
            'uses' => 'ApiActualitiesController@index',
            'as' => 'actualities.index',
        ]);
    }

    public function index($email) {

        $user = User::where('email', $email)->first();

        if($user != null) {
            $actualities = Actuality::select('actualities.created_at', 'actualities.actuality_id', 'actualities.id', 'actualities.message', 'actualities.image', 'categories.name as category', 'categories.color as color', 'users.name', 'users.forname', 'users.avatar', 'users.id as user_id')
                ->join('users', 'users.id', '=', 'actualities.user_id')
                ->join('categories', 'categories.id', '=', 'actualities.category_id')
                ->join('preferences', 'preferences.category_id', '=', 'categories.id')
                ->whereNull('actualities.actuality_id')
                ->where('preferences.user_id', $user->id)
                ->orderBy('actualities.created_at', 'desc')
                ->get();

            return Response::json(["actualities" => $actualities], 200);
        }

        return Response::json(["actualities" => []], 404);
    }
}
