<?php

namespace Ex\blogBundle\Controller;

use	Symfony\Component\DependencyInjection\ContainerAware,
	Symfony\Component\HttpFoundation\RedirectResponse;
use	Knp\Bundle\MenuBundle\MenuItem;
use	Ex\blogBundle\Entity\Category;

class DefaultController extends ContainerAware
{
  public function add_cat($name)
  {
    $em = $this->container->get('doctrine')->getEntityManager();

    $tmp = new Category();
    $tmp->setName($name);
    $em->persist($tmp);
    
    $em->flush();

    $message = 'Add Category ' . $name . ' Success';
    return ($message);
  }
  public function get_menu()
  {
    $em = $this->container->get('doctrine')->getEntityManager();
    $router = $this->container->get('router');

    $category = $em->getRepository('ExblogBundle:Category')->findAll();
    $menu = new MenuItem('My menu');
    foreach ($category as $cat)
      {
	$menu->addChild($cat['name'], $router->generate('my_blog_affall_article', array('category' => $cat['name'])));
      }
    $menu->addChild('Ajouter', $router->generate('my_blog_add_article'));
    echo $menu->render();
  }
  public function indexAction()
  {
    $em = $this->container->get('doctrine')->getEntityManager();
    
    
    $category = $em->getRepository('ExblogBundle:Category')->findAll();
    
    return $this->container->get('templating')->renderResponse('ExblogBundle:Default:index.html.twig',
							       array('category' => $category));
  }
}
