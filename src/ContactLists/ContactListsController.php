<?php

namespace CultuurNet\MailMicroservice\ContactLists;

use Symfony\Component\HttpFoundation\Request;
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
     * @param Request $request
     * @param string $email
     * @param string $mailinglistid
     * @return string
     */
    public function get(Request $request, $email, $mailinglistid)
    {
        $emailAddress = new EmailAddress($email);
        $mId = new Integer($mailinglistid);
        $response = $this->contactLists->manageContact($emailAddress, $mId);
        if ($response->success()) {
            return new Response(
                'OK',
                Response::HTTP_OK
            );
        } else {
            return new Response(
                'Bad Request',
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
                'OK',
                Response::HTTP_OK
            );
        } else {
            return new Response(
                'Bad Request',
                Response::HTTP_BAD_REQUEST
            );
        }
    }
}
