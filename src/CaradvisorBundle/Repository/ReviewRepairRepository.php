<?php

namespace CaradvisorBundle\Repository;

use Doctrine\ORM\Tools\Pagination\Paginator;


/**
 * ReviewRepairRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ReviewRepairRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @param $reviewRepairId
     * @return array
     */
    public function getReviewsForSlides($reviewRepairId)
    {
        $qb = $this->createQueryBuilder("r")
                    ->select(array(
                        "r.review",
                        "r.id",
                        "r.city",
                        "r.dateReview",
                        "r.dealerName",
                        "u.userName"))
                    ->join("r.user", "u")
                    ->orderBy("r.dateReview", "desc")
                    ->setMaxResults(3)
                    ->getQuery();

        return $qb->getResult();

    }

    /**
     * @param int $page
     * @param int $maxresults
     * @return Paginator
     */
    public function listReviewRepair($page = 1, $maxresults = 4)
    {
        $qb = $this->createQueryBuilder('rr')
            ->where("rr.isActive = false")
            ->setFirstResult(($page - 1) * $maxresults)
            ->setMaxResults($maxresults)
            ->getQuery();

        return new Paginator($qb, $fetchJoinCollection = false);
    }

    /**
     * @return mixed
     */
    public function totalUsers()
    {
        $qb = $this->createQueryBuilder('rr')
            ->select('COUNT(rr)')
            ->getQuery()
            ->getSingleScalarResult();

        return $qb;
    }
}
