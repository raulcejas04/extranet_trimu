<?php

namespace App\Repository;

use App\Entity\GrumpyGnome;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GrumpyGnome|null find($id, $lockMode = null, $lockVersion = null)
 * @method GrumpyGnome|null findOneBy(array $criteria, array $orderBy = null)
 * @method GrumpyGnome[]    findAll()
 * @method GrumpyGnome[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GrumpyGnomeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GrumpyGnome::class);
    }

    // /**
    //  * @return GrumpyGnome[] Returns an array of GrumpyGnome objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GrumpyGnome
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
