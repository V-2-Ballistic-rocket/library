<?php

namespace App\Domain\Library\Book\BookAdder;

use App\Domain\Library\Book\Dto\CreateBookDto;
use App\Domain\Library\Book\Factory\BookFactory;
use App\Domain\Library\Storage\LibraryStorageManager;

class BookAdder
{
    public function __construct(
        private LibraryStorageManager $libraryStorageManager,
        private BookFactory           $bookFactory
    )
    {}

    public function addNewBook(CreateBookDto $createBookDto): void
    {
        $book = $this->bookFactory->createBook($createBookDto);
        $this->libraryStorageManager->addNewBook($book);
    }
}