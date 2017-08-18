<?php

namespace App\Http\Controllers;

use App\Actuality;
use App\Category;
use App\Preference;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;

class ApiActualitiesController extends Controller
{
    public function index()
    {
        $actualities = Actuality::select(
            'users.forname',
            'users.name',
            'categories.name as category_name',
            'categories.color as category_color',
            'actualities.message',
            'actualities.created_at',
            'actualities.id',
            'actualities.image',
            'users.avatar',
            'users.id as userId'
        )
            ->join('users', 'users.id', '=', 'actualities.user_id')
            ->join('categories', 'categories.id', '=', 'actualities.category_id')
            ->join('preferences', 'preferences.category_id', '=', 'categories.id')
            ->whereNull('actualities.actuality_id')
            ->where('preferences.user_id', Auth::guard('api')->user()->id)
            ->orderBy('actualities.created_at', 'desc')
            ->with('likes')
            ->with('comments.user')
            ->with('comments.likes')
            ->get();

        return $this->response(200, $actualities);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'category_id' => 'required|exists:categories,id',
            'message' => 'required',
        ]);

        $actuality = Actuality::create([
            'category_id' => $request->get('category_id'),
            'message' => $request->get('message'),
            'user_id' => Auth::guard('api')->user()->id,
            'image' => 0,
        ]);

        return $this->response(200, $actuality);
    }
}
