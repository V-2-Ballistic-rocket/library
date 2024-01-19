<?php

namespace App\Application\LibraryStoreManager\Postgres;

use App\Domain\Library\Author\Author;
use App\Domain\Library\Book\Book;
use App\Domain\Library\Storage\LibraryStorageManager;

class LibraryPostgresManager implements LibraryStorageManager
{
    public function addNewBook(Book $book): void
    {
        echo '';
    }
    public function addNewAuthor(Author $author): void
    {
        echo '';
    }
}