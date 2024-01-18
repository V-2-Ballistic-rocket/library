<?php

namespace App\Domain\Library\Store;

use App\Domain\Library\Author\Author;
use App\Domain\Library\Book\Book;

interface LibraryStoreManager
{
    public function addNewBook(Book $book): void;
    public function addNewAuthor(Author $author): void;
}