<?php

namespace Ex\blogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ArticleForm extends AbstractType
{
  public function buildForm(FormBuilder $builder, array $options)
  {        
        $builder
	  ->add('title')
	  ->add('content', 'textarea')
	  ->add('category','entity', array('class' => 'Ex\blogBundle\Entity\Category',
					    'property' => 'name',
					    'multiple' => false,
					    'required' => true))
	  ;
  }
    
  public function getName()
  {
    return 'article';
  }    
}
