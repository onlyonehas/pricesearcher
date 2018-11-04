<?php

namespace App\Repository;

use App\Entity\ActionItems;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ActionItems|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActionItems|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActionItems[]    findAll()
 * @method ActionItems[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActionItemsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ActionItems::class);
    }

    // /**
    //  * @return ActionItems[] Returns an array of ActionItems objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ActionItems
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
