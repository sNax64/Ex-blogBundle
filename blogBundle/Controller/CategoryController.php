<?php

namespace Ex\blogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Ex\blogBundle\Entity\Article;
use Ex\blogBundle\Entity\Category;
use Ex\blogBundle\Form\CategoryForm;

class CategoryController extends Controller
{   
  public function editAction($id = 0)
  {
    $msg = '';
    $em = $this->container->get('doctrine')->getEntityManager();
    
    if ($id > 0)
      {
	$category = $em->find('ExblogBundle:Category', $id);
	if (!$category)
	  $msg = 'Aucune Categorie';
      }
    else
      $category = new Category();
    
    $form = $this->container->get('form.factory')->create(new CategoryForm(), $category);
    $request = $this->container->get('request');

    if ($request->getMethod() == 'POST')
      {
	$form->bindRequest($request);
	if ($form->isValid())
	  {
	    $em->persist($category);
	    $em->flush();
	    return new RedirectResponse($this->container->get('router')->generate('my_blog_home'));
	  }
      }
    return $this->container->get('templating')->renderResponse('ExblogBundle:Category:add.html.twig',
							       array('form' => $form->createView(),
								     'message' => $msg));
  }

  public function deleteAction($id)
  {
    $em = $this->container->get('doctrine')->getEntityManager();
    $category = $em->find('ExblogBundle:Category', $id);
    if (!$category)
      throw new NotFoundHttpException("Article non trouvé");
    $em->remove($category);
    $em->flush();

    return new RedirectResponse($this->container->get('router')->generate('my_blog_home'));
  }
}