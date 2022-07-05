<?php

namespace App\MessageHandler\Event;

use App\Message\Event\SFMessageEvent;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class SFMessagePrinted implements MessageHandlerInterface
{
    public function __invoke(SFMessageEvent $SFMessageEvent)
    {
        $SFMessageEvent->getOutput()->writeln('I printed ' . $SFMessageEvent->getInput()->getArgument('message'));
    }
}
