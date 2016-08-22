<?php

namespace App\Http\Controllers;

use App\Actuality;
use App\Category;
use App\Like;
use App\Preference;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ActualityController extends Controller
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
        $router->pattern('category_id', '[0-5]+');

        $router->pattern('actuality_id', '[0-9]+');

        $router->get('{category_id?}', [
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

        $router->post('actuality/comment/{actuality_id}', [
            'uses' => 'ActualityController@comment',
            'as' => 'actuality.comment',
        ]);

        $router->get('actuality/like/{actuality_id}', [
            'uses' => 'ActualityController@like',
            'as' => 'actuality.like',
        ]);
    }

    public function index($category_id = null)
    {
        if ($category_id == null) {
            $actualities = Actuality::select('actualities.created_at', 'actualities.actuality_id', 'actualities.id', 'actualities.message', 'categories.name as category', 'categories.color as color', 'users.name', 'users.forname', 'users.avatar', 'users.id as user_id')
                ->join('users', 'users.id', '=', 'actualities.user_id')
                ->join('categories', 'categories.id', '=', 'actualities.category_id')
                ->join('preferences', 'preferences.category_id', '=', 'categories.id')
                ->whereNull('actualities.actuality_id')
                ->get();
        } else {
            $actualities = Actuality::select('actualities.created_at', 'actualities.actuality_id', 'actualities.id', 'actualities.message', 'categories.name as category', 'categories.color as color', 'users.name', 'users.forname', 'users.avatar', 'users.id as user_id')
                ->join('users', 'users.id', '=', 'actualities.user_id')
                ->join('categories', 'categories.id', '=', 'actualities.category_id')
                ->where('categories.id', $category_id)
                ->whereNull('actualities.actuality_id')
                ->get();
        }

        $categories = Category::select('categories.name', 'categories.color', 'categories.id', 'actualities.category_id', DB::raw('count(actualities.category_id) as totalActualities'), 'preferences.user_id')
            ->leftJoin('preferences', 'preferences.category_id', '=', 'categories.id')
            ->leftJoin('actualities', 'actualities.category_id', '=', 'categories.id')
            ->whereNull('actualities.actuality_id')
            ->groupBy('categories.name', 'categories.color', 'categories.id', 'actualities.category_id')
            ->orderBy('categories.name')
            ->get();

        return view('actuality.index', compact('actualities', 'categories', 'myPreferences'));
    }

    public function create()
    {
        $actuality = new Actuality();
        $categories = Category::lists('name', 'id');

        if(count($categories) <= 0) {
            return redirect()->route('actuality.index')->with('error', 'Il n\'y a pas encore de catégorie');
        }

        return view('actuality.form', compact('actuality', 'categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|exists:categories,id',
            'message' => 'required',
        ]);

        Actuality::create([
            'category_id' => $request->get('category_id'),
            'message' => $request->get('message'),
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('actuality.index')->with('success', 'Actualité créée');
    }

    public function comment(Request $request, $actuality_id)
    {
        $this->validate($request, [
            'content' => 'required',
        ]);

        $actuality = Actuality::findOrFail($actuality_id);

        Actuality::create([
            'category_id' => $actuality->category_id,
            'user_id' => Auth::user()->id,
            'actuality_id' => $actuality_id,
            'message' => $request->get('content'),
        ]);

        return Redirect::to(route('actuality.index') . '#' . $actuality_id);
    }

    public function like($actuality_id)
    {
        $user = Auth::user()->id;

        $actualityLike = Like::where('user_id', $user)
            ->where('actuality_id', $actuality_id)
            ->first();

        if ($actualityLike == null) {
            Like::create([
                'user_id' => $user,
                'actuality_id' => $actuality_id,
            ]);
            return Redirect::to(route('actuality.index') . '#' . $actuality_id);
        }

        return redirect()->route('actuality.index')->with('error', 'Vous aimez déjà l\'actualité');
    }
}
