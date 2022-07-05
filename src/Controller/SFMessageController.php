<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SFMessageController extends AbstractController
{
    public function sendMessage(InputInterface $input, OutputInterface $output)
    {
        $output->writeln($input->getArgument('message'));
        $output->writeln('I printed ' . $input->getArgument('message'));
    }
}
