<?php declare(strict_types=1);

namespace Phpmvc\Core\Components\Logger\Formatters;

class DefaultFormatter extends AbstractFormatter
{
    public function __construct()
    {
        $this->setFormatTemplate("{datetime} - [{level}] => {message}");
    }
}
