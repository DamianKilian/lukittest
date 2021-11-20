<?php

namespace App\Repository;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function categoryProducts($slug, $sortProductsBy = null)
    {
        $categoryRepository = $this
            ->getEntityManager()
            ->getRepository(Category::class)
        ;
        $categoryTreeIds = $categoryRepository->categoryTreeIds($slug);
        $qb = $this->createQueryBuilder('p')
            ->innerJoin('p.categories','c')
            ->where("c.id IN(:categoryTreeIds)")
            ->setParameter('categoryTreeIds', array_values($categoryTreeIds))
        ;
        $order = 'ASC';
        $sort = 'p.name';
        if('nameDesc' === $sortProductsBy){
            $order = 'DESC';
        }elseif('price' === $sortProductsBy){
            $sort = 'p.price';
        }
        $qb->orderBy($sort, $order);
        return $qb->getQuery()->getResult();
    }



    // /**
    //  * @return Product[] Returns an array of Product objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Product
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
