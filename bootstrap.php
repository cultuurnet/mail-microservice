<?php

use CultuurNet\MailMicroservice\ContactLists\ContactLists;
use Igorw\Silex\ConfigServiceProvider;
use JDesrosiers\Silex\Provider\CorsServiceProvider;
use Mailjet\Client;
use Silex\Application;

$app = new Application();

if (!isset($appConfigLocation)) {
    $appConfigLocation =  __DIR__;
}

$app->register(new ConfigServiceProvider($appConfigLocation . '/config.yml'));

$allowed_domains = implode(' ',$app['domains']);

$app->register(new CorsServiceProvider(), [
    "cors.allowOrigin" =>  $allowed_domains,
]);



/**
 * Turn debug on or off.
 */
$app['debug'] = $app['debug'] === true;

$app['mms.client'] = function (Application $app){
        return new Client($app['mailjet']['key'],
            $app['mailjet']['secret']
        );
    };

$app['mms.contact_lists'] = function (Application $app) {
        return new ContactLists($app['mms.client']);
    };

return $app;
