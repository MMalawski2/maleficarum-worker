<?php


namespace Maleficarum\Worker\Middleware;


interface MessageMiddleware
{
    public function process(\PhpAmqpLib\Message\AMQPMessage $message): void;
}