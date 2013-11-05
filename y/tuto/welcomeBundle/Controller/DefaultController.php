<?php

namespace tuto\welcomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('tutowelcomeBundle:Default:index.html.twig', array('name' => $name));
    }
}
