<?php
/**
 * Created by PhpStorm.
 * User: mmaheo
 * Date: 26/08/2017
 * Time: 12:09
 */

namespace App\Utilities;

use App\Category;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CustomMail
{

    public static function actualityCreatedPreferences($category_id, $message)
    {
        $category = Category::findOrFail($category_id);

        $usersForNewsletter = User::select('users.email', 'users.forname', 'users.name')
            ->join('preferences', 'preferences.user_id', '=', 'users.id')
            ->where('users.newsletter', 1)
            ->where('preferences.category_id', $category_id)
            ->get()
            ->chunk(45)
            ->toArray();

        foreach ($usersForNewsletter as $group) {
            foreach ($group as $user) {

                Mail::send('emails.actu', ['user' => $user, 'writer' => Auth::user(), 'content' => $message, 'categoryName' => $category->name], function ($message) use ($user) {
                    $message->from('contact@aslectra.com', 'ACTU ASLectra');

                    $message->to($user['email'], $user['forname'])->subject('Nouvelle actualité ASLectra');
                });
            }
        }
    }

}