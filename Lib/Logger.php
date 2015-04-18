<?php

namespace Maalls\DBLogBundle\Lib;
use Maalls\DBLogBundle\Entity\DBLog;

class Logger 
{
    private $em;
    private $author = "";

    public function __construct($em, $author = "") 
    {

        $this->em = $em;
        $this->author = $author;

    }

    public function setAuthor($author)
    {

        $this->author = $author ? $author : "";

    }

    public function log($msg, $level = "info")
    {

        $log = new DBLog();
        $log->setAuthor($this->author);
        $log->setPriority($level);
        $log->setMessage($msg);
        $this->em->persist($log);
        $this->em->flush();

    }

}