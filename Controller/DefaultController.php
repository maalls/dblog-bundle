<?php

namespace Maalls\DBLogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Maalls\Pager\Request\Pager;
use Maalls\AdminBundle\Helpers\Views\Table;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {

        $pager = new Pager($request, 5, array("page" => 1, "limit" => 50, "search" => ""), $this->getDoctrine()
            ->getManager('dblog')
            ->getRepository("MaallsDBLogBundle:DBLog")
            ->createQueryBuilder("e")->orderBy("e.created_at", "DESC")->addOrderBy("e.id", "DESC"),
            array("message", "priority"));
        
        return $this->render('MaallsDBLogBundle:Default:index.html.twig', array('pager' => $pager));
    }
}
