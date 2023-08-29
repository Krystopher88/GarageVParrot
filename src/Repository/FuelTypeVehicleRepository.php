<?php

namespace App\Repository;

use App\Entity\FuelTypeVehicle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FuelTypeVehicle>
 *
 * @method FuelTypeVehicle|null find($id, $lockMode = null, $lockVersion = null)
 * @method FuelTypeVehicle|null findOneBy(array $criteria, array $orderBy = null)
 * @method FuelTypeVehicle[]    findAll()
 * @method FuelTypeVehicle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FuelTypeVehicleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FuelTypeVehicle::class);
    }

//    /**
//     * @return FuelTypeVehicle[] Returns an array of FuelTypeVehicle objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?FuelTypeVehicle
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
