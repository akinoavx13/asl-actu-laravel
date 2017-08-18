<?php

namespace App\Http\Controllers;

use App\Actuality;
use App\Category;
use App\Preference;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;

class ApiCommentsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'feed_id' => 'required|exists:actualities,id',
            'message' => 'required',
        ]);

        $actuality = Actuality::select(
            'users.forname',
            'users.name',
            'categories.name as category_name',
            'categories.color as category_color',
            'categories.id as category_id',
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
            ->where('actualities.id', $request->get('feed_id'))
            ->with('likes')
            ->with('comments.user')
            ->with('comments.likes')
            ->firstOrFail();

        $actuality->comments()->create([
            'category_id'  => $actuality->category_id,
            'user_id'      => Auth::guard('api')->user()->id,
            'actuality_id' => $actuality->id,
            'message'      => $request->get('message'),
            'image'        => 0,
        ]);

        $actuality = Actuality::select(
            'users.forname',
            'users.name',
            'categories.name as category_name',
            'categories.color as category_color',
            'categories.id as category_id',
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
            ->where('actualities.id', $request->get('feed_id'))
            ->with('likes')
            ->with('comments.user')
            ->with('comments.likes')
            ->firstOrFail();

        return $this->response(200, $actuality);
    }
}
