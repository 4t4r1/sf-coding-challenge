<?php

namespace App\Command;

use App\Controller\SFMessageController;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class SFMessageCommand extends Command
{
    /**
     * @var MessageBusInterface $bus
     */
    private $bus;

    /**
     * The name of the command.
     *
     * @var string $defaultName
     */
    protected static $defaultName = 'app:sfmessage';

    /**
     * The description displayed when running `php bin/console list`.
     *
     * @var string $defaultDescription
     */
    protected static $defaultDescription = 'Outputs a message.';

    public function __construct(string $name = null, MessageBusInterface $bus = null)
    {
        parent::__construct($name);
        $this->bus = $bus;
    }

    protected function configure()
    {
        $this->addArgument('message', InputArgument::REQUIRED, 'The message to display.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // send the message via a controller
        $messenger = new SFMessageController();
        $messenger->sendMessage($input, $output, $this->bus);

        // this method must return an integer number with the "exit status code"
        // of the command. You can also use these constants to make code more readable

        // return this if there was no problem running the command
        // (it's equivalent to returning int(0))
        return Command::SUCCESS;

        // or return this if some error happened during the execution
        // (it's equivalent to returning int(1))
        // return Command::FAILURE;

        // or return this to indicate incorrect command usage; e.g. invalid options
        // or missing arguments (it's equivalent to returning int(2))
        // return Command::INVALID
    }
}
