<?php

namespace App\common\Validators;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class ContainsRatingValidator extends ConstraintValidator
{
    /**
     * @inheritDoc
     */
    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof ContainsRating) {
            throw new UnexpectedTypeException($constraint, ContainsRating::class);
        }
        if (null === $value || '' === $value) {
            throw new UnexpectedTypeException($constraint, ContainsRating::class);
        }
        if (!is_numeric($value)){
            throw new UnexpectedTypeException($value, 'int');
        }

        if(intval($value) > 10 or intval($value) < 0 or iconv_strlen($value) > 3){
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $value)
                ->addViolation();
        }

    }
}