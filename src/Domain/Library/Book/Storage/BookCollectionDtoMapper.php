<?php

namespace App\Domain\Library\Book\Storage;

use App\Domain\Library\Book\Collection\BookDtoCollection;

interface BookCollectionDtoMapper
{
    public function mapFromArray(array $data): BookDtoCollection;
    public function mapToArray(BookDtoCollection $bookDtoCollection): array;
    public function mapToJson(BookDtoCollection $bookDtoCollection): string;
}