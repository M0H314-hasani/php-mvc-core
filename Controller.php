<?php
/**
 * User: TheCodeholic
 * Date: 7/8/2020
 * Time: 8:43 AM
 */

namespace Phpmvc\Core;

use Phpmvc\Core\Middlewares\BaseMiddleware;
/**
 * Class Controller
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package Phpmvc\Core
 */
class Controller
{
    public string $layout = 'main';
    public string $action = '';

    /**
     * @var \Phpmvc\Core\BaseMiddleware[]
     */
    protected array $middlewares = [];

    public function setLayout($layout): void
    {
        $this->layout = $layout;
    }

    public function render($view, $params = []): string
    {
        return Application::$app->router->renderView($view, $params);
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    /**
     * @return \Phpmvc\Core\Middlewares\BaseMiddleware[]
     */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}