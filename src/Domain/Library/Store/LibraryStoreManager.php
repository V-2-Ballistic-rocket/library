<?php

namespace App\Domain\Library\Store;

use App\Domain\Library\Book\Book;

interface LibraryStoreManager
{
    public function addNewBook(Book $book): void;
}