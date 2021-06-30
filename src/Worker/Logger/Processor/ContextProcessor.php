<?php


namespace Maleficarum\Worker\Logger\Processor;


use Maleficarum\ContextTracing\ContextTracker;

class ContextProcessor implements Processor
{
    /**
     * @inheritDoc
     */
    public function process($data)
    {
        if (is_array($data)) {
            $data['context'] = array_merge($data['context'] ?? [], ContextTracker::getTracer()->flatten());
        }
        if (is_string($data)) {
            $data .= 'Context: ' . json_encode(ContextTracker::getTracer()->flatten());
        }

        return $data;
    }

}