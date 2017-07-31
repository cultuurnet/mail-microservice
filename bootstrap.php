<?php

use CultuurNet\MailMicroservice\ContactLists\ContactLists;
use DerAlex\Silex\YamlConfigServiceProvider;
use JDesrosiers\Silex\Provider\CorsServiceProvider;
use Mailjet\Client;
use Silex\Application;

$app = new Application();

if (!isset($appConfigLocation)) {
    $appConfigLocation =  __DIR__;
}
$app->register(new YamlConfigServiceProvider($appConfigLocation . '/config.yml'));

$allowed_domains = implode(' ',$app['config']['domains']);

$app->register(new CorsServiceProvider(), [
    "cors.allowOrigin" =>  $allowed_domains,
]);



/**
 * Turn debug on or off.
 */
$app['debug'] = $app['config']['debug'] === true;

$app['mms.client'] = $app->share(
    function (Application $app){
        return new Client($app['config']['mailjet']['key'],
            $app['config']['mailjet']['secret']
        );
    }
);

$app['mms.contact_lists'] = $app->share(
    function (Application $app) {
        return new ContactLists($app['mms.client']);
    }
);

return $app;
