<?php declare(strict_types=1);

namespace Phpmvc\Core\Logger\Formatters;

class JsonFormatter extends FormatterAbstract
{
    public function __construct()
    {
        $this->setFormatTemplate(json_encode([
            'datetime' => '{datetime}',
            'level'    => '{level}',
            'message'  => '{message}'
        ]));
    }
}
