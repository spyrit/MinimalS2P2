<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AuteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array(
                'required' => true,
            ))
            ->add('prenom', 'text', array(
                'required' => false,
            ));

            $builder->add('livres', 'collection', array(
                'label' => false,
                'type' => new LivreType(),
                'allow_add' => true,
                'allow_delete' => true,
                'delete_empty' => false,
                'by_reference' => false,
            ));

            $builder->add('save', 'submit', array(
                'label' => 'Enregistrer'
            ));

        return $builder;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Propel\Auteur',
        ));
    }

    public function getName()
    {
        return 'auteur';
    }
}