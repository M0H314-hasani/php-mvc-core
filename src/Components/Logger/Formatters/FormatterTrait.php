<?php declare(strict_types=1);

namespace Phpmvc\Core\Components\Logger\Formatters;


trait FormatterTrait
{
    protected ?AbstractFormatter $formatter = null;

    public function setFormatter(AbstractFormatter $formatter)
    {
        $this->formatter = $formatter;
    }

    protected function format(array $record)
    {
        return call_user_func($this->formatter, $record);
    }
}
