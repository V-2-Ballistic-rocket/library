<?php

namespace App\Tests\Domain\Library\Book\BookAdder;

use App\Domain\Library\Book\Book;
use App\Domain\Library\Book\Dto\CreateBookDto;
use App\Domain\Library\Book\Factory\BookFactory;
use App\Domain\Library\Book\Storage\BookStorageManager;
use App\Postgres\LibraryPostgresManager;
use App\Postgres\mappers\BooksCollectionMapper;
use PHPUnit\Framework\TestCase;

class BookStorageManagerTest extends TestCase
{
    public function testAddNewBook()
    {
        // ������� �������� ������������
        $libraryStorageManagerMock = $this->getMockBuilder(LibraryPostgresManager::class)
            ->disableOriginalConstructor()
            ->getMock();
        $bookFactoryMock = $this->getMockBuilder(BookFactory::class)
            ->disableOriginalConstructor()
            ->getMock();
        $bookCollectionMapperMock = $this->getMockBuilder(BooksCollectionMapper::class)
            ->getMock();;
        // ������� ��������� ������ BookStorageManager � ���������� ������������
        $bookAdder = new BookStorageManager(
            $libraryStorageManagerMock,
            $bookFactoryMock,
            $bookCollectionMapperMock
        );

        // ������� CreateBookDto
        $createBookDto = new CreateBookDto(
            'book name',
            'book description',
            8.8,
            '750,00',
            ['author1', 'author2']
        );

        // ������� �������� ��� ��������� �����
        $bookMock = $this->getMockBuilder(Book::class)
            ->getMock();

        // ������������� �������� ��� ������� ��������
        $bookFactoryMock->expects($this->once())
            ->method('createBook')
            ->with($createBookDto)
            ->willReturn($bookMock);


        // �������� ����������� �����
        $bookAdder->addNewBook($createBookDto);
    }
}
