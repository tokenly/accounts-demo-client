<?php 

namespace App;

use App\OAuthProviders\TokenlyProvider;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Contracts\Factory as Socialite;


/**
*  Authenticate User
*/
class AuthenticateUser
{
    
    function __construct(UserRepository $users, Socialite $socialite, Guard $auth)
    {
        $this->users     = $users;
        $this->socialite = $socialite;
        $this->auth      = $auth;

        // add tokenly
        $this->socialite->extend('tokenly', function($app) {
            $config = $app['config']['services.tokenly'];

            return new TokenlyProvider(
                $app['request'], $config['client_id'],
                $config['client_secret'], $config['redirect']
            );
        });
    }

    public function execute($hasCode, $listener) {
        if (!$hasCode) { return $this->getAuthorizatonFirst(); }

        $userData = $this->getUser();
        Log::info('$userData:'.json_encode($userData, 192));

        $user = $this->users->findByUsernameOrCreate($userData);
        $this->auth->login($user, true);

        // redirect
        return $listener->userHasLoggedIn($user);
    }

    protected function getAuthorizatonFirst() {
        // return $this->socialite->driver('github')->redirect();
        return $this->socialite->driver('tokenly')->redirect();
    }

    protected function getUser() {
        // return $this->socialite->driver('github')->user();
        return $this->socialite->driver('tokenly')->user();
    }
}