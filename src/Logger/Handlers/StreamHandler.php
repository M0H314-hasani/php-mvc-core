<?php

namespace Phpmvc\Core\Logger\Handlers;

class StreamHandler extends AbstractHandler
{
    private $stream;
    public function __construct($stream)
    {
        $this->stream = fopen($stream, "a") or die("Unable to open log file!");
    }

    public function __destruct()
    {
        fclose($this->stream);
    }

    protected function write($log): void
    {
        fwrite($this->stream, $log.PHP_EOL);
    }

}
