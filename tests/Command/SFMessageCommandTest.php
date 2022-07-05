<?php

namespace App\Tests\Command;

use App\Command\SFMessageCommand;

class SFMessageCommandTest extends AbstractCommandTest
{
    public function testSFMessageMatches()
    {
        $commandTester = $this->executeCommand(['message' => 'Hello world']);
        $this->assertMatchesRegularExpression('/^Hello world/', $commandTester->getDisplay());
        $this->assertMatchesRegularExpression('/I printed Hello world$/', $commandTester->getDisplay());
    }

    public function testSFMessageDoesNotMatch()
    {
        $commandTester = $this->executeCommand(['message' => 'Goodbye world']);
        $this->assertDoesNotMatchRegularExpression('/^Hello world/', $commandTester->getDisplay());
        $this->assertDoesNotMatchRegularExpression('/I printed Hello world$/', $commandTester->getDisplay());
    }

    protected function getCommandFqcn(): string
    {
        return SFMessageCommand::class;
    }
}
