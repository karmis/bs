<?php

namespace Brainstrap\NewsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Brainstrap\NewsBundle\Entity\News
 *
 * @ORM\Table(name="news")
 * @ORM\Entity
 */
class News
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255)
     * @Assert\NotBlank
     */
    private $title;

    /**
     * @var text $announce
     *
     * @ORM\Column(name="announce", type="text")
     */
    private $announce;

    /**
     * @var text $text
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;

    /**
     * @var datetime $createdAt
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var datetime $updatedAt
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var $newsCategory
     *
     * @ORM\ManyToOne(targetEntity="NewsCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="news_category_id", referencedColumnName="id")
     * })
     * })
     * @Assert\NotBlank
     */
    private $newsCategory;

    /**
     * @var $newsLinks
     *
     * @ORM\OneToMany(targetEntity="NewsLink", mappedBy="news", cascade={"all"}, orphanRemoval=true)
     * @ORM\OrderBy({"pos" = "ASC"})
     */
    protected $newsLinks;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->newsLinks = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function setId($id)
    {
        $this->id = $id;
    }

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
     *
     * @return News
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
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
     * Set announce
     *
     * @param string $announce
     *
     * @return News
     */
    public function setAnnounce($announce)
    {
        $this->announce = $announce;

        return $this;
    }

    /**
     * Get announce
     *
     * @return string
     */
    public function getAnnounce()
    {
        return $this->announce;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return News
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return News
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return News
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set newsCategory
     *
     * @param \Brainstrap\NewsBundle\Entity\NewsCategory $newsCategory
     *
     * @return News
     */
    public function setNewsCategory(\Brainstrap\NewsBundle\Entity\NewsCategory $newsCategory = null)
    {
        $this->newsCategory = $newsCategory;

        return $this;
    }

    /**
     * Get newsCategory
     *
     * @return \Brainstrap\NewsBundle\Entity\NewsCategory
     */
    public function getNewsCategory()
    {
        return $this->newsCategory;
    }

    /**
     * Add newsLink
     *
     * @param \Brainstrap\NewsBundle\Entity\NewsLink $newsLink
     *
     * @return News
     */
    public function addNewsLink(\Brainstrap\NewsBundle\Entity\NewsLink $newsLink)
    {
        $this->newsLinks[] = $newsLink;

        return $this;
    }

    /**
     * Remove newsLink
     *
     * @param \Brainstrap\NewsBundle\Entity\NewsLink $newsLink
     */
    public function removeNewsLink(\Brainstrap\NewsBundle\Entity\NewsLink $newsLink)
    {
        $this->newsLinks->removeElement($newsLink);
    }

    /**
     * Get newsLinks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNewsLinks()
    {
        return $this->newsLinks;
    }

    /**
     * Set pubDate
     *
     * @param \DateTime $pubDate
     *
     * @return News
     */
    public function setPubDate($pubDate)
    {
        $this->pubDate = $pubDate;

        return $this;
    }

    /**
     * Get pubDate
     *
     * @return \DateTime
     */
    public function getPubDate()
    {
        return $this->pubDate;
    }
}
