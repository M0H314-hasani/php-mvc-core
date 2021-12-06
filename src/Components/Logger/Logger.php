<?php declare(strict_types=1);

namespace Phpmvc\Core\Components\Logger;

use DateTimeImmutable;
use DateTimeZone;
use Exception;
use Phpmvc\Core\Components\Logger\Handlers\AbstractHandler;
use Phpmvc\Core\Components\Logger\Handlers\HandlerInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use Stringable;

class Logger extends LogLevel implements LoggerInterface
{

    /**
     * @var HandlerInterface[]
     */
    protected $handlers = [];

    /**
     * @param AbstractHandler $param
     * @return self
     */
    public function pushHandler(AbstractHandler $handler): self
    {
        array_unshift($this->handlers, $handler);

        return $this;
    }

    protected function addRecord(string $level, string $message, array $context = [])
    {
        if (empty($this->handlers))
            throw new Exception("No Handler set");
            
        $record = [
            'datetime' => new DateTimeImmutable(timezone:new DateTimeZone(date_default_timezone_get() ?: 'UTC')),
            'level' => $level,
            'message' => $message,
            'context' => $context
        ];

        foreach ($this->handlers as $handler) {
            $handler->handle($record);
        }
    }

    public function log($level, string|Stringable $message, array $context = []): void
    {
        $this->addRecord($level, (string) $message, $context);
    }

    public function emergency(string|Stringable $message, array $context = []): void 
    {
        $this->addRecord(static::EMERGENCY, (string) $message, $context);
    }

    public function alert(string|Stringable $message, array $context = []): void 
    {
        $this->addRecord(static::ALERT, (string) $message, $context);
    }

    public function critical(string|Stringable $message, array $context = []): void 
    {
        $this->addRecord(static::CRITICAL, (string) $message, $context);
    }

    public function error(string|Stringable $message, array $context = []): void 
    {
        $this->addRecord(static::ERROR, (string) $message, $context);
    }

    public function warning(string|Stringable $message, array $context = []): void 
    {
        $this->addRecord(static::WARNING, (string) $message, $context);
    }

    public function notice(string|Stringable $message, array $context = []): void 
    {
        $this->addRecord(static::NOTICE, (string) $message, $context);
    }

    public function info(string|Stringable $message, array $context = []): void 
    {
        $this->addRecord(static::INFO, (string) $message, $context);
    }

    public function debug(string|Stringable $message, array $context = []): void 
    {
        $this->addRecord(static::DEBUG, (string) $message, $context);
    }
}
