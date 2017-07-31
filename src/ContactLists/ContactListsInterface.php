<?php

namespace CultuurNet\MailMicroservice\ContactLists;

use ValueObjects\Number\Integer as IntegerLiteral;
use ValueObjects\Web\EmailAddress;

interface ContactListsInterface
{
    /**
     * Starts the parser
     * @param EmailAddress $emailAddress
     * @param IntegerLiteral $mailingListId
     * @return bool
     */
    public function manageContact(EmailAddress $emailAddress, IntegerLiteral $mailingListId);
}
