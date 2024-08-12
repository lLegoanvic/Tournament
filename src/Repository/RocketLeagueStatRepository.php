<?php

namespace App\Repository;

use App\Entity\RocketLeagueStat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RocketLeagueStat>
 *
 * @method RocketLeagueStat|null find($id, $lockMode = null, $lockVersion = null)
 * @method RocketLeagueStat|null findOneBy(array $criteria, array $orderBy = null)
 * @method RocketLeagueStat[]    findAll()
 * @method RocketLeagueStat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RocketLeagueStatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RocketLeagueStat::class);
    }

//    /**
//     * @return RocketLeagueStat[] Returns an array of RocketLeagueStat objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?RocketLeagueStat
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
