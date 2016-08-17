<?php

namespace App\Http\Controllers;

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

        $preference = Auth::user()->preference;

        return view('preference.form', compact('preference'));
    }

    public function store(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        if ($user->preference == null) {
            $user->update([
                'preference_id' => Preference::create()->id,
            ]);
        }

        $preference = Preference::findOrFail($user->preference_id);
        $preference->update([
            'general' => array_key_exists('general', $request->get('category'))&& $request->get('category')['general'] == true ? true : false,
            'athletics' => array_key_exists('athletics', $request->get('category'))&& $request->get('category')['athletics'] == true ? true : false,
            'badminton' => array_key_exists('badminton', $request->get('category'))&& $request->get('category')['badminton'] == true ? true : false,
            'basketball' => array_key_exists('basketball', $request->get('category'))&& $request->get('category')['basketball'] == true ? true : false,
            'football' => array_key_exists('football', $request->get('category'))&& $request->get('category')['football'] == true ? true : false,
            'gym' => array_key_exists('gym', $request->get('category'))&& $request->get('category')['gym'] == true ? true : false,
            'yoga_cestas' => array_key_exists('yoga_cestas', $request->get('category'))&& $request->get('category')['yoga_cestas'] == true ? true : false,
            'ball' => array_key_exists('ball', $request->get('category'))&& $request->get('category')['ball'] == true ? true : false,
            'soccer5' => array_key_exists('soccer5', $request->get('category'))&& $request->get('category')['soccer5'] == true ? true : false,
            'tennis' => array_key_exists('tennis', $request->get('category'))&& $request->get('category')['tennis'] == true ? true : false,
            'volleyball' => array_key_exists('volleyball', $request->get('category'))&& $request->get('category')['volleyball'] == true ? true : false,
            'yoga_chalgrin' => array_key_exists('yoga_chalgrin', $request->get('category'))&& $request->get('category')['yoga_chalgrin'] == true ? true : false
        ]);

        return redirect()->route('actuality.index')->with('success', 'Préférences sauvegardées');
    }
}
