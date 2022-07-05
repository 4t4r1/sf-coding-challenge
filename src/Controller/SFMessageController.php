<?php

namespace App\Controller;

use App\Message\SFMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class SFMessageController extends AbstractController
{
    public function sendMessage(InputInterface $input, OutputInterface $output, MessageBusInterface $bus)
    {
        $message = new SFMessage($input, $output);
        $bus->dispatch($message);
    }
}
