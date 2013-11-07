<?php
# src/eternity/NewBundle/Controller/ContactController.php

namespace eternity\NewBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use eternity\NewBundle\Form\Type\ContactType;
use Symfony\Component\Form\FormTypeInterface;
use eternity\NewBundle\Entity\Contact;



class contactController extends Controller
{
    /**
    * @route("eternityNewBundle/Resources/config/routing.yml")
    */
    public function contactAction()
    {
        //$form = $this->get('form.factory')->create(new ContactType());

        $contact = new Contact();

        $form = $this->createFormBuilder($contact)
            ->add('email', 'email')
            ->add('subject', 'text')
            ->add('content', 'textarea')
            ->getForm()
        ;
 
         // Get the request
        $request = $this->get('request');
 
         
                
        return $this->render('eternityNewBundle:contact:contact.html.twig',
            array(
                'form' => $form->createView(),
                'hasError' => $request->getMethod() == 'POST' && !$form->isValid()
            )
        );
        
		
		return array();
    }
}