<?php

namespace App\Http\Controllers;

use App\Category;
use App\Preference;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PreferenceController extends Controller
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
        $router->get('create', [
            'uses' => 'PreferenceController@create',
            'as' => 'preference.create',
        ]);

        $router->post('store', [
            'uses' => 'PreferenceController@store',
            'as' => 'preference.store',
        ]);
    }

    public function create()
    {
        $categories = Category::select('categories.name', 'categories.id', 'preferences.user_id')
            ->leftJoin('preferences', 'preferences.category_id', '=', 'categories.id')
            ->orderBy('name')
            ->get();

        return view('preference.form', compact('categories'));
    }

    public function store(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $categories = Category::orderBy('name')->get();
        foreach ($categories as $category) {
            if (count($request->get('categories')) > 0) {
                if (in_array($category->id, $request->get('categories'))) {
                    $preferenceExist = Preference::where('user_id', $user->id)
                        ->where('category_id', $category->id)
                        ->first();

                    if ($preferenceExist == null) {
                        Preference::create([
                            'user_id' => $user->id,
                            'category_id' => $category->id
                        ]);
                    }
                } else {
                    $preferenceExist = Preference::where('user_id', $user->id)
                        ->where('category_id', $category->id)
                        ->first();

                    if ($preferenceExist != null) {
                        $preferenceExist->delete();
                    }
                }
            } else {
                $preferenceExist = Preference::where('user_id', $user->id)
                    ->where('category_id', $category->id)
                    ->first();

                if ($preferenceExist != null) {
                    $preferenceExist->delete();
                }
            }
        }

        return redirect()->route('actuality.index')->with('success', 'Préférences sauvegardées');
    }
}
