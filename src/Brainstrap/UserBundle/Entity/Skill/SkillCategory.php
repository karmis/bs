<?php

namespace Brainstrap\UserBundle\Entity\Skill;

use Doctrine\ORM\Mapping as ORM;

/**
 * SkillCategory
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class SkillCategory
{
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
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * Partitions
     * @ORM\ManyToMany(targetEntity="SkillPartition", orphanRemoval=false, inversedBy="categories")
     * @ORM\JoinTable(name="SkillCategory_SkillPartition",
     *      joinColumns={@ORM\JoinColumn(name="skill_category_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="skill_partition_id", referencedColumnName="id")}
     *      )
     */
    private $partitions;

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
        $this->partitions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return SkillCategory
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
     * @return SkillCategory
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
     * @return SkillCategory
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
     * Add partition.

     *
     * @param \Brainstrap\UserBundle\Entity\Skill\SkillPartition $partition
     *
     * @return SkillCategory
     */
    public function addPartition(\Brainstrap\UserBundle\Entity\Skill\SkillPartition $partition)
    {
        $this->partitions[] = $partition;

        return $this;
    }

    /**
     * Remove partition.

     *
     * @param \Brainstrap\UserBundle\Entity\Skill\SkillPartition $partition
     */
    public function removePartition(\Brainstrap\UserBundle\Entity\Skill\SkillPartition $partition)
    {
        $this->partitions->removeElement($partition);
    }

    /**
     * Get partitions.

     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPartitions()
    {
        return $this->partitions;
    }
}
