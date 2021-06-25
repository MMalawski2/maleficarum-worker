<?php


namespace Maleficarum\Worker\Logger\Facility;


use Maleficarum\ContextTracing\ContextTracker;

class ContextSyslog extends Syslog
{
    public function write($data, string $level): \Maleficarum\Worker\Logger\Facility\Facility
    {
        if (is_array($data)) {
            $data['context'] = array_merge($data['context'] ?? [], ContextTracker::getTracer()->flatten());
        }

        parent::write($data, $level);

        return $this;
    }

}