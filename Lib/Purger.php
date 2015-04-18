<?php

namespace Maalls\DBLogBundle\Lib;

class Purger 
{
    private $em;
    private $limit;

    public function __construct($em, $limit = 1000) 
    {

        $this->em = $em;
        $this->limit = $limit;
        
    }

    public function purge($limit = null)
    {

        $limit = $limit ? $limit : $this->limit;

        $deleteCount = max(0, $this->em->getRepository("MaallsDBLogBundle:DBLog")->count() - $limit);

        if($deleteCount) {

            $sql = "delete from log order by log.created_at limit $deleteCount";
            $stmt = $this->em->getConnection()->prepare($sql);
            $stmt->execute();

        }

    }

    public function log($msg, $level)
    {

        $log = new DBLog();
        $log->setAuthor($this->author);
        $log->setPriority($level);
        $log->setMessage($msg);
        $this->em->persist($log);
        $this->em->flush();

    }

}