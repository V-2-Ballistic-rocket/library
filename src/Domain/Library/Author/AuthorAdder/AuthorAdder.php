<?php

namespace App\Domain\Library\Author\AuthorAdder;

use App\Domain\Library\Author\Dto\CreateAuthorDto;
use App\Domain\Library\Author\Factory\AuthorFactory;
use App\Domain\Library\Store\LibraryStoreManager;

class AuthorAdder
{
    public function __construct(
        private LibraryStoreManager $libraryStoreManager,
        private AuthorFactory $authorFactory
    )
    {}

    public function AddNewBook(CreateAuthorDto $createAuthorDto): void
    {
        $author = $this->authorFactory->createAuthor($createAuthorDto);
        $this->libraryStoreManager->addNewAuthor($author);
    }
}