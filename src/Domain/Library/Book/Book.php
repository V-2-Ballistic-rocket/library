<?php
namespace App\Domain\Library\Book;

class Book
{
    public function __construct(
        private string $id = '',
        private string $name = '',
        private string $description = '',
        private float  $rating = 0,
        private string $price = '',
        private array  $authorsName = []
    )
    {}

    public function getPrice(): string
    {
        return $this->price;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getRating(): float
    {
        return $this->rating;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getAuthorsName(): array
    {
        return $this->authorsName;
    }
}