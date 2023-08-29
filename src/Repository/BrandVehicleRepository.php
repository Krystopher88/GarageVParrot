<?php

namespace App\Repository;

use App\Entity\BrandVehicle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BrandVehicle>
 *
 * @method BrandVehicle|null find($id, $lockMode = null, $lockVersion = null)
 * @method BrandVehicle|null findOneBy(array $criteria, array $orderBy = null)
 * @method BrandVehicle[]    findAll()
 * @method BrandVehicle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BrandVehicleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BrandVehicle::class);
    }

//    /**
//     * @return BrandVehicle[] Returns an array of BrandVehicle objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?BrandVehicle
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
