<?php

namespace CultuurNet\MailMicroservice\Controller;

use CultuurNet\MailMicroservice\ContactLists\ContactListsController;
use Silex\Application;
use Silex\ControllerCollection;
use Silex\ControllerProviderInterface;

class ContactListsControllerProvider implements ControllerProviderInterface
{
    /**
     * @inheritdoc
     */
    public function connect(Application $app)
    {
        $app['mms.contactlists_controller'] = $app->share(
            function (Application $app) {
                return new ContactListsController($app['mms.contact_lists']);
            }
        );

        /* @var ControllerCollection $controllers */
        $controllers = $app['controllers_factory'];

        $controllers->get(
            '/',
            'mms.contactlists_controller:get'
        );

        $controllers->put(
            '/{email}/{mailinglistid}',
            'mms.contactlists_controller:get'
        );

        $controllers->put('/');

        return $controllers;
    }
}