<?php

namespace App\Http\Controllers;

use App\Actuality;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ActualityController extends Controller
{
    public static function routes($router)
    {
        $router->pattern('category', '[a-z_5]+');

        $router->get('{category?}', [
            'uses' => 'ActualityController@index',
            'as' => 'actuality.index',
        ]);

        $router->get('actuality/create', [
            'uses' => 'ActualityController@create',
            'as' => 'actuality.create',
        ]);

        $router->post('actuality/store', [
            'uses' => 'ActualityController@store',
            'as' => 'actuality.store',
        ]);
    }

    public function index($category = null)
    {

        if ($category != null) {
            if (in_array($category, ['general', 'athletics', 'badminton', 'basketball', 'football', 'gym', 'yoga_cestas', 'ball', 'soccer5', 'tennis', 'volleyball', 'yoga_chalgrin'])) {
                $actualities = Actuality::select('actualities.message', 'actualities.category', 'actualities.created_at', 'users.name')
                    ->join('users', 'users.id', '=', 'actualities.user_id')
                    ->where('category', $category)
                    ->get();
            } else {
                abort(404);
            }
        } else {
            $actualities = Actuality::select('actualities.message', 'actualities.category', 'actualities.created_at', 'users.name')
                ->join('users', 'users.id', '=', 'actualities.user_id')
                ->get();
        }

        return view('actuality.index', compact('actualities'));
    }

    public function create()
    {
        $actuality = new Actuality();

        return view('actuality.form', compact('actuality'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required|in:general,athletics,badminton,basketball,football,gym,yoga_cestas,ball,soccer5,tennis,volleyball,yoga_chalgrin',
            'message' => 'required',
        ]);

        Actuality::create([
            'category' => $request->get('category'),
            'message' => $request->get('message'),
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('actuality.index')->with('success', 'Actualité créée');
    }
}
