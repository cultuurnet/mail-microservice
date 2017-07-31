<?php

namespace CultuurNet\MailMicroservice\Controller;

use CultuurNet\MailMicroservice\ContactLists\ContactListsController;
use Silex\ControllerProviderInterface;
use Silex\Application;
use Silex\ControllerCollection;

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
            '/{email}/{mailinglistid}',
            'mms.contactlists_controller:get'
        );

        $controllers->put(
            '/{email}/{mailinglistid}',
            'mms.contactlists_controller:put'
        );

        return $controllers;
    }
}
