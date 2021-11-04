<?php


namespace Maleficarum\Worker\Extractor;


use Maleficarum\ContextTracing\Carrier\Amqp\AmqpInitializer;

class ContextTrackerHeaderExtractor implements HeaderExtractor
{
    public function extract(array $headers): void
    {
        AmqpInitializer::initialize($headers, 'worker');
    }

}