<?php declare(strict_types=1);

namespace Phpmvc\Core\Support\Facade;

trait FacadeTrait
{
    public static function __callStatic($name, $arguments): mixed
    {
        $obj = static::getFacadeObj();

        return call_user_func([$obj, $name], ...$arguments);
    }

    abstract protected static function getFacadeObj();
}
