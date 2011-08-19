<?php

namespace Ex\blogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// N'oubliez pas de rajouter ce use supplémentaire
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Ex\blogBundle\Entity\Category;
//use Ex\blogBundle\Form\ActeurForm;

class CategoryController extends Controller
{
  public function indexAction()
  {
    return $this->container->get('templating')->renderResponse(
							       'ExblogBundle:Category:index.html.twig');
  }
    
  public function addAction()
  {
    return $this->container->get('templating')->renderResponse(
							       'ExblogBundle:Category:add.html.twig');
  }

  public function updateAction($id)
  {
    return $this->container->get('templating')->renderResponse(
							       'ExblogBundle:Category:update.html.twig');
  }

  public function deleteAction($id)
  {
    return $this->container->get('templating')->renderResponse(
							       'ExblogBundle:Category:delete.html.twig');
  }
}