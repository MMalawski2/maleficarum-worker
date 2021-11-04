<?php


namespace Maleficarum\Worker\Middleware;

use Maleficarum\ContextTracing\Carrier\Generic\Initializer;

class ContextTrackerMessageMiddleware implements MessageMiddleware
{
    public function extract(\PhpAmqpLib\Message\AMQPMessage $message): void
    {
        $headers = $message->has('application_headers') ? $message->get('application_headers')->getNativeData() : [];
        Initializer::initialize($headers, 'worker', []);
    }

}