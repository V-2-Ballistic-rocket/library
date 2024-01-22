<?php

namespace App\Controller;

use App\Controller\DataMappers\CreateBookDtoMapper;
use App\Domain\Library\Book\Dto\DeleteBookDto;
use App\Domain\Library\Book\Storage\BookStorageManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
class BookController extends AbstractController
{
    public function __construct(
        private BookStorageManager $bookStorageManager,
        private CreateBookDtoMapper $addBookRequestDtoMapper
    )
    {
    }

    #[Route('/book', name: 'add_books', methods: ['POST'])]
    public function addBook(Request $request): JsonResponse
    {
        $data = $request->request->all();
        $createBookDto = $this->addBookRequestDtoMapper->mapFromArray($data);

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
        return new JsonResponse($this->bookStorageManager->getBooks(), 200);
    }

    #[Route('/book/{id}', name: 'delete_book', methods: ['DELETE'])]
    public function deleteBook(string $id): JsonResponse
    {
        $this->bookStorageManager->deleteBook(new DeleteBookDto($id));
        return $this->json([], 200);
    }
}
