<?php

namespace CultuurNet\MailMicroservice\ContactLists;

use Mailjet\Client;
use Mailjet\Resources;
use Mailjet\Response;
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
     * @return Response
     */
    public function manageContact(EmailAddress $emailAddress, IntegerLiteral $mailingListId)
    {
        $body = [
            'Email' => $emailAddress->toNative(),
            'Action' => "addforce",
        ];

        // the casing used by the MailJet API causes Warnings
        // @codingStandardsIgnoreStart
        $response = $this->mailJetClient->post(
            Resources::$ContactslistManagecontact,
            ['id' => $mailingListId->toNative(), 'body' => $body]
        );

        return $response;
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
