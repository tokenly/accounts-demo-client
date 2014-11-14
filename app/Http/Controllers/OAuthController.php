<?php namespace App\Http\Controllers;

use App\AuthenticateUser;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Two\InvalidStateException;

class OAuthController extends Controller {

    /**
     * login
     * @Get("/login", as="login")
     * @return [type] [description]
     */
    public function login(AuthenticateUser $authenticateUser, Request $request) {
        // authenticate the user
        try {
            return $authenticateUser->execute($request->has('code'), $this);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            if (!strlen($message) AND $e instanceof InvalidStateException) {
                $message = 'This authentication request was not valid or has expired. Please try again.';
            }
            return view('error', ['error' => $message]);
        }
        
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
