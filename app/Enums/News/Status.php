<?php

namespace App\Enums\News;

enum Status: string
{
    case ACTIVE = 'active';
    case DRAFT = 'draft';
    case BLOCKED = 'blocked';

    public static function getEnums(): array {
        return [
            self::DRAFT->value,
            self::ACTIVE->value,
            self::BLOCKED->value,
        ];
    }
}
