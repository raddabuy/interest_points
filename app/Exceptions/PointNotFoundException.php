<?php

namespace App\Exceptions;

use Exception;

class PointNotFoundException extends Exception
{
    public function __construct($message = "Несуществующая точка интереса", Throwable $previous = null)
    {
        parent::__construct($message, 0, $previous);
    }
}
