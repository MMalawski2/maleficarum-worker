<?php


namespace Maleficarum\Worker\Logger\Processor;


interface Processor
{
    /**
     * @param array|string $data
     * @return array|string
     */
    public function process($data);
}