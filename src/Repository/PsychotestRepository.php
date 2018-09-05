<?php

namespace App\Repository;

use App\Entity\Psychotest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Psychotest|null find($id, $lockMode = null, $lockVersion = null)
 * @method Psychotest|null findOneBy(array $criteria, array $orderBy = null)
 * @method Psychotest[]    findAll()
 * @method Psychotest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PsychotestRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Psychotest::class);
    }

//    /**
//     * @return Psychotest[] Returns an array of Psychotest objects
//     */
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
    public function findOneBySomeField($value): ?Psychotest
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
