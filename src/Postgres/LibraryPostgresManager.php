<?php

namespace App\Postgres;

use App\Domain\Library\Book\Collection\BookDtoCollection;
use App\Domain\Library\Book\Dto\AddBookDto;
use App\Domain\Library\Book\Dto\DeleteBookDto;
use App\Domain\Library\Book\Storage\LibraryStorageManager;
use App\Entity\Book;
use App\Postgres\mappers\BookMapper;
use App\Postgres\mappers\BooksCollectionMapper;
use Doctrine\Persistence\ManagerRegistry;

class LibraryPostgresManager implements LibraryStorageManager
{
    public function __construct(
        private ManagerRegistry       $registry,
        private BookMapper            $bookMapper,
        private BooksCollectionMapper $collectionMapper
    )
    {
    }

    public function addNewBook(AddBookDto $bookDto): void
    {
        {
            $entityManager = $this->registry->getManagerForClass(Book::class);
            $book = new Book(
                $bookDto->id,
                $bookDto->name,
                $bookDto->description,
                $bookDto->rating,
                $bookDto->price,
                $bookDto->authorsName
            );
            $entityManager->persist($book);
            $entityManager->flush();
        }
    }

    public function deleteBook(DeleteBookDto $bookDto): void
    {
        $entityManager = $this->registry->getManagerForClass(Book::class);
        $book = $entityManager->getRepository(Book::class)->find($bookDto->id);

        if ($book) {
            $entityManager->remove($book);
            $entityManager->flush();
        }
    }

    public function getBooks(): BookDtoCollection
    {
        $entityManager = $this->registry->getManagerForClass(Book::class);
        $repository = $entityManager->getRepository(Book::class);
        $books = $repository->findAll();
        $array = $this->bookMapper->mapToArray($books);
        return $this->collectionMapper->mapFromArray($array);
    }
}