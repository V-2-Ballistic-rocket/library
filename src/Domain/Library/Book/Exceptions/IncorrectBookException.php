<?php

namespace App\Domain\Library\Book\Exceptions;

use App\DomainLayer\Exceptions\DomainException;
use Throwable;

class IncorrectBookException extends DomainException
{
    public function __construct(
        string $message = "Некорректно введены данные книги",
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