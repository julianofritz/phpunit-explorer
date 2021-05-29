<?php

use Mockery\Adapter\Phpunit\MockeryTestCase;

class PaymentTest extends MockeryTestCase
{
    /**
     * @test
     */
    public function successPayment()
    {
        $gateway = $this->getMockBuilder('Gateway')
            ->setMethods(['pay'])
            ->getMock();

        $gateway->method('pay')
            ->willReturn(200);

        $payment = new Payment($gateway);

        $this->assertEquals(200, $payment->credit());
    }

    public function testException()
    {
        $gateway = Mockery::mock('Gateway');
        $gateway->shouldReceive('pay')
            ->andThrow(Exception::class, 'problemas no pagmento', 555);

        $payment = new Payment($gateway);

        $this->expectException(Exception::class);
        $this->expectExceptionCode(555);
        $this->expectExceptionMessage('problemas no pagmento');
        $payment->credit();
    }


}