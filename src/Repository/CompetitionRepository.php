<?php

namespace App\Repository;

use App\Entity\Competiteur;
use App\Entity\Competition;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Competition>
 *
 * @method Competition|null find($id, $lockMode = null, $lockVersion = null)
 * @method Competition|null findOneBy(array $criteria, array $orderBy = null)
 * @method Competition[]    findAll()
 * @method Competition[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompetitionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Competition::class);
    }

    public function save(Competition $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Competition $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    public function findAllWithJuges()
    {
//        $qb = $this->createQueryBuilder('c')
//            ->select('c.nom_competition', 'c.adr_competition', 'c.cp_competition',
//                'c.ville_competition', 'c.debut_competition', 'c.fin_competition', 'c.nb_epreuves',
//                'j.nom_juge', 'j.prenom_juge')
//            ->innerJoin('c.juges', 'j');

                $entityManager = $this -> getEntityManager();
        $qb = $entityManager -> createQuery(
            'SELECT c.nom_competition, c.adr_competition, c.cp_competition,
     c.ville_competition, c.debut_competition, c.fin_competition, c.nb_epreuves,
     j.nom_juge, j.prenom_juge
     FROM App\Entity\Competition c
     INNER JOIN App\Entity\Juges j ORDER BY c.nom_competition asc'
        );

        return $qb->getResult();
    }

    public function findNom() {
        return $this->createQueryBuilder('c')
            ->select('c.id_competition, c.nom_competition')
            ->getQuery()
            ->getResult();
    }




//    /**
//     * @return Competition[] Returns an array of Competition objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Competition
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
