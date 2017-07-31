<?php

namespace CultuurNet\MailMicroservice\ContactLists;

use Symfony\Component\HttpFoundation\Response;
use ValueObjects\Number\Integer;
use ValueObjects\Web\EmailAddress;

class ContactListsController
{
    /**
     * @var ContactLists
     */
    private $contactLists;

    /**
     * ContactListsController constructor.
     * @param ContactLists $contactLists
     */
    public function __construct(ContactLists $contactLists)
    {
        $this->contactLists = $contactLists;
    }

    /**
     * @param string $email
     * @param string $mailinglistid
     * @return string
     */
    public function get($email, $mailinglistid)
    {
        $emailAddress = new EmailAddress($email);
        $mId = new Integer($mailinglistid);
        $response = $this->contactLists->manageContact($emailAddress, $mId);
        if ($response->success()) {
            return new Response(
                'OK Get',
                Response::HTTP_OK
            );
        } else {
            return new Response(
                'Bad Request Get',
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    /**
     * @param string $email
     * @param string $mailinglistid
     * @return string
     */
    public function put($email, $mailinglistid)
    {
        $emailAddress = new EmailAddress($email);
        $mId = new Integer($mailinglistid);
        $response = $this->contactLists->manageContact($emailAddress, $mId);
        if ($response->success()) {
            return new Response(
                'OK Put',
                Response::HTTP_OK
            );
        } else {
            return new Response(
                'Bad Request Put',
                Response::HTTP_BAD_REQUEST
            );
        }
    }
}
