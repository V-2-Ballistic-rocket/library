<?php

namespace App\Domain\Library\Storage;

use App\Domain\Library\Author\Author;
use App\Domain\Library\Book\Book;

interface LibraryStorageManager
{
    public function addNewBook(Book $book): void;
    public function addNewAuthor(Author $author): void;
}