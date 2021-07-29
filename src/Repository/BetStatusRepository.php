<?php

namespace App\Repository;

use App\Entity\BetStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BetStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method BetStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method BetStatus[]    findAll()
 * @method BetStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BetStatusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BetStatus::class);
    }
}
