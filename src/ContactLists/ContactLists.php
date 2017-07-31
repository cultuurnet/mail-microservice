<?php

namespace CultuurNet\MailMicroservice\ContactLists;

use Mailjet\Client;
use Mailjet\Resources;
use ValueObjects\Number\Integer as IntegerLiteral;
use ValueObjects\Web\EmailAddress;

class ContactLists implements ContactListsInterface
{
    /**
     * @var Client
     */
    protected $mailJetClient;

    /**
     * Starts the parser
     * @param EmailAddress $emailAddress
     * @param IntegerLiteral $mailingListId
     * @return bool
     */
    public function manageContact(EmailAddress $emailAddress, IntegerLiteral $mailingListId)
    {
        //$apiKey = '8c919521a1e67368a2f66882ce39d3e0';
        //$apiSecret = '3565201b534d0d46f1f01e88d899475b';

        //$mailJetClient = new Client($apiKey, $apiSecret);

        $body = [
            'Email' => $emailAddress->toNative(),
            'Action' => "addforce",
        ];

        $response = $this->mailJetClient->post(
            Resources::$ContactslistManagecontact,
            ['id' => $mailingListId->toNative(), 'body' => $body]
        );
        if ($response->success()) {
            var_dump($response->getData());
        } else {
            var_dump($response->getStatus());
        }
    }

    /**
     * ContactLists constructor.
     * @param Client $mailJetClient
     */
    public function __construct(Client $mailJetClient)
    {
        $this->mailJetClient = $mailJetClient;
    }
}
