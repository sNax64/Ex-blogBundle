<?php

namespace Ex\blogBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Ex\blogBundle\Entity\Article;
use Ex\blogBundle\Form\ArticleForm;

class ArticleController extends ContainerAware
{

  public function affAction($id)
  {
    $em = $this->container->get('doctrine')->getEntityManager();
    $article = $em->getRepository('ExblogBundle:Article')->find($id);
    $fake[] = $article;
    return $this->container->get('templating')->renderResponse('ExblogBundle:Article:affall.html.twig',
							       array('Article' => $fake));
  }
  public function affallAction($category)
  {
    $em = $this->container->get('doctrine')->getEntityManager();
    $cat = $em->getRepository('ExblogBundle:Category')->findOneByname($category);
    $article = $em->getRepository('ExblogBundle:Article')->findBycategory($cat->getId()); 
    return $this->container->get('templating')->renderResponse('ExblogBundle:Article:affall.html.twig',
							       array('cat' => $category,
								     'Article' => $article));
  }
  public function affhomeAction()
  {
    $em = $this->container->get('doctrine')->getEntityManager();
    $article = $em->getRepository('ExblogBundle:Article')->findAll(); 
    return $this->container->get('templating')->renderResponse('ExblogBundle:Article:affhome.html.twig',
							       array('Article' => $article));
  }
  public function editAction($id = 0)
  {
    $msg = '';
    $em = $this->container->get('doctrine')->getEntityManager();
    
    if ($id > 0)
      {
	$article = $em->find('ExblogBundle:Article', $id);
	if (!$article)
	  $msg = 'Aucun article trouve';
      }
    else
      $article = new Article();
    
    $form = $this->container->get('form.factory')->create(new ArticleForm(), $article);
    $request = $this->container->get('request');

    if ($request->getMethod() == 'POST')
      {
	$form->bindRequest($request);
	if ($form->isValid())
	  {
	    $em->persist($article);
	    $em->flush();
	    $cat = $article->getCategory()->getName();
	    return new RedirectResponse($this->container->get('router')->generate('my_blog_affall_article',
										  array('category' => $cat)));
	  }
      }
    return $this->container->get('templating')->renderResponse('ExblogBundle:Article:add.html.twig',
							       array('form' => $form->createView(),
								     'message' => $msg));
  }

  public function deleteAction($id)
  {
    $em = $this->container->get('doctrine')->getEntityManager();
    $article = $em->find('ExblogBundle:Article', $id);
    if (!$article)
      throw new NotFoundHttpException("Article non trouvé");
    $cat = $article->getCategory()->getName();
    $em->remove($article);
    $em->flush();

    return new RedirectResponse($this->container->get('router')->generate('my_blog_affall_article',
									  array('category' => $cat)));
  }
}

