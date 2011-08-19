<?php

namespace Ex\blogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CategoryForm extends AbstractType
{
  public function buildForm(FormBuilder $builder, array $options)
  {        
        $builder
	  ->add('name')
	  ;
  }
    
  public function getName()
  {
    return 'category';
  }    
}
