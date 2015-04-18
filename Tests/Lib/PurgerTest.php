<?php

namespace OMedia\LeadsBundle\Tests\Repository;

use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Maalls\DBLogBundle\Lib\Purger;
use Maalls\DBLogBundle\Entity\DBLog;

class PurgerTest extends KernelTestCase
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

        

        $purger = new ORMPurger($this->em);
        $purger->setPurgeMode(ORMPurger::PURGE_MODE_DELETE);
        $purger->purge();
        
    }

    public function testPurge() 
    {

        $purger = new Purger($this->em);

        for($i = 0; $i < 111; $i++) {

            $log = new DBLog();
            $log->log("hello");
            $this->em->persist($log);
            

        }

        $this->em->flush();

        $purger->purge(100);
        $this->assertEquals(100, $this->em->getRepository("MaallsDBLogBundle:DBLog")->count());


    }

}
