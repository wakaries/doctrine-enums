<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

class TypeDoctrine extends StringType
{
    public function getName(): string
    {
        return 'ElementType';
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): mixed
    {
        if ($value == null) {
            return null;
        }
        return $value->getId();
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): mixed
    {
        if ($value == null) {
            return null;
        }
        return TypeRepository::getItems()[$value];
    }
}
