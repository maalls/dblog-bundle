<?php

namespace OMedia\LeadsBundle\Tests\Repository;

use Doctrine\Common\DataFixtures\Purger\ORMPurger;
//use OMedia\LeadsBundle\Lib\Submission;
use OMedia\LeadsBundle\Entity\Lead;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Maalls\DBLogBundle\Entity\DBLog;

class DbLogRepositoryTest extends KernelTestCase
{

    private $em;
    private $rep;


    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        self::bootKernel();
        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager("dblog");

        $this->rep = $this->em->getRepository("MaallsDBLogBundle:DbLog");

        $purger = new ORMPurger($this->em);
        $purger->setPurgeMode(ORMPurger::PURGE_MODE_DELETE);
        $purger->purge();
        
    }

    public function testCount() 
    {
        
    }

   

}
