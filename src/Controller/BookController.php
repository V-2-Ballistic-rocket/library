<?php

namespace App\Controller;

use App\Controller\DataMappers\AddBookRequestDtoMapper;
use App\Controller\Dto\AddBookRequestDto;
use App\Domain\Library\Book\Dto\DeleteBookDto;
use App\Domain\Library\Book\Storage\BookStorageManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    public function __construct(
        private BookStorageManager $bookStorageManager,
        private AddBookRequestDtoMapper $addBookRequestDtoMapper
    )
    {
    }

    #[Route('/book', name: 'add_books', methods: ['POST'])]
    public function addBook(
        AddBookRequestDto $dto, string $name = ''
    ): JsonResponse
    {
        dd($name);
        $createBookDto = $this->addBookRequestDtoMapper->mapToAddBookDto($dto);
        try {
            $this->bookStorageManager->addNewBook($createBookDto);
        } catch (\Exception $exception) {
            return $this->json(json_encode($exception->getMessage()), 503);
        }
        return $this->json(['message' => 'success!'], 200);
    }

    #[Route('/book', name: 'get_book', methods: ['GET'])]
    public function getBook(): JsonResponse
    {
        return $this->json([$this->bookStorageManager->getBooks()], 200);
    }

    #[Route('/book', name: 'delete_book', methods: ['DELETE'])]
    public function deleteBook(string $id): JsonResponse
    {
        $this->bookStorageManager->deleteBook(new DeleteBookDto($id));
        return $this->json([], 200);
    }
}
