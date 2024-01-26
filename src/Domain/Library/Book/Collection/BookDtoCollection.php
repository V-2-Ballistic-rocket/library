<?php

namespace App\Domain\Library\Book\Collection;

use App\common\Abstract\AbstractCollection;

class BookDtoCollection extends AbstractCollection
{
    public function __construct(BookDto ...$bookDto)
    {
        $this->collection = $bookDto;
    }
    protected function getClassName(): string
    {
        return BookDto::class;
    }

}