<?php

namespace App\Domain\Library\Book\Dto;

readonly class AddBookDto
{
    public function __construct(
        public string $name = '',
        public string $description = '',
        public float $rating = 0
    )
    {}
}