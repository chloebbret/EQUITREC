<?php

namespace App\Repository;

use App\Entity\LogJuges;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LogJuges>
 *
 * @method LogJuges|null find($id, $lockMode = null, $lockVersion = null)
 * @method LogJuges|null findOneBy(array $criteria, array $orderBy = null)
 * @method LogJuges[]    findAll()
 * @method LogJuges[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogJugesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LogJuges::class);
    }

    public function save(LogJuges $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(LogJuges $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function connexionJournee()
    {
        $qb = $this->createQueryBuilder('lj')
            ->select('lj.id_connexion, u.id_user, lj.date_connexion')
            ->join('lj.user', 'u')
            ->where('DATE_DIFF(CURRENT_DATE(), lj.date_connexion) = 0');
        return $qb -> getQuery() -> getResult();
    }

//    /**
//     * @return LogJuges[] Returns an array of LogJuges objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?LogJuges
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
