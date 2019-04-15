<?php

namespace App\Repository;

use App\Entity\Variete;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Variete|null find($id, $lockMode = null, $lockVersion = null)
 * @method Variete|null findOneBy(array $criteria, array $orderBy = null)
 * @method Variete[]    findAll()
 * @method Variete[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VarieteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Variete::class);
    }

    // /**
    //  * @return Variete[] Returns an array of Variete objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Variete
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
