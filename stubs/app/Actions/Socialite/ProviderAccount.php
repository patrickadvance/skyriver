<?php

namespace App\Actions\Skyriver\Socialite;

use Laravel\Socialite\Facades\Socialite;

class ProviderAccount
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function handle($provider, $providerToken = null, $providerSecret = null)
    {
        $socialiteProvider = Socialite::driver($provider)->stateless();

        if($providerToken && $providerSecret){

            return $socialiteProvider->userFromTokenAndSecret($providerToken, $providerSecret);
        }

        if($providerToken){

            return $socialiteProvider->stateless()->userFromToken($providerToken);
        }

       return $socialiteProvider->user();
    }
}
