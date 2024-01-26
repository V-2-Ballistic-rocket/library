<?php

namespace App\Postgres\mappers;

use App\Domain\Library\Book\Collection\BookDto;
use App\Domain\Library\Book\Collection\BookDtoCollection;
use App\Domain\Library\Book\Storage\BookCollectionDtoMapper;

class BooksCollectionMapper implements BookCollectionDtoMapper
{
    public function mapFromArray(array $data): BookDtoCollection
    {
        $collection = new BookDtoCollection();

        foreach ($data as $book){
            $collection[] = new BookDto(
                $book['id'],
                $book['name'],
                $book['description'],
                $book['rating'],
                $book['price'],
                $book['authorsName']
            );
        }
        return $collection;
    }

    public function mapToArray(BookDtoCollection $bookDtoCollection): array
    {
        $collection = [];

        foreach ($bookDtoCollection as $key => $book)
        {
            $collection[] = [
                'id' => $book->id,
                'name' => $book->name,
                'description' => $book->description,
                'rating' => $book->rating,
                'price' => $book->price,
                'authorsName' => $book->authorsName
            ];
        }
        return $collection;
    }

    public function MapToJson(BookDtoCollection $bookDtoCollection): string
    {
        return json_encode($this->mapToArray($bookDtoCollection), JSON_UNESCAPED_UNICODE);
    }
}