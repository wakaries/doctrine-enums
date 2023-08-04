<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
class Audit
{
    #[ORM\Column(length: 255)]
    private string $userId;
    #[ORM\Column(type: "datetime", nullable: true)]
    private ?\DateTimeInterface $lastUpdated = null;
    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $created;

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId(string $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getLastUpdated(): ?\DateTimeInterface
    {
        return $this->lastUpdated;
    }

    /**
     * @param \DateTimeInterface $lastUpdated
     */
    public function setLastUpdated(\DateTimeInterface $lastUpdated): void
    {
        $this->lastUpdated = $lastUpdated;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCreated(): \DateTimeInterface
    {
        return $this->created;
    }

    /**
     * @param \DateTimeInterface $created
     */
    public function setCreated(\DateTimeInterface $created): void
    {
        $this->created = $created;
    }
}
