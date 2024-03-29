<?php
namespace Ex\blogBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Category 
{
  /**
   * @ORM\GeneratedValue
   * @ORM\Id
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\Column(type="string",length="255")
   * @Assert\NotBlank()
   * @Assert\MinLength(3)
   */    
  private $name;

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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
}