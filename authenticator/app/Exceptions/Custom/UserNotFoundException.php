<?php

namespace App\Exceptions\Custom;

use Exception;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class UserNotFoundException extends Exception
{
    /**
     * @param int $statusCode
     * @param Throwable|null $throwable
     */
    public function __construct($statusCode = Response::HTTP_UNPROCESSABLE_ENTITY, Throwable $throwable = null)
    {
        parent::__construct(__("custom.exception.user_not_found"), $statusCode, $throwable);
    }
}
