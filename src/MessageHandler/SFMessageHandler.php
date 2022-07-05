<?php

namespace App\MessageHandler;

use App\Message\Event\SFMessageEvent;
use App\Message\SFMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class SFMessageHandler implements MessageHandlerInterface
{
    /**
     * @var MessageBusInterface $bus
     */
    private $bus;

    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;
    }

    public function __invoke(SFMessage $SFMessage)
    {
        $SFMessage->getOutput()->writeln($SFMessage->getInput()->getArgument('message'));

        // dispatches synchronous event to the default bus
        $this->bus->dispatch(new SFMessageEvent($SFMessage->getInput(), $SFMessage->getOutput()));
    }
}
