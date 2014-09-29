<?php

namespace Brainstrap\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BrainstrapFrontBundle:Default:index.html.twig', array());
    }
}
