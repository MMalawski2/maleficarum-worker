<?php


namespace Maleficarum\Worker\Logger\Facility;


use Maleficarum\ContextTracing\ContextTracker;

class Context extends Syslog
{
    public function write($data, string $level): \Maleficarum\Worker\Logger\Facility\Facility
    {
        if (is_array($data)) {
            $data['context'] = array_merge($data['context'] ?? [], ContextTracker::getTracer()->flatten());
        }
        if (is_string($data)) {
            $data .= 'Context: ' . json_encode(ContextTracker::getTracer()->flatten());
        }

        parent::write($data, $level);

        return $this;
    }

}