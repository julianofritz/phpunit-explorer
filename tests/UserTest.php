<?php

use Mockery\Adapter\Phpunit\MockeryTestCase;

class UserTest extends MockeryTestCase
{
    public function testSendMessage()
    {
        $mailer = $this->createMock(Mailer::class);
        $mailer->method('sendMessage')->willReturn(true);

        $user = new User($mailer);

        $response = $user->send('teste@teste.com', 'message teste');

        $this->assertTrue($response);
    }

    public function testSendMessageMockBuilder()
    {
        $user = $this->getMockBuilder('paymentGateway')
            ->setMethods(['process'])
            ->getMock();

        $user->method('process')
            ->willReturn(true);


        $this->assertTrue($user->process());
    }
}