<?php
/**
 * User: TheCodeholic
 * Date: 7/25/2020
 * Time: 11:33 AM
 */

namespace Phpmvc\Core\middlewares;


use Phpmvc\Core\Application;
use Phpmvc\Core\Exception\ForbiddenException;

/**
 * Class AuthMiddleware
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package Phpmvc\Core
 */
class AuthMiddleware extends BaseMiddleware
{
    protected array $actions = [];

    public function __construct($actions = [])
    {
        $this->actions = $actions;
    }

    public function execute()
    {
        if (Application::isGuest()) {
            if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
                throw new ForbiddenException();
            }
        }
    }
}