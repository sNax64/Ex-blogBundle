<?php
namespace Ex\blogBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Article 
{
  /**
   * @ORM\GeneratedValue
   * @ORM\Id
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\ManyToOne(targetEntity="Category")
   * @Assert\NotBlank()
   */    
  private $category;

  /**
   * @ORM\Column(type="string",length="255")
   * @Assert\NotBlank()
   * @Assert\MinLength(3)
   */    
  private $title;

  /**
   * @ORM\Column(type="string", length="500")
   */
  private $content;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set category
     *
     * @param Ex\blogBundle\Entity\Category $category
     */
    public function setCategory(\Ex\blogBundle\Entity\Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get category
     *
     * @return Ex\blogBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
}