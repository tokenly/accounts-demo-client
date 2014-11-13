<?php namespace App\Http\Controllers;

use App\AuthenticateUser;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class OAuthController extends Controller {

    /**
     * login
     * @Get("/login", as="login")
     * @return [type] [description]
     */
    public function login(AuthenticateUser $authenticateUser, Request $request) {
        // authenticate the user
        return $authenticateUser->execute($request->has('code'), $this);
        
        // return \Socialite::with('github')->redirect();
    }

    public function userHasLoggedIn($user) {
        return redirect('/');
    }

    /**
     * logout
     * @Get("/logout", as="logout")
     * @return [type] [description]
     */
    public function logout() {
        Auth::logout();
        return view('logout');
    }

}
