<?php namespace Acordes\Http\Controllers\Club\Auth;

use Acordes\Http\Controllers\Controller;
use Acordes\User;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Socialize;

class SocialController extends Controller {

    public function fbRedirect() {
        return Socialize::with('facebook')->redirect();
    }

    public function fb(User $user) {

        $fbUser = Socialize::with('facebook')->user();

        if(User::where('email', '=', $fbUser->email)->first())
        {
            $checkUser = User::where('email', '=', $fbUser->email)->first();
            Auth::login($checkUser);
            return redirect(route('publicInicio'));
        }

        $user->facebook_id = $fbUser->getId();
        $user->name = $fbUser->getName();
        $user->email = $fbUser->getEmail();
        $user->avatar = $fbUser->getAvatar();
        $user->type = 1;
        $user->save();

        Auth::login($user);

        return \Redirect::back();
    }

}
