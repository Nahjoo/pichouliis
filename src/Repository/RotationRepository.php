<?php

namespace App\Repository;

use App\Entity\Rotation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Rotation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rotation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rotation[]    findAll()
 * @method Rotation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RotationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Rotation::class);
    }

    // /**
    //  * @return Rotation[] Returns an array of Rotation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Rotation
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
