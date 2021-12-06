<?php declare(strict_types=1);

namespace Phpmvc\Core\Foundation;

use Phpmvc\Core\Components\Logger\Formatters\DefaultFormatter;
use Phpmvc\Core\Components\Logger\Handlers\StreamHandler;
use Phpmvc\Core\Components\Logger\Logger as LoggerComponent;
use Stringable;

class Logger extends AbstractFoundation
{  
    private LoggerComponent $logger;

    protected function __construct()
    {
        $this->logger = new LoggerComponent();
        $handler = new StreamHandler(__DIR__.'/logFile.log');
        $handler->setFormatter(new DefaultFormatter);
        $this->logger->pushHandler($handler);
    }

    protected static function getFacadeObj()
    {
        return static::getInstance();
    }

    public function log($level, string|Stringable $message, array $context = []): void
    {
        $this->logger->log($level, (string) $message, $context);
    }

    public function emergency(string|Stringable $message, array $context = []): void 
    {
        $this->logger->emergency($message, $context);
    }

    public function alert(string|Stringable $message, array $context = []): void 
    {
        $this->logger->alert($message, $context);
    }

    public function critical(string|Stringable $message, array $context = []): void 
    {
        $this->logger->alert($message, $context);
    }

    public function error(string|Stringable $message, array $context = []): void 
    {
        $this->logger->alert($message, $context);
    }

    public function warning(string|Stringable $message, array $context = []): void 
    {
        $this->logger->warning($message, $context);
    }

    public function notice(string|Stringable $message, array $context = []): void 
    {
        $this->logger->notice($message, $context);
    }

    public function info(string|Stringable $message, array $context = []): void 
    {
        $this->logger->info($message, $context);
    }

    public function debug(string|Stringable $message, array $context = []): void 
    {
        $this->logger->debug($message, $context);
    }  
}
