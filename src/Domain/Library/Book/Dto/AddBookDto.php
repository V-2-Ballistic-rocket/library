<?php

namespace App\Domain\Library\Book\Dto;

readonly class AddBookDto
{
    public function __construct(
        public string $id = '',
        public string $name = '',
        public string $description = '',
        public float $rating = 0,
        public string $price = '',
        public array $authorsName = []
    )
    {}
}