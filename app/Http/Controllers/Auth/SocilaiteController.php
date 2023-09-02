<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocilaiteController extends Controller
{
    // socialiate google,facebook,twitter
    public function login($provider){
        return Socialite::driver($provider)->redirect();
    }

    public function redirect($provider){
        $socilaite = Socialite::driver($provider)->user();

        $user=User::updateOrCreate([
                'provider_id'=>$socilaite->getId(),
                'provider' => $provider
            ],
            [
                'name' => $socilaite->getName(),
                'email' => $socilaite->getEmail(),

            ]
        );

        Auth::login($user,True);

        return redirect('/dashboard');
    }
}
