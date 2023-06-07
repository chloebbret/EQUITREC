<?php

namespace App\Repository;

use App\Entity\Competiteur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Competition;

/**
 * @extends ServiceEntityRepository<Competiteur>
 *
 * @method Competiteur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Competiteur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Competiteur[]    findAll()
 * @method Competiteur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompetiteurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Competiteur::class);
    }

    public function save(Competiteur $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Competiteur $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findAllCompetiteurs()
    {
        $qb = $this->createQueryBuilder('c')
            ->select('c.id_competiteur', 'c.nom_competiteur', 'c.prenom_competiteur', 'c.niveau_compet', 'c.num_licence', 'comp.nom_competition')
            ->leftJoin('c.competition', 'comp')
            ->orderBy('c.id_competiteur', 'ASC');

        return $qb->getQuery()->getResult();
    }








    public function findCompetiteursRank() {
        return $this->createQueryBuilder('c')
            ->select('c.nom_competiteur, c.prenom_competiteur, c.notes_competiteur')
            ->orderBy('c.notes_competiteur', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function classementCompet($competitionId = null)
    {
        $em = $this->getEntityManager();
        $dql = "SELECT ct.id_competiteur, ct.nom_competiteur, ct.prenom_competiteur, ct.notes_competiteur, c.id_competition, c.nom_competition
            FROM App\Entity\Competiteur ct
            LEFT JOIN ct.competition c
            ORDER BY c.nom_competition, ct.notes_competiteur DESC";

        $query = $em->createQuery($dql);

        if ($competitionId !== null) {
            $dql .= " WHERE c.id_competition = :id_competition";
            $query = $em->createQuery($dql);
            $query->setParameter('id_competition', $competitionId);
        }

        return $query->getResult();
    }


//    /**
//     * @return Competiteur[] Returns an array of Competiteur objects
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

//    public function findOneBySomeField($value): ?Competiteur
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
