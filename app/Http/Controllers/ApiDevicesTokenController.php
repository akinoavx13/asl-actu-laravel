<?php

namespace App\Http\Controllers;

use App\DeviceToken;
use Illuminate\Http\Request;

use App\Http\Requests;

class ApiDevicesTokenController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'token'    => 'required|string',
            'platform' => 'required|in:ios,android',
            'email' => 'required',
        ]);

        DeviceToken::create([
            'token'    => $request->get('token'),
            'platform' => $request->get('platform'),
            'email' => $request->get('email'),
        ]);

        return $this->response(200, null);
    }
}
