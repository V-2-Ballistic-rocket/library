<?php

namespace App\Controller\DataMappers;

use App\Controller\Dto\AddBookRequestDto;
use App\Domain\Library\Book\Dto\CreateBookDto;

class CreateBookDtoMapper
{
    public function mapFromArray(array $data): CreateBookDto
    {
        $authorsName = explode( ', ', $data['authorsName']);
        return new CreateBookDto(
            $data['name'],
            $data['description'],
            (float)$data['rating'],
            $data['price'],
            $authorsName
        );
    }
}