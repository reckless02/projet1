<?php
# src/NewBundle/Form/Handler/ContactHandler.php
 
namespace eternity\NewBundle\Form\Handler;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
 
/**
 * The ContactHandler.
 * Use for manage your form submitions
 *
 * @author Vincent Paulin
 */
class ContactHandler
{
 
    protected $request;
    protected $form;
    protected $mailer;
 
    /**
     * Initialize the handler with the form and the request
     *
     * @param Form $form
     * @param Request $request
     * @param $mailer
     * 
     */
    public function __construct(Form $form, Request $request, $mailer)
    {
        $this->form = $form;
        $this->request = $request;
        $this->mailer = $mailer;
    }
 
  /**
   * Process form
   *
   * @return boolean
   */
  public function process()
  {
      // Check the method
      if ('POST' == $this->request->getMethod())
      {
          // Bind value with form
          $this->form->bindRequest($this->request);
 
          if ($this->form->isValid()) {
 
            $contact = $this->form->getData();
            $this->onSuccess($contact);
 
          return true;
      }
 
      return false;
  }
 
    /**
     * Send mail on success
     * 
     * @param array $data
     * 
     */
    protected function onSuccess($data)
    {
        $message = \Swift_Message::newInstance()
                    ->setContentType('text/html')
                    ->setSubject($data['subject'])
                    ->setFrom($data['email'])
                    ->setTo('xxxxxx@gmail.com')
                    ->setBody($data['content']);
 
        $this->mailer->send($message);
    }
}