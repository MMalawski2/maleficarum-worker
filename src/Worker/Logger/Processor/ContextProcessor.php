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

        if(is_string($data)) {
            $data = Formatter::format($data, $flatContext);
        }
        if(is_array($data)) {
            $data['message'] = Formatter::format($data['message'], $flatContext);
        }

        return $data;
    }

}