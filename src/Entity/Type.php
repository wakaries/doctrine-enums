<?php

namespace App\Entity;

class Type
{
    public function __construct(private readonly string $id, private readonly string $title, private readonly string $description) {}

    public function getId(): string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
