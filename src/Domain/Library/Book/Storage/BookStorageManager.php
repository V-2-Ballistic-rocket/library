<?php

namespace App\Domain\Library\Book\Storage;

use App\Domain\Library\Book\Dto\AddBookDto;
use App\Domain\Library\Book\Dto\CreateBookDto;
use App\Domain\Library\Book\Dto\DeleteBookDto;
use App\Domain\Library\Book\Factory\BookFactory;

class BookStorageManager
{
    public function __construct(
        private LibraryStorageManager $libraryStorageManager,
        private BookFactory           $bookFactory,
        private BookCollectionDtoMapper $bookCollectionDtoMapper
    )
    {}

    public function addNewBook(CreateBookDto $createBookDto): void
    {
        $book = $this->bookFactory->createBook($createBookDto);
        $this->libraryStorageManager->addNewBook(new AddBookDto(
            $book->getId(),
            $book->getName(),
            $book->getDescription(),
            $book->getRating(),
            $book->getPrice(),
            $book->getAuthorsName()
        ));
    }


    public function deleteBook(DeleteBookDto $deleteBookDto): void
    {
        $this->libraryStorageManager->deleteBook($deleteBookDto);
    }

    public function getBooks(): string
    {
        $bookDtoCollection = $this->libraryStorageManager->getBooks();
        return $this->bookCollectionDtoMapper->mapToJson($bookDtoCollection);
    }
}