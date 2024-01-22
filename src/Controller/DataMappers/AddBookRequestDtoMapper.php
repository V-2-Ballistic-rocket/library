<?php

namespace App\Controller\DataMappers;

use App\Controller\Dto\AddBookRequestDto;
use App\Domain\Library\Book\Dto\CreateBookDto;

class AddBookRequestDtoMapper
{
    public function mapToAddBookDto(AddBookRequestDto $dto): CreateBookDto
    {
        return new CreateBookDto(
            $dto->name,
            $dto->description,
            (float)$dto->rating,
            $dto->price,
            $dto->authorsName
        );
    }
}