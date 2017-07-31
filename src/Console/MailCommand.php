<?php

namespace CultuurNet\MailMicroservice\Console;

use CultuurNet\MailMicroservice\ContactLists\ContactListsInterface;
use Knp\Command\Command;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use ValueObjects\Number\Integer as IntegerLiteral;
use ValueObjects\Web\EmailAddress;

class MailCommand extends Command
{
    /**
     * @var ContactListsInterface
     */
    protected $contactLists;

    /**
     * WatchCommand constructor.
     * @param ContactListsInterface $contactLists
     */
    public function __construct(ContactListsInterface $contactLists)
    {
        $this->contactLists = $contactLists;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('managecontact')
            ->setDescription('Start the managecontact.')
            ->setDefinition(
                new InputDefinition(
                    array(
                        new InputOption('email', 'e', InputOption::VALUE_REQUIRED),
                        new InputOption('mailingListId', 'm', InputOption::VALUE_REQUIRED),
                    )
                )
            );
    }

    /**
     * @inheritdoc
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $email = new EmailAddress($input->getOption('email'));
        $mailingListId = IntegerLiteral::fromNative($input->getOption('mailingListId'));

        $this->contactLists->manageContact(
            $email,
            $mailingListId
        );
    }
}
