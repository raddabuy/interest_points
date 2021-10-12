<?php

namespace App\Exceptions;

use Exception;

class CityNotFoundException extends Exception
{
    public function __construct($message = "Точек интереса в данном городе нет в системе", Throwable $previous = null)
    {
        parent::__construct($message, 0, $previous);
    }
}
