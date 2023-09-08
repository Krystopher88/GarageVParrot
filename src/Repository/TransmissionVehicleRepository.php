<?php

namespace App\Repository;

use App\Entity\TransmissionVehicle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TransmissionVehicle>
 *
 * @method TransmissionVehicle|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransmissionVehicle|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransmissionVehicle[]    findAll()
 * @method TransmissionVehicle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransmissionVehicleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransmissionVehicle::class);
    }

//    /**
//     * @return TransmissionVehicle[] Returns an array of TransmissionVehicle objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TransmissionVehicle
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
