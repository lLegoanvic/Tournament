<?php

namespace App\Repository;

use App\Entity\CallOfStat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CallOfStat>
 *
 * @method CallOfStat|null find($id, $lockMode = null, $lockVersion = null)
 * @method CallOfStat|null findOneBy(array $criteria, array $orderBy = null)
 * @method CallOfStat[]    findAll()
 * @method CallOfStat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CallOfStatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CallOfStat::class);
    }

//    /**
//     * @return CallOfStat[] Returns an array of CallOfStat objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CallOfStat
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
