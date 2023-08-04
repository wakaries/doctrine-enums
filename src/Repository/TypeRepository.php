<?php

namespace App\Repository;

use App\Entity\Type;

class TypeRepository
{
    public static function getItems(): array
    {
        return [
            'T00' => new Type('T00', 'Type 0', 'Description type zero'),
            'T01' => new Type('T01', 'Type 1', 'Description type one'),
            'T02' => new Type('T02', 'Type 2', 'Description type two'),
            'T03' => new Type('T03', 'Type 3', 'Description type three'),
        ];
    }

    public function getByIdOrNull(string $id): ?Type
    {
        return @self::getItems()[$id];
    }
}
