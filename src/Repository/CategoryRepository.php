<?php

namespace App\Repository;

use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {

        parent::__construct($registry, Category::class);
    }

    public function mainCategories()
    {
        $queryBuilder = $this->createQueryBuilder('c');
        $queryBuilder
            ->addSelect('ch')
            ->leftJoin('c.children', 'ch')
            ->where('c.parent IS NULL')
        ;
        return $queryBuilder
            ->getQuery()
            ->getResult();
    }
}
