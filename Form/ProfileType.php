<?php

namespace SKCMS\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProfileType extends AbstractType
{
    
   
    
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       
        
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('phone')
            ->add('addresses', 'collection', array(
                'type'=> new AddressType(),
                'allow_add'    => true,
                'allow_delete' => false
                ))
                ;
            
//        
//        $builder
//            ->add('username')
////            ->add('usernameCanonical')
////            ->add('email')
////            ->add('emailCanonical')
////            ->add('enabled')
////            ->add('salt')
////            ->add('password')
////            ->add('lastLogin')
//            ->add('locked')
////            ->add('expired')
////            ->add('expiresAt')
////            ->add('confirmationToken')
////            ->add('passwordRequestedAt')
//            ->add('roles')
////            ->add('credentialsExpired')
////            ->add('credentialsExpireAt')
//            ->add('firstName')
//            ->add('lastName')
//        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SKCMS\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'skcms_userbundle_user';
    }
}
