<?php

namespace App\Repository;

use App\Entity\Element;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


class ElementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Element::class);
    }

    public function listAll()
    {
        $qb = $this->createQueryBuilder('e')
            ->orderBy('e.name')
        ;

        return $qb->getQuery()->execute();
    }
}
