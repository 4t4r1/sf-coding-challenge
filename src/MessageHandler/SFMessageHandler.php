<?php

namespace App\MessageHandler;

use App\Message\SFMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class SFMessageHandler implements MessageHandlerInterface
{
    public function __invoke(SFMessage $SFMessage)
    {
        $SFMessage->getOutput()->writeln($SFMessage->getInput()->getArgument('message'));
        $SFMessage->getOutput()->writeln('I printed ' . $SFMessage->getInput()->getArgument('message'));
    }
}
