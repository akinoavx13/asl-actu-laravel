<?php

namespace App\Http\Controllers;

use App\Actuality;
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
        $router->pattern('category', '[a-z_5]+');

        $router->pattern('actuality_id', '[0-9]+');

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

        $router->post('actuality/comment/{actuality_id}', [
            'uses' => 'ActualityController@comment',
            'as' => 'actuality.comment',
        ]);
    }

    public function index($category = null)
    {

        $user = Auth::user();

        $preference = $user->preference;

        $numberOfActualitiesByCategories = Actuality::select('actualities.category', DB::raw('count(*) as total'))
            ->whereNull('actualities.actuality_id')
            ->groupBy('actualities.category')
            ->get()
            ->keyBy('category')
            ->toArray();

        $actualitiesCount['general'] = array_key_exists('general', $numberOfActualitiesByCategories) ? $numberOfActualitiesByCategories['general']['total'] : 0;
        $actualitiesCount['athletics'] = array_key_exists('athletics', $numberOfActualitiesByCategories) ? $numberOfActualitiesByCategories['athletics']['total'] : 0;
        $actualitiesCount['badminton'] = array_key_exists('badminton', $numberOfActualitiesByCategories) ? $numberOfActualitiesByCategories['badminton']['total'] : 0;
        $actualitiesCount['basketball'] = array_key_exists('basketball', $numberOfActualitiesByCategories) ? $numberOfActualitiesByCategories['basketball']['total'] : 0;
        $actualitiesCount['football'] = array_key_exists('football', $numberOfActualitiesByCategories) ? $numberOfActualitiesByCategories['football']['total'] : 0;
        $actualitiesCount['gym'] = array_key_exists('gym', $numberOfActualitiesByCategories) ? $numberOfActualitiesByCategories['gym']['total'] : 0;
        $actualitiesCount['yoga_cestas'] = array_key_exists('yoga_cestas', $numberOfActualitiesByCategories) ? $numberOfActualitiesByCategories['yoga_cestas']['total'] : 0;
        $actualitiesCount['ball'] = array_key_exists('ball', $numberOfActualitiesByCategories) ? $numberOfActualitiesByCategories['ball']['total'] : 0;
        $actualitiesCount['soccer5'] = array_key_exists('soccer5', $numberOfActualitiesByCategories) ? $numberOfActualitiesByCategories['soccer5']['total'] : 0;
        $actualitiesCount['tennis'] = array_key_exists('tennis', $numberOfActualitiesByCategories) ? $numberOfActualitiesByCategories['tennis']['total'] : 0;
        $actualitiesCount['volleyball'] = array_key_exists('volleyball', $numberOfActualitiesByCategories) ? $numberOfActualitiesByCategories['volleyball']['total'] : 0;
        $actualitiesCount['yoga_chalgrin'] = array_key_exists('yoga_chalgrin', $numberOfActualitiesByCategories) ? $numberOfActualitiesByCategories['yoga_chalgrin']['total'] : 0;

        if ($category != null) {
            if (in_array($category, ['general', 'athletics', 'badminton', 'basketball', 'football', 'gym', 'yoga_cestas', 'ball', 'soccer5', 'tennis', 'volleyball', 'yoga_chalgrin'])) {
                $actualities = Actuality::select('actualities.message', 'actualities.category', 'actualities.created_at', 'actualities.id', 'users.name')
                    ->join('users', 'users.id', '=', 'actualities.user_id')
                    ->whereNull('actualities.actuality_id')
                    ->where('category', $category)
                    ->get();
            } else {
                abort(404);
            }
        } else {
            $actualities = Actuality::select('actualities.message', 'actualities.category', 'actualities.created_at', 'actualities.id', 'users.name')
                ->join('users', 'users.id', '=', 'actualities.user_id')
                ->whereNull('actualities.actuality_id')
                ->orderBy('actualities.created_at', 'desc')
                ->get();

            $actualities = $actualities->filter(function ($value, $key) use ($preference) {
                $userPreference = $preference->toArray();
                return $userPreference[$value->category] == 1;
            });
        }

        return view('actuality.index', compact('actualities', 'actualitiesCount', 'preference'));
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
}
