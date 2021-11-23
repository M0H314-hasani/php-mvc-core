<?php
/**
 * User: TheCodeholic
 * Date: 7/25/2020
 * Time: 11:43 AM
 */

namespace Phpmvc\Core\exception;


/**
 * Class NotFoundException
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package Phpmvc\Core\exception
 */
class NotFoundException extends \Exception
{
    protected $message = 'Page not found';
    protected $code = 404;
}