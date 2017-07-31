<?php

require_once __DIR__ . '/../vendor/autoload.php';

use CultuurNet\MailMicroservice\Controller\ContactListsControllerProvider;
use Silex\Application;
use Silex\Provider\ServiceControllerServiceProvider;

/** @var Application $app */
$app = require __DIR__ . '/../bootstrap.php';

/**
 * Allow to use services as controllers.
 */
$app->register(new ServiceControllerServiceProvider());

$app->mount('/', new ContactListsControllerProvider());

$app->run();
