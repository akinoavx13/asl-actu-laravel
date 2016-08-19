<?php

namespace App\Http\Controllers;

use App\Actuality;
use App\Category;
use App\Like;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $actualities = Actuality::all();
        $categories = Category::all();

        return view('actuality.index', compact('actualities', 'categories'));
    }

    public function create()
    {
        $actuality = new Actuality();
        $categories = Category::lists('name', 'id');

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
            'category' => $actuality->category,
            'user_id' => Auth::user()->id,
            'actuality_id' => $actuality_id,
            'message' => $request->get('content'),
        ]);

        return redirect()->route('actuality.index')->with('success', 'Commentaire posté');
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
            return redirect()->route('actuality.index')->with('success', 'Vous aimez l\'actualité');
        }

        return redirect()->route('actuality.index')->with('error', 'Vous aimez déjà l\'actualité');
    }
}
