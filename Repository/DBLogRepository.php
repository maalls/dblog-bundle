<?php

namespace Maalls\DBLogBundle\Repository;

use Doctrine\ORM\EntityRepository;

class DBLogRepository extends EntityRepository
{

    
    public function count() {

        return $this->createQueryBuilder("l")->select("count(l.id)")->getQuery()->getSingleScalarResult();

    }

}