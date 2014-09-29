<?php
/**
 * Created by PhpStorm.
 * User: karmis
 * Date: 25.08.14
 * Time: 13:09
 */

namespace Brainstrap\UserBundle\Entity\Skill;

use Doctrine\ORM\Mapping as ORM;
/**
 * SkillTag
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class SkillTag {
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
     * @ORM\ManyToOne(targetEntity="Skill", inversedBy="tags")
     * @ORM\JoinColumn(name="skill_tags_id", referencedColumnName="id")
     */
    private $tag;

    public function __toString()
    {
        return $this->caption;
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
     * @return SkillTag
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
     * Set tag.

     *
     * @param \Brainstrap\UserBundle\Entity\Skill\Skill $tag
     *
     * @return SkillTag
     */
    public function setTag(\Brainstrap\UserBundle\Entity\Skill\Skill $tag = null)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag.

     *
     * @return \Brainstrap\UserBundle\Entity\Skill\Skill
     */
    public function getTag()
    {
        return $this->tag;
    }
}
