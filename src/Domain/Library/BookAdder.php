<?php

namespace App\Domain\Library;

use App\Domain\Library\Book\Dto\AddBookDto;
use App\Domain\Library\Book\Factory\BookFactory;
use App\Domain\Library\Book\Mappers\AddBookDtoMapper;
use App\Domain\Library\Store\LibraryStoreManager;

class BookAdder
{
    public function __construct(
        private LibraryStoreManager $libraryStoreManager,
        private BookFactory $bookFactory,
        private AddBookDtoMapper $addBookDtoMapper
    )
    {}

    public function AddNewBook(AddBookDto $addBookDto): void
    {
        $book = $this->bookFactory->createBook($this->addBookDtoMapper->mapToCreateBookDto($addBookDto));
        $this->libraryStoreManager->addNewBook($book);
    }
}