<?php

namespace App\Repository;

use App\Entity\Judge;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Judge>
 */
class JudgeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Judge::class);
    }

    public function save(Judge $judge, bool $flush = false): void
    {
        $entityManager = $this->getEntityManager();
        $entityManager->persist($judge);

        if ($flush) {
            $entityManager->flush();
        }
    }

    public function remove(Judge $judge, bool $flush = false): void
    {
        $entityManager = $this->getEntityManager();
        $entityManager->remove($judge);

        if ($flush) {
            $entityManager->flush();
        }
    }

    public function findJudgeNames(): array
    {
        $queryBuilder = $this->createQueryBuilder('j')
            ->select('j.name, j.surname');

        return $queryBuilder->getQuery()->getResult();
    }
}
