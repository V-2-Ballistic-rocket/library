<?php

namespace App\Domain\Library\Book\Mappers;

use App\Domain\Library\Book\Dto\AddBookDto;
use App\Domain\Library\Book\Dto\CreateBookDto;

class AddBookDtoMapper
{
    public function mapToCreateBookDto(AddBookDto $addBookDto): CreateBookDto
    {
        return new CreateBookDto(
            $addBookDto->name,
            $addBookDto->description,
            $addBookDto->rating
        );
    }
}