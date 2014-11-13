<?php 

namespace App\OAuthProviders;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\ProviderInterface;
use Laravel\Socialite\Two\User;
use Symfony\Component\HttpFoundation\RedirectResponse;

class TokenlyProvider extends AbstractProvider implements ProviderInterface {

    /**
     * The scopes being requested.
     *
     * @var array
     */
    protected $scopes = ['user,email'];

    /**
     * {@inheritdoc}
     */
    protected function getAuthUrl($state)
    {
        // return $this->buildAuthUrlFromBase('https://github.com/login/oauth/authorize', $state);
        return $this->buildAuthUrlFromBase(Config::get('tokenlyoauth.urlbase').'/oauth/authorize', $state);
    }

    public function getAccessToken($code)
    {
        Log::info('code='.$code);
        Log::info('tokenFields='.json_encode($this->getTokenFields($code), 192));
        return parent::getAccessToken($code);

        // $response = $this->getHttpClient()->post($this->getTokenUrl(), [
        //     'headers' => ['Accept' => 'application/json'],
        //     'body' => $this->getTokenFields($code),
        // ]);

        // return $this->parseAccessToken($response->getBody());
    }

    /**
     * Get the POST fields for the token request.
     *
     * tokenly oAuth server needs a grant_type
     *
     * @param  string  $code
     * @return array
     */
    protected function getTokenFields($code)
    {
        return array_add(
            parent::getTokenFields($code), 'grant_type', 'authorization_code'
        );
    }


    /**
     * {@inheritdoc}
     */
    protected function getTokenUrl()
    {
        // return 'https://github.com/login/oauth/access_token';
        return Config::get('tokenlyoauth.urlbase').'/oauth/access-token';
    }

    /**
     * {@inheritdoc}
     */
    protected function getUserByToken($token)
    {
        $response = $this->getHttpClient()->get(Config::get('tokenlyoauth.urlbase').'/oauth/user?access_token='.$token, [
            'headers' => [
                'Accept' => 'application/vnd.github.v3+json',
            ],
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * {@inheritdoc}
     */
    protected function mapUserToObject(array $user)
    {
        return (new User)->setRaw($user)->map([
            'id'       => $user['id'],
            'username' => $user['username'],
            'email'    => $user['email'],
        ]);
    }

}