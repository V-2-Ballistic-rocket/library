<?php

namespace App\Controller\Library\Dto;

readonly class AddBookRequestDto
{
    public function __construct(
        public mixed $name = '',
        public mixed $description = '',
        public mixed $rating = '',
        public mixed $price = 0,
        public mixed $authorsName = []
    )
    {
    }
}