<?php

namespace App\Enums;

enum Status: string
{
    case PENDING = 'P';
    case ACTIVE = 'A';
    case INACTIVE = 'I';
    case DELETED = 'D';
}
