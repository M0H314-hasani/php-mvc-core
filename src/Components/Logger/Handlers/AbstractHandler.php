<?php

namespace Phpmvc\Core\Components\Logger\Handlers;

use Phpmvc\Core\Components\Logger\Formatters\FormatterTrait;

abstract class AbstractHandler
{
    use FormatterTrait;

    abstract protected function write($log): void;

    public function handle(array $record)
    {
        $formattedRecord = $this->format($record);

        $this->write($formattedRecord);
    }

}