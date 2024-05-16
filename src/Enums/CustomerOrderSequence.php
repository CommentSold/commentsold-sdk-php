<?php

namespace CommentSold\Enums;

enum CustomerOrderSequence: string
{
    case FirstOrder  = 'first-order';
    case SecondOrder = 'second-order';
    case ThirdOrder  = 'third-order';

    public function sequenceToNumericOrder(): int
    {
        return match ($this) {
            self::FirstOrder  => 1,
            self::SecondOrder => 2,
            self::ThirdOrder  => 3
        };
    }

    public static function numericOrderToSequence(int $sequence): ?self
    {
        return match ($sequence) {
            1       => self::FirstOrder,
            2       => self::SecondOrder,
            3       => self::ThirdOrder,
            default => null
        };
    }
}
