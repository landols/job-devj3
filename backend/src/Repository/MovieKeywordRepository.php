<?php

namespace App\Repository;

use App\Entity\MovieKeyword;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MovieKeyword>
 *
 * @method MovieKeyword|null find($id, $lockMode = null, $lockVersion = null)
 * @method MovieKeyword|null findOneBy(array $criteria, array $orderBy = null)
 * @method MovieKeyword[]    findAll()
 * @method MovieKeyword[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovieKeywordRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MovieKeyword::class);
    }

    //    /**
    //     * @return MovieKeyword[] Returns an array of MovieKeyword objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('m.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?MovieKeyword
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
