<?php

use Phpmvc\Core\Logger\Formatters\DefaultFormatter;
use Phpmvc\Core\Logger\Formatters\JsonFormatter;
use Phpmvc\Core\Logger\Handlers\StreamHandler;
use Phpmvc\Core\Logger\Logger;
use PHPUnit\Framework\TestCase;

class LoggerTest extends TestCase
{
    public function testLogger()
    {
        $log = new Logger();
        $handler = new StreamHandler(__DIR__.'/logFile.log');
        $handler->setFormatter(new DefaultFormatter);
        $log->pushHandler($handler);
        $log->info('my name is {firstName} {lastName}', ['firstName' => 'Mohsen', 'lastName' => 'Hasani']);
        
        $file = file_get_contents(__DIR__.'/logFile.log', 'r');
        unlink(__DIR__.'/logFile.log');      

        $this->assertMatchesRegularExpression("/^(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2}):(\d{2})\+(\d{2}):(\d{2}) - \[info] => my name is Mohsen Hasani\\n$/", $file);


    }
}