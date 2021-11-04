<?php


namespace Maleficarum\Worker\Extractor;


interface HeaderExtractor
{
    /**
     * @param array<string, string> $headers
     */
    public function extract(array $headers): void;
}