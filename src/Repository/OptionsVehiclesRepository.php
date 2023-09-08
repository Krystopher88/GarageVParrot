<?php

namespace App\Repository;

use App\Entity\OptionsVehicles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OptionsVehicles>
 *
 * @method OptionsVehicles|null find($id, $lockMode = null, $lockVersion = null)
 * @method OptionsVehicles|null findOneBy(array $criteria, array $orderBy = null)
 * @method OptionsVehicles[]    findAll()
 * @method OptionsVehicles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OptionsVehiclesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OptionsVehicles::class);
    }

//    /**
//     * @return OptionsVehicles[] Returns an array of OptionsVehicles objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?OptionsVehicles
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
