<?php
/**
 * Created by PhpStorm.
 * User: mmaheo
 * Date: 26/08/2017
 * Time: 12:13
 */

namespace App\Utilities;


use App\DeviceToken;
use App\User;
use LaravelFCM\Facades\FCM;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;

class CustomNotification
{
    public static function actualityCreatedPreferences($user, $actuality)
    {
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60 * 20);

        $message = $actuality->message;

        if (strlen($message) > 100) {
            $message = substr($message, 0, 100) . '...';
        }

        $notificationBuilder = new PayloadNotificationBuilder('Nouvelle actualité publié par ' . $user->forname . ' ' . $user->name);
        $notificationBuilder
            ->setBody($message)
            ->setSound('default');

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();

        $usersForNotification = User::select('users.email', 'users.forname', 'users.name')
            ->join('preferences', 'preferences.user_id', '=', 'users.id')
            ->where('preferences.category_id', $actuality->category_id)
            ->get();
        $allTokens = DeviceToken::all();
        $tokens = [];

        foreach ($usersForNotification as $user) {
            foreach ($allTokens as $token) {
                if ($user->email == $token->email) {
                    $tokens[] = $token->token;
                }
            }
        }

        if(count($tokens) <= 0) {
            return;
        }

        $downstreamResponse = FCM::sendTo($tokens, $option, $notification);

        foreach ($downstreamResponse->tokensToDelete() as $tokenToDelete) {
            DeviceToken::where('token', $tokenToDelete)->delete();
        }

        foreach ($downstreamResponse->tokensWithError() as $tokenWithError) {
            DeviceToken::where('token', $tokenWithError)->delete();
        }

        foreach ($downstreamResponse->tokensToModify() as $tokenToModify) {
            $deviceToken = DeviceToken::where('token', $tokenToModify)->firstOrFail();

            $deviceToken->update([
                'token' => $tokenToModify,
            ]);
        }
    }
}