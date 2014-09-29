<?php
/**
 * Created by PhpStorm.
 * User: karmis
 * Date: 25.08.14
 * Time: 13:24
 */

namespace Brainstrap\UserBundle\Entity\Skill;


use Doctrine\ORM\Mapping as ORM;

/**
 * SkillPartition
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class SkillPartition {
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="caption", type="string", length=255)
     */
    private $caption;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;


    /**
     * @ORM\ManyToMany(targetEntity="SkillCategory", mappedBy="partitions")
     */
    private $categories;

    /**
     * @var boolean
     *
     * @ORM\Column(name="published", type="boolean")
     */
    private $published;

    public function __toString()
    {
        return $this->caption;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id.

     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set caption.

     *
     * @param string $caption
     *
     * @return SkillPartition
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * Get caption.

     *
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Set description.

     *
     * @param string $description
     *
     * @return SkillPartition
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.

     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set published.

     *
     * @param boolean $published
     *
     * @return SkillPartition
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published.

     *
     * @return boolean
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Add category.

     *
     * @param \Brainstrap\UserBundle\Entity\Skill\SkillCategory $category
     *
     * @return SkillPartition
     */
    public function addCategory(\Brainstrap\UserBundle\Entity\Skill\SkillCategory $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category.

     *
     * @param \Brainstrap\UserBundle\Entity\Skill\SkillCategory $category
     */
    public function removeCategory(\Brainstrap\UserBundle\Entity\Skill\SkillCategory $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     * Get categories.

     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }
}
