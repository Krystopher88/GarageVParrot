<?php

namespace App\Repository;

use App\Entity\UsedVehicles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UsedVehicles>
 *
 * @method UsedVehicles|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsedVehicles|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsedVehicles[]    findAll()
 * @method UsedVehicles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsedVehiclesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsedVehicles::class);
    }

    public function findCardUsedVehicles(): array
    {
        return $this->createQueryBuilder('u')
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult()
        ;
    }
}
