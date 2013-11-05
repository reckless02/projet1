<?php
# src/eternity/NewBundle/Form/Type/ContactType.php
 
namespace eternity\NewBundle\Form\Type;
 
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\MinLength;
use Symfony\Component\Validator\Constraints\MaxLength;
 
class ContactType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('email', 'email')
                ->add('subject', 'text')
                ->add('content', 'textarea');
    }
 public function getDefaultOptions(array $options)
{
    $collectionConstraint = new Collection(array(
        'email' => new Email(array('message' => 'Adresse email invalide')),
        'subject' => array(new MinLength(array('limit' => 5, 'message' => 'Sujet trop court')), new MaxLength(array('limit' => 140, 'message' => 'Sujet trop long'))),
        'content' => new MinLength(array('limit' => 40, 'message' => 'Contenu trop court')),
    ));
 
    return array('validation_constraint' => $collectionConstraint);
}
    public function getName()
    {
        return 'Contact';
    }
}
?>