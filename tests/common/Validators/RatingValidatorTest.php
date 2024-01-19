<?php

namespace App\Tests\common\Validators;

use App\common\Validators\ContainsRating;
use App\common\Validators\ContainsRatingValidator;
use Symfony\Component\Validator\Test\ConstraintValidatorTestCase;

class RatingValidatorTest extends ConstraintValidatorTestCase
{
    /**
     * @inheritDoc
     */
    protected function createValidator(): ContainsRatingValidator
    {
        return new ContainsRatingValidator();
    }
    /**
     * @dataProvider validRatingProvide
     */
    public function testValidPhoneNumber($rating): void
    {
        $constraint = new ContainsRating();
        $this->validator->validate($rating, $constraint);

        $this->assertNoViolation();
    }

    public function validRatingProvide(): array
    {
        return [
            [
                0
            ],
            [
                10
            ],
            [
                9.90
            ],
            [
                1.1
            ]
        ];
    }
}