<?php

namespace App\Postgres\mappers;

class BookMapper
{
    public function mapToArray(array $booksEntities): array
    {
        $books = [];
        foreach ($booksEntities as $book)
        {
            $books = [
                'id' => $book->getId(),
                'name' => $book->getName(),
                'description' => $book->getDescription(),
                'rating' => $book->getRating(),
                'price' => $book->getPrice(),
                'authorsName' => $book->getAuthorsName()
            ];
        }
        return $books;
    }
}