<?php

namespace CultuurNet\MailMicroservice\ContactLists;

use Symfony\Component\HttpFoundation\Response;

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

    public function get()
    {
        return new Response(
            'OK',
            Response::HTTP_OK
        );
    }

    /**
     * @param string $email
     * @param string $mailinglistid
     * @return string
     */
    public function put($email, $mailinglistid)
    {
        if (true) {
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
