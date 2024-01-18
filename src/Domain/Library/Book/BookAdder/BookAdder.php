<?php

namespace App\Domain\Library\Book\BookAdder;

use App\Domain\Library\Book\Dto\CreateBookDto;
use App\Domain\Library\Book\Factory\BookFactory;
use App\Domain\Library\Store\LibraryStoreManager;

class BookAdder
{
    public function __construct(
        private LibraryStoreManager $libraryStoreManager,
        private BookFactory $bookFactory
    )
    {}

    public function AddNewBook(CreateBookDto $createBookDto): void
    {
        $book = $this->bookFactory->createBook($createBookDto);
        $this->libraryStoreManager->addNewBook($book);
    }
}