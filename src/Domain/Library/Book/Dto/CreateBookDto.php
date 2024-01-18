<?php

namespace App\Domain\Library\Book\Dto;
use App\common\Validators as CustomAssert;
use Symfony\Component\Validator\Constraints as Assert;
readonly class CreateBookDto
{
    public function __construct(
        #[Assert\Length(
            min: 3,
            max: 300,
            minMessage: 'Название слишком короткое',
            maxMessage: 'Максимальная длина названия {{ limit }} символов',
        )]
        public string $name = '',
        #[Assert\Length(
            min: 60,
            max: 2000,
            minMessage: 'Название слишком короткое',
            maxMessage: 'Максимальная длина названия {{ limit }} символов',
        )]
        public string $description = '',
        #[CustomAssert\ContainsRating]
        public float $rating = 0
    )
    {}
}