<?php

namespace App\Domain\Library\Book\Storage;

use App\Domain\Library\Book\Collection\BookDtoCollection;
use App\Domain\Library\Book\Dto\AddBookDto;
use App\Domain\Library\Book\Dto\DeleteBookDto;

interface LibraryStorageManager
{
    public function addNewBook(AddBookDto $bookDto): void;
    public function deleteBook(DeleteBookDto $bookDto): void;
    public function getBooks(): BookDtoCollection;
}