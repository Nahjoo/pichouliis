<?php

namespace App\Repository;

use App\Entity\Subarea;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Subarea|null find($id, $lockMode = null, $lockVersion = null)
 * @method Subarea|null findOneBy(array $criteria, array $orderBy = null)
 * @method Subarea[]    findAll()
 * @method Subarea[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubareaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Subarea::class);
    }

    // /**
    //  * @return Subarea[] Returns an array of Subarea objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Subarea
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
