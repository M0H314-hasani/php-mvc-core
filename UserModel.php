<?php
/**
 * User: TheCodeholic
 * Date: 7/25/2020
 * Time: 10:13 AM
 */

namespace Phpmvc\Core;

use Phpmvc\Core\Db\DbModel;

/**
 * Class UserModel
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package Phpmvc\Core
 */
abstract class UserModel extends DbModel
{
    abstract public function getDisplayName(): string;
}