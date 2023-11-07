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
            ->getResult();
    }

/**
 * @return UsedVehicles[]
 */
    public function findSearchVehicles(array $search, $minPrice, $maxPrice, $minMileage, $maxMileage): array
    {
        $queryBuilder = $this->createQueryBuilder('u');

        if ($search['brandVehicle'] !== null) {
            $queryBuilder
                ->andWhere('u.brandVehicle = :brandVehicle')
                ->setParameter('brandVehicle', $search['brandVehicle']);
        }
        if ($search['fuelTypeVehicle'] !== null) {
            $queryBuilder
                ->andWhere('u.fuelTypeVehicle = :fuelTypeVehicle')
                ->setParameter('fuelTypeVehicle', $search['fuelTypeVehicle']);
        }
        if ($search['transmissionVehicle'] !== null) {
            $queryBuilder
                ->andWhere('u.transmissionVehicle = :transmissionVehicle')
                ->setParameter('transmissionVehicle', $search['transmissionVehicle']);
        }

        if ($minPrice !== null && $maxPrice !== null) {
            $queryBuilder
                ->andWhere('u.price >= :minPrice')
                ->andWhere('u.price <= :maxPrice')
                ->setParameter('minPrice', $minPrice)
                ->setParameter('maxPrice', $maxPrice);
        }

        if ($minMileage !== null && $maxMileage !== null) {
            $queryBuilder
                ->andWhere('u.mileage >= :minMileage')
                ->andWhere('u.mileage <= :maxMileage')
                ->setParameter('minMileage', $minMileage)
                ->setParameter('maxMileage', $maxMileage);
        }

        return $queryBuilder->getQuery()->getResult();
    }

}
