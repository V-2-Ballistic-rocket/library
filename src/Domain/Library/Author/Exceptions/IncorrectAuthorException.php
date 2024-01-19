<?php

namespace App\Domain\Library\Author\Exceptions;

use App\DomainLayer\Exceptions\DomainException;
use Throwable;

class IncorrectAuthorException extends DomainException
{
    public function __construct(
        string $message = "Некорректно введены данные писателя",
        int $code = 0,
        Throwable $previous = null
    )
    {
        parent::__construct($message, $code, $previous);
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}