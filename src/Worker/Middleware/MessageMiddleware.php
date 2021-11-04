<?php


namespace Maleficarum\Worker\Middleware;


interface MessageMiddleware
{
    public function extract(\PhpAmqpLib\Message\AMQPMessage $message): void;
}