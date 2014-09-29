<?php

namespace Brainstrap\UserBundle\Entity\Skill;

use Doctrine\ORM\Mapping as ORM;

/**
 * Skill
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Skill
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
     * @ORM\ManyToMany(targetEntity="SkillPartition", orphanRemoval=false, cascade={"all"})
     * @ORM\JoinTable(name="Skill_Item_Partition",
     *      joinColumns={@ORM\JoinColumn(name="skill_item_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="skill_partition_id", referencedColumnName="id")}
     *      )
     */
    private $partition;

    /**
     * @ORM\ManyToMany(targetEntity="SkillCategory", orphanRemoval=false, cascade={"all"})
     * @ORM\JoinTable(name="Skill_Item_Category",
     *      joinColumns={@ORM\JoinColumn(name="skill_item_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="skill_category_id", referencedColumnName="id")}
     *      )
     */
    private $category;

    /**
     * @var integer
     *
     * @ORM\Column(name="mark", type="decimal", precision=2, scale=1)
     */
    private $mark;

    /**
     * @ORM\ManyToMany(targetEntity="Brainstrap\UserBundle\Entity\User", mappedBy="skills")
     */
    private $users;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->partition = new \Doctrine\Common\Collections\ArrayCollection();
        $this->category = new \Doctrine\Common\Collections\ArrayCollection();
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set mark.

     *
     * @param string $mark
     *
     * @return Skill
     */
    public function setMark($mark)
    {
        $this->mark = $mark;

        return $this;
    }

    /**
     * Get mark.

     *
     * @return string
     */
    public function getMark()
    {
        return $this->mark;
    }

    /**
     * Add partition.

     *
     * @param \Brainstrap\UserBundle\Entity\Skill\SkillPartition $partition
     *
     * @return Skill
     */
    public function addPartition(\Brainstrap\UserBundle\Entity\Skill\SkillPartition $partition)
    {
        $this->partition[] = $partition;

        return $this;
    }

    /**
     * Remove partition.

     *
     * @param \Brainstrap\UserBundle\Entity\Skill\SkillPartition $partition
     */
    public function removePartition(\Brainstrap\UserBundle\Entity\Skill\SkillPartition $partition)
    {
        $this->partition->removeElement($partition);
    }

    /**
     * Get partition.

     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPartition()
    {
        return $this->partition;
    }

    /**
     * Add category.

     *
     * @param \Brainstrap\UserBundle\Entity\Skill\SkillCategory $category
     *
     * @return Skill
     */
    public function addCategory(\Brainstrap\UserBundle\Entity\Skill\SkillCategory $category)
    {
        $this->category[] = $category;

        return $this;
    }

    /**
     * Remove category.

     *
     * @param \Brainstrap\UserBundle\Entity\Skill\SkillCategory $category
     */
    public function removeCategory(\Brainstrap\UserBundle\Entity\Skill\SkillCategory $category)
    {
        $this->category->removeElement($category);
    }

    /**
     * Get category.

     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add user.

     *
     * @param \Brainstrap\UserBundle\Entity\User $user
     *
     * @return Skill
     */
    public function addUser(\Brainstrap\UserBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user.

     *
     * @param \Brainstrap\UserBundle\Entity\User $user
     */
    public function removeUser(\Brainstrap\UserBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users.

     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }
}
