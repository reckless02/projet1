<?php
# src/eternity/NewBundle/Controller/ContactController.php

namespace eternity\NewBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use eternity\NewBundle\Form\Type\ContactType;

class contactController extends Controller

{
    public function contactAction()
    {
        $form = $this->get('form.factory')->create(new ContactType());
 
         // Get the request
        $request = $this->get('request');
 
        // Get the handler
        $formHandler = new ContactHandler($form, $request, $this->get('mailer'));
 
        $process = $formHandler->process();
 
        if ($process)
        {
            // Launch the message flash
            $this->get('session')->setFlash('notice', 'Merci de nous avoir contacté, nous répondrons à vos questions dans les plus brefs délais.');
        }
 
        return $this->render('eternityNewBundle:Default:contact.html.twig',
                array(
                    'form' => $form->createView(),
                    'hasError' => $request->getMethod() == 'POST' && !$form->isValid()
                ));
		
		return array();
    }
	public function buildForm(FormBuilder $builder, array $options)
	{
		// ...
 
		$builder->add('otherForm', new otherFormType());
	}
}