<?php

namespace App\Domain\Library\Book\Dto;

readonly class DeleteBookDto
{
    public function __construct(
        public string $id
    )
    {
    }
}