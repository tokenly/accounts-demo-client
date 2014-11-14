<?php

return [

    'urlbase'          => getenv('TOKENLYOAUTH_URL_BASE') ?: 'http://accounts.tokenly.co',
    'internal_urlbase' => getenv('TOKENLY_INTERNAL_OAUTH_URL_BASE') ?: 'http://accounts.tokenly.co',

];
