<?php

namespace Brainstrap\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BrainstrapAdminBundle:Default:index.html.twig', array('name' => $name));
    }
}
