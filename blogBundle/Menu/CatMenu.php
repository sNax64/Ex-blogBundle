<?php

namespace Ex\blogBundle\Menu;

use Knp\Bundle\MenuBundle\Menu;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Router;
//use Symfony\Component\HttpFoundation\RedirectResponse;
//use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Ex\blogBundle\Entity\Category;

class CatMenu extends Menu
{
  /**
   * @param Request $request
   * @param Router $router
   * @param EntityManager $em
   */
  public function __construct(Request $request, Router $router, EntityManager $em)
  {
    parent::__construct();
    $this->setCurrentUri($request->getRequestUri());
    $category = $em->getRepository('ExblogBundle:Category')->findAll();
    foreach ($category as $cat)
      {
        $this->addChild($cat->getName(), $router->generate('my_blog_affall_article',
							   array('category' => $cat->getName())));
      }
    $this->addChild('Ajouter', $router->generate('my_blog_add_article'));
  }
}