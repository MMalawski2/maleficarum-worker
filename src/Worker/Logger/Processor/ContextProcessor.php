<?php


namespace Maleficarum\Worker\Logger\Processor;


use Maleficarum\ContextTracing\ContextTracker;
use Maleficarum\ContextTracing\Logger\Formatter;

class ContextProcessor implements Processor
{
    /**
     * @inheritDoc
     */
    public function process($data)
    {
        $flatContext = ContextTracker::getTracer()->flatten();

        $data['message'] = Formatter::format($data['message'], $flatContext);

        return $data;
    }

}