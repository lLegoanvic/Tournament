<?php

namespace App\Repository;

use App\Entity\LeagueOfLegendStat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LeagueOfLegendStat>
 *
 * @method LeagueOfLegendStat|null find($id, $lockMode = null, $lockVersion = null)
 * @method LeagueOfLegendStat|null findOneBy(array $criteria, array $orderBy = null)
 * @method LeagueOfLegendStat[]    findAll()
 * @method LeagueOfLegendStat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LeagueOfLegendStatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LeagueOfLegendStat::class);
    }

//    /**
//     * @return LeagueOfLegendStat[] Returns an array of LeagueOfLegendStat objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?LeagueOfLegendStat
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
