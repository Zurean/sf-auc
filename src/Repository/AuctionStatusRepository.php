<?php

namespace App\Repository;

use App\Entity\AuctionStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AuctionStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method AuctionStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method AuctionStatus[]    findAll()
 * @method AuctionStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AuctionStatusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AuctionStatus::class);
    }

    // /**
    //  * @return AuctionStatus[] Returns an array of AuctionStatus objects
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
    public function findOneBySomeField($value): ?AuctionStatus
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
