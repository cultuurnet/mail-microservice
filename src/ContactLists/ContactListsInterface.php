<?php

namespace CultuurNet\MailMicroservice\ContactLists;

use Mailjet\Response;
use ValueObjects\Number\Integer as IntegerLiteral;
use ValueObjects\Web\EmailAddress;

interface ContactListsInterface
{
    /**
     * Starts the parser
     * @param EmailAddress $emailAddress
     * @param IntegerLiteral $mailingListId
     * @return Response
     */
    public function manageContact(EmailAddress $emailAddress, IntegerLiteral $mailingListId);
}
